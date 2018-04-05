<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\CustomPostType;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 * @package App\Models
 * @version October 17, 2017, 6:10 pm CST
 *
 * @property string name
 * @property sting slug
 * @property string brief
 * @property longtext content
 * @property integer view
 * @property string seo_title
 * @property string seo_des
 * @property string seo_keyword
 * @property string status
 */
class Post extends Model
{
    use SoftDeletes;

    public $table = 'posts';
    

    protected $dates = ['deleted_at', 'created_at'];


    public $fillable = [
        'name',
        'slug',
        'brief',
        'content',
        'view',
        'seo_title',
        'seo_des',
        'seo_keyword',
        'status',
        'image',
        'image2',
        'sort',
        'type',
        'more'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'brief' => 'string',
        'view' => 'integer',
        'seo_title' => 'string',
        'seo_des' => 'string',
        'seo_keyword' => 'string',
        'status' => 'string',
        'type'=>'string',
        'more'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'content' => 'required'
    ];

    //文章所属的分类
    public function cats(){
        return $this->belongsToMany('App\Models\Category', 'category_post', 'post_id', 'category_id');
    }

    public function getPublishAttribute(){
        if ($this->status) {
            return '已发布';
        } else {
            return '草稿';
        }
    }

    //文章类型(自定义/文章)
    public function getLeiXingAttribute(){
        $v=CustomPostType::where('slug',$this->type)->first();
        if($this->type!='post' && !empty($v) ){
                return '自定义';
        }else{
            return '文章';
        }
    }

    //文章的更多字段
    public function items(){
        return $this->hasMany('App\Models\PostItems');
    }
}
