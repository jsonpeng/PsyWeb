<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Coorperator
 * @package App\Models
 * @version November 7, 2017, 4:14 pm CST
 *
 * @property stirng name
 * @property string image
 * @property string link
 */
class Coorperator extends Model
{
    use SoftDeletes;

    public $table = 'coorperators';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'image',
        'link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'string',
        'link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
