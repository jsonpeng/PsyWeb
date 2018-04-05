<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CustomPostType
 * @package App\Models
 * @version December 18, 2017, 11:56 am CST
 *
 * @property string name
 * @property string slug
 * @property string des
 */
class CustomPostType extends Model
{
    use SoftDeletes;

    public $table = 'custom_post_types';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'slug',
        'des'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'des' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function postItems(){
        return $this->hasMany('App\Models\CustomPostTypeItems');
    }
    
}
