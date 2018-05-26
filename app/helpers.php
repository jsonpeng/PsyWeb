<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:06
 */


function get_page_custom_value_by_name($attribute,$name){
    $pageItems=$attribute->pageItems();
    if(empty($pageItems->get())){
        return '';
    }else{
        if(empty($pageItems->where('name',$name)->first())){
            return '';
        }else {
            return $pageItems->where('name', $name)->first()->value;
        }
    }
}

function get_post_custom_value_by_name($attribute,$name){
    $postItems=$attribute->items();
    if(empty($postItems->get())){
        return '';
    }else{
        if(empty($postItems->where('name',$name)->first())){
            return '';
        }else {
            return $postItems->where('name',$name)->first()->value;
        }
    }
}

//根据当前登录用户和文章id获取他的收藏状态
function get_collect_status($user,$post_id){
        #获取他的收藏文章列表
        $collect_list=$user->posts()->get();
        $status=false;
        foreach ($collect_list as $k => $v) {
            # code...
            if($v->id == $post_id){
                $status = true;
            }
        }
        return $status;
        //return $user->posts()->whereRaw('post.id = '.$post_id)->count()
}


function api_tem($data,$status_code=0){

    return ['status_code'=>$status_code,'data'=>$data];
    
}