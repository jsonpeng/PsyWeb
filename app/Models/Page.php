<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Page
 * @package App\Models
 * @version October 17, 2017, 8:08 pm CST
 *
 * @property string name
 * @property string slug
 * @property longtext content
 * @property integer view
 * @property string seo_title
 * @property string seo_keyword
 * @property string seo_des
 * @property integer status
 * @property string image
 */
class Page extends Model
{
    use SoftDeletes;

    public $table = 'pages';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'slug',
        'content',
        'view',
        'seo_title',
        'seo_keyword',
        'seo_des',
        'status',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'view' => 'integer',
        'seo_title' => 'string',
        'seo_keyword' => 'string',
        'seo_des' => 'string',
        'status' => 'integer',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function getPublishAttribute(){
        if ($this->status) {
            return '已发布';
        } else {
            return '草稿';
        }
    }
    public function pageItems(){
        return $this->hasMany('App\Models\PageItems');
    }

}
