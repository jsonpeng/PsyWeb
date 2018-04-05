<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\CustomPostTypeItems;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PostItems
 * @package App\Models
 * @version December 19, 2017, 9:52 am CST
 *
 * @property string key
 * @property string name
 * @property string value
 * @property integer post_id
 */
class PostItems extends Model
{
    use SoftDeletes;

    public $table = 'post_items';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'key',
        'name',
        'value',
        'post_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'key' => 'string',
        'name' => 'string',
        'value' => 'string',
        'post_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    //所属post
    public function post(){
        return $this->belongsTo('App\Models\post');
    }

    //寻址类型
    public function getfindTypeAttribute(){
        $v=CustomPostTypeItems::where('name',$this->key)->first();
        if(!empty($v)){
            return $v->type;
        }else{
            return 'text';
        }

    }


    public function post_type(){
        return $this->belongsTo('App\Models\CustomPostType');
    }

}
