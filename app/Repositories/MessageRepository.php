<?php

namespace App\Repositories;

use App\Models\Message;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MessageRepository
 * @package App\Repositories
 * @version November 9, 2017, 9:24 pm CST
 *
 * @method Message findWithoutFail($id, $columns = ['*'])
 * @method Message find($id, $columns = ['*'])
 * @method Message first($columns = ['*'])
*/
class MessageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'tel',
        'info'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Message::class;
    }

    //通过用户对象找到对应的评论列表
    public function getMessageListByUserObj($user){
        $message=Message::where('name',$user->name)->orderBy('created_at','desc')->get();
        foreach ($message as $key => $value) {
           $value['time']=$value->created_at->diffForHumans();
        }
        return $message;
    }
}
