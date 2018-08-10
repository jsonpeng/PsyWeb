<?php

namespace App\Models;

use Eloquent as Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 * @package App\Models
 * @version November 9, 2017, 9:24 pm CST
 *
 * @property string name
 * @property string email
 * @property string tel
 * @property string info
 */
class Message extends Model
{
    use SoftDeletes;

    public $table = 'messages';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'tel',
        'info'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'tel' => 'string',
        'info' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'info' => 'required'
    ];

    public function getrealiseUserImgAttribute(){
        $user=User::where('name',$this->name)->first();
        if(!empty($user)){
            return optional($user)->head_image;
        }
    }

       public function getrealiseUserInfoAttribute(){
        $user=User::where('name',$this->name)->first();
        if(!empty($user)){
            return '/usercenter/'.optional($user)->id;
        }
    }
    
}
