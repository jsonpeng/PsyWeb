<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Repositories\MenuItemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Log;

use App\Models\MenuItem;

class MenuItemController extends AppBaseController
{
    /** @var  MenuItemRepository */
    private $menuItemRepository;
    private $menu_ids;

    public function __construct(MenuItemRepository $menuItemRepo)
    {
        $this->menuItemRepository = $menuItemRepo;
        $this->menu_ids = [];
    }


    public function items($menu_id)
    {
        $menus = MenuItem::where('menu_id', $menu_id)->where('parent_id', null)->orderBy('sort', 'asc')->get();
        if (is_null($menus)) {
            return ['code' => 0, 'message' => []];
        } else {
            // 最多两层，再多就迭代
            foreach ($menus as $menu) {
                $children_menus = MenuItem::where('menu_id', $menu_id)->where('parent_id', $menu->id)->orderBy('sort', 'asc')->get();
                foreach ($children_menus as $children_menu) {
                    $children2_menus = MenuItem::where('menu_id', $menu_id)->where('parent_id', $children_menu->id)->orderBy('sort', 'asc')->get();
                    $children_menu['children'] = $children2_menus;
                }
                $menu['children'] = $children_menus;
            }
            return ['code' => 0, 'message' => $menus];
        }
        
    }

    public function addItem(Request $request)
    {
        if ( !$request->has('menu_id') || empty($request->input('menu_id')) || !$request->has('name') || empty($request->input('name')) || !$request->has('link') || empty($request->input('link')) ) {
            return ['code' => 1, 'message' => '参数不正确'];
        }

        $input = $request->all();
        if (array_key_exists('link', $input) && $input['link'] != '') {
            if(!preg_match("/^(http:\/\/|https:\/\/).*$/", $input['link'])){
                $input['link'] = 'http://'.$input['link'];
            }
        }
        $menu_item = MenuItem::create($input);
        return ['code' => 0, 'message' => $menu_item];
    }

    //保存菜单
    public function setMenus(Request $request)
    {
        $menus = $request->all()['menu'];
        Log::info($menus);
        $this->menu_ids = [];
        $result = $this->setMenu($menus, null);
        $tmp = MenuItem::whereNotIn('id', $this->menu_ids);
        if (count($menus)) {
            $tmp = $tmp->where('menu_id', $menus[0]['menu_id']);
        }
        $tmp->delete();
        return $result;
    }

    //保存菜单（单个）
    private function setMenu($menus, $parent_id){
        foreach ($menus as $index => $menu) {
            if (array_key_exists('children', $menu)) {
                $this->setMenu($menu['children'], $menu['id']);
            }

            $menuitem = $this->menuItemRepository->findWithoutFail($menu['id']);
            if (!empty($menuitem)) {
                if (array_key_exists('link', $menu) && $menu['link'] != '') {
                    if(!preg_match("/^(http:\/\/|https:\/\/).*$/", $menu['link'])){
                        $menu['link'] = 'http://'.$menu['link'];
                    }
                }
                $menuitem->update(['sort' => $index, 'name' => $menu['name'], 'link' => $menu['link'], 'parent_id' => $parent_id]);
                array_push($this->menu_ids, $menuitem->id);
            }else{
                return ['code' => 1, 'message' => '菜单信息不存在'];
            }
        }
        return ['code' => 0, 'message' => '成功'];
    }

}
