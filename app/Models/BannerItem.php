<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BannerItem
 * @package App\Models
 * @version December 4, 2017, 12:17 pm CST
 *
 * @property string image
 * @property string link
 * @property integer sort
 */
class BannerItem extends Model
{
    use SoftDeletes;

    public $table = 'banner_items';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'image',
        'link',
        'sort',
        'banner_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'string',
        'link' => 'string',
        'sort' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required',
    ];

    //所属BANNER
    public function banner(){
        return $this->belongsTo('App\Models\Banner');
    }
}
