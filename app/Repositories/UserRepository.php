<?php

namespace App\Repositories;

use App\User;
use InfyOm\Generator\Common\BaseRepository;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
     'name', 'email', 'password','head_image','bg_image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    //收藏一篇文章
    public function collectAction($user,$post_id,$action=true){
        #先检查用户登录状态
        if(empty($user)){
           return ['code'=>1,'message'=>'请先登录'];
        }

        #先查一下文章是否存在
        $post=Post::find($post_id);
        if(!empty($post)){
            #当前收藏量
            $now_collections=$post->collect;
            #收藏
            if(!empty($action) && $action != 'false'){
                $user->posts()->attach($post_id);
                #需要知道当前的数量  然后+1
                $post->update(['collect'=>$now_collections+1]);
                return ['code'=>0,'message'=>'收藏成功'];
            }#取消收藏
            else{
                $user->posts()->detach($post_id);
                $post->update(['collect'=> ($now_collections-1) < 0 ? 0 : $now_collections-1]);
                return ['code'=>0,'message'=>'取消收藏成功'];
            }

        }else{
            return ['code'=>1,'message'=>'该文章不存在'];
        }
    	

    }

  
}
