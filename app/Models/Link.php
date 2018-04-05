<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Link
 * @package App\Models
 * @version November 7, 2017, 4:15 pm CST
 *
 * @property string name
 * @property string link
 */
class Link extends Model
{
    use SoftDeletes;

    public $table = 'links';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'link' => 'required'
    ];

    
}
