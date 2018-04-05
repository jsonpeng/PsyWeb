<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CustomPageType
 * @package App\Models
 * @version December 20, 2017, 4:34 pm CST
 *
 * @property string name
 * @property string slug
 * @property string des
 */
class CustomPageType extends Model
{
    use SoftDeletes;

    public $table = 'custom_page_types';
    

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

    public function pageItems(){
        return $this->hasMany('App\Models\PostItems');
    }



}
