<?php

namespace App\Repositories;

use App\Models\Category;
use InfyOm\Generator\Common\BaseRepository;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

/**
 * Class CategoryRepository
 * @package App\Repositories
 * @version October 17, 2017, 4:39 pm CST
 *
 * @method Category findWithoutFail($id, $columns = ['*'])
 * @method Category find($id, $columns = ['*'])
 * @method Category first($columns = ['*'])
*/
class CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug',
        'sort',
        'parent_id',
        'image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Category::class;
    }

    public function getCacheCategory($id){
        return Cache::remember('zcjy_category_'.$id, Config::get('web.shrottimecache'), function() use ($id) {
            try {
                return Category::find($id);
            } catch (Exception $e) {
                return;
            }
        });
    }

    public function getCacheCategoryBySlug($slug){
        return Cache::remember('zcjy_category_'.$slug, Config::get('web.shrottimecache'), function() use ($slug) {
            try {
                return Category::where('slug', $slug)->first();
            } catch (Exception $e) {
                return;
            }
        });
    }

    public function getCachePostByCatSlug($slug, $number = 6){
        return Cache::remember('zcjy_posts_of_category_'.$slug.'_'.$number, Config::get('web.shrottimecache'), function() use ($slug, $number) {
            try {
                $cat = $this->getCacheCategoryBySlug($slug);
                if ($cat) {
                    return $cat->posts()->take($number)->get();
                }else{
                    return collect([]);
                }
            } catch (Exception $e) {
                return;
            }
        });
    }
	
	    //通过父分类的别名获取子分类的列表
    public function getCacheCatListByParentCatSlug($slug){
        return Cache::remember('zcjy_category_list_'.$slug, Config::get('web.shrottimecache'), function() use ($slug) {
            try {
                $parent_id=Category::where('slug', $slug)->first()->id;
                return Category::where('parent_id',$parent_id)->get();
            } catch (Exception $e) {
                return;
            }
        });
    }

    //获取父分类下的子分类并附带文章
    public function getCacheChildCatPostOfParentBySlug($parent_slug){
        return Cache::remember('child_cat_post_of_parent_by_slug'.$parent_slug, Config::get('web.shrottimecache'), function() use ($parent_slug) {
            try {
                $cat = $this->getCacheCategoryBySlug($slug);
                if ($cat) {
                    return Category::where('parent_id', $cat->id)->with('posts')->get();
                }else{
                    return collect([]);
                }
            } catch (Exception $e) {
                return;
            }
        });
    }

    //按层级获取所有的分类信息
    public function getCascadeCategories(){
        $origin_categories = Category::where('parent_id', null)->orWhere('parent_id', 0)->get();
        $cascade_categories = collect([]);
        foreach ($origin_categories as $tmp1) {
            $cascade_categories->push($tmp1);
            $origin_categories_tmp = Category::where('parent_id', $tmp1->id)->get();
            foreach ($origin_categories_tmp as $tmp2) {
                $tmp2->name = $tmp2->name;
                $cascade_categories->push($tmp2);
            }
        }
        return $cascade_categories;
    }

    /**
     * 生成适合Form::select展示的array格式
     * 新建产品分类信息
     * @return [type] [description]
     */
    public function getRootCatArray($id = 0){
        $catArray = array(0 => '无分类');
        $categories = Category::select('id', 'name')->where('parent_id', 0)->orWhere('parent_id', null)->get()->toArray();
        while (list($key, $val) = each($categories)) {
            if ($id != $val['id']) {
                $catArray[$val['id']] = $val['name'];
            }
        }
        return $catArray;
    }
}
