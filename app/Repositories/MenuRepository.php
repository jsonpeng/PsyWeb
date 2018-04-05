<?php

namespace App\Repositories;

use App\Models\Menu;
use InfyOm\Generator\Common\BaseRepository;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

use App\Models\MenuItem;

/**
 * Class MenuRepository
 * @package App\Repositories
 * @version November 3, 2017, 5:04 pm CST
 *
 * @method Menu findWithoutFail($id, $columns = ['*'])
 * @method Menu find($id, $columns = ['*'])
 * @method Menu first($columns = ['*'])
*/
class MenuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Menu::class;
    }

    public function getCacheMenu($name)
    {
        return Cache::remember('menu'.$name, Config::get('web.shrottimecache'), function() use ($name) {
            try {
                $menu = Menu::where('slug', $name)->first();
                if (is_null($menu)) {
                    return [];
                }else{
                    $menus = MenuItem::where('menu_id', $menu->id)->where('parent_id', null)->orderBy('sort', 'asc')->get();
                    if (is_null($menus)) {
                        return [];
                    } else {
                        // 最多两层，再多就迭代
                        foreach ($menus as $tmp_menu) {
                            $children_menus = MenuItem::where('menu_id', $menu->id)->where('parent_id', $tmp_menu->id)->orderBy('sort', 'asc')->get();
                            foreach ($children_menus as $children_menu) {
                                $children2_menus = MenuItem::where('menu_id', $menu->id)->where('parent_id', $children_menu->id)->orderBy('sort', 'asc')->get();
                                $children_menu['children'] = $children2_menus;
                            }
                            $tmp_menu['children'] = $children_menus;
                        }
                        return $menus;
                    }
                }
            } catch (Exception $e) {
                return;
            }
        });
    }
}
