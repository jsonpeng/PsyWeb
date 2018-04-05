<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CustomPostTypeItems
 * @package App\Models
 * @version December 18, 2017, 2:36 pm CST
 *
 * @property string name
 * @property string des
 * @property string type
 */
class CustomPostTypeItems extends Model
{
    use SoftDeletes;

    public $table = 'custom_post_type_items';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'des',
        'type',
        'custom_post_type_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'des' => 'string',
        'type' => 'string',
        'custom_post_type_id'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'=>'required'
    ];


    public function post_type(){
        return $this->belongsTo('App\Models\CustomPostType');
    }
    
}
