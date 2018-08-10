<?php

namespace App\Repositories;

use App\Models\Post;
use InfyOm\Generator\Common\BaseRepository;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

/**
 * Class PostRepository
 * @package App\Repositories
 * @version October 17, 2017, 6:10 pm CST
 *
 * @method Post findWithoutFail($id, $columns = ['*'])
 * @method Post find($id, $columns = ['*'])
 * @method Post first($columns = ['*'])
*/
class PostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug',
        'brief',
        'content',
        'view',
        'seo_title',
        'seo_des',
        'seo_keyword',
        'status',
        'type',
        'more'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Post::class;
    }

    public function getCachePost($id){
        return Cache::remember('zcjy_post_'.$id, Config::get('web.shrottimecache'), function() use ($id) {
            try {
                return Post::find($id);
            } catch (Exception $e) {
                return;
            }
        });
    }

    public function getCachePostFirstCat($id){
        return Cache::remember('zcjy_post_cats_'.$id, Config::get('web.shrottimecache'), function() use ($id) {
            return $this->getCachePost($id)->cats()->first();
        });
    }

    public function PrevPost($id)
    {
        return Cache::remember('PrevPost_'.$id, Config::get('web.shrottimecache'), function() use ($id) {
            $post = $this->getCachePost($id);
            $cat = $this->getCachePostFirstCat($id);
            if (is_null($cat)) {
                return Post::where('id', '<', $id)->where('status', 1)->orderBy('id', 'desc')->first();
            } else {
                //dd($cat->posts()->where('status', 1)->orderBy('id', 'desc')->get());
                //return $cat->posts()->where('id', '<', $id)->where('status', 1)->orderBy('id', 'desc')->first();
                $posts = $cat->posts()->where('status', 1)->orderBy('id', 'desc')->get();
                return $posts->first(function ($value, $key) use($id) {
                    return $value->id < $id;
                });
            }
        });
    }

    public function NextPost($id)
    {
        return Cache::remember('NextPost_'.$id, Config::get('web.shrottimecache'), function() use ($id) {
            $post = $this->getCachePost($id);
            $cat = $this->getCachePostFirstCat($id);
            if (is_null($cat)) {
                return Post::where('id', '>', $id)->where('status', 1)->orderBy('id', 'asc')->first();
            } else {
                //return $cat->posts()->where('id', '>', $id)->where('status', 1)->orderBy('id', 'asc')->first();
                $posts = $cat->posts()->where('status', 1)->orderBy('id', 'asc')->get();
                return $posts->first(function ($value, $key) use($id) {
                    return $value->id > $id;
                });
            }
        });
    }


    //最新资讯
    public function NewsestPosts($take =10){

        return Post::orderBy('created_at','desc')->where('status', 1)->take($take)->get();

    }
    
    //点击排行
    public function ClickSortPosts($take =10){

         return Post::orderBy('view','desc')->where('status', 1)->take($take)->get();

    }

    //随机读文章列表 推荐热点 热门推荐使用
    public function GetRandPosts($take =10){
        return Post::orderBy(\DB::raw('RAND()'))->where('status', 1)->take($take)->get();
    }

    /*
     *相关热点
     */
    public function HotPostsByPostId($id,$take=4)
    {
        return Cache::remember('HotPostsByPostId_'.$id, Config::get('web.shrottimecache'), function() use ($id,$take) {
            $post = $this->getCachePost($id);
            $cat = $this->getCachePostFirstCat($id);
            if (is_null($cat)) {
                return Post::where('id', '<>', $id)->where('status', 1)->orderBy(\DB::raw('RAND()'))->take($take)->get();
            } else {
                
                return  $cat->posts()->where('status', 1)->orderBy(\DB::raw('RAND()'))->take($take)->get();
              
            }
        });
    }

    /*
     *通过名称及文章内容搜索文章列表
     *
     */
    public function SerachPostList($post_name){

        return Post::orderBy('created_at','desc')->where(function ($query) use ($post_name){

                $query->where('name','like','%'.$post_name.'%')
                      ->orWhere('content','like','%'.$post_name.'%');
                      
            })->get(); 
                  
    }
    
}
