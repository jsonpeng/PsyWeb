<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PageItems
 * @package App\Models
 * @version December 20, 2017, 5:08 pm CST
 *
 * @property string key
 * @property string name
 * @property string type
 * @property string value
 * @property integer page_id
 * @property integer custom_page_types_id
 */
class PageItems extends Model
{
    use SoftDeletes;

    public $table = 'page_items';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'key',
        'name',
        'type',
        'value',
        'type',
        'page_id',
        'custom_page_types_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'key' => 'string',
        'name' => 'string',
        'type' => 'string',
        'value' => 'string',
        'type'=>'string',
        'page_id' => 'integer',
        'custom_page_types_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function page_type(){
        return $this->belongsTo('App\Models\CustomPageType');
    }

    public function page(){
        return $this->belongsTo('App\Models\Page');
    }
}
