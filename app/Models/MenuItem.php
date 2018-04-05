<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MenuItem
 * @package App\Models
 * @version November 3, 2017, 5:05 pm CST
 *
 * @property string name
 * @property string sort
 * @property string link
 * @property integer parent_id
 * @property integer menu_id
 */
class MenuItem extends Model
{
    use SoftDeletes;

    public $table = 'menu_items';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'sort',
        'link',
        'parent_id',
        'menu_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'sort' => 'string',
        'link' => 'string',
        'parent_id' => 'integer',
        'menu_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'sort' => 'required',
        'link' => 'required'
    ];

    
}
