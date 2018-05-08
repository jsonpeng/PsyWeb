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


    /**
     *加好友功能
     */
    public function makeFriends($user,$friend_id){
        #自己不能加自己
        if($user->id == $friend_id){

            return ['code' => 1,'message'=>'不能加自己为好友!'];

        }

        #先检测friend_id在不在
        $friend = $this->findWithoutFail($friend_id);

        if(!empty($friend)){

             #还要检测一下两个人是不是好友
             if(!$this->checkFriendsRel($user,$friend_id)){
                 #加我的朋友为 好友
                 $user->friends()->attach($friend_id);

                 #朋友加我
                 $friend ->friends()->attach($user->id);
             }
             else{
                return ['code' => 1,'message'=>'已经是好友了,请不要重复添加!'];
             }

        }
        else{
            return ['code' => 1,'message'=>'该朋友不存在!'];
        }

        return ['code' => 0,'message'=>'加好友成功!'];

    }

    //函数返回值 false 没有好友关系  true已经是好友
    public function checkFriendsRel($user,$friend_id){
            #取出这个用户的好友列表
            $friends_list = $user->friends()->get();

            $status = false;

            foreach ($friends_list as $k => $v) {
                
                    if($v->id == $friend_id){

                        $status = true;

                    }
            }

            return $status;
    }

  
}
