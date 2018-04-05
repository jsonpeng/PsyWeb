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