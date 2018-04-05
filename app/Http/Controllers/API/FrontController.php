<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Repositories\MessageRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

use Mail;

class FrontController extends Controller
{

    private $messageRepository;

    public function __construct(
        MessageRepository $messageRepo
    )
    {
        $this->messageRepository = $messageRepo;
    }

    //提交留言信息
    public function submitInfo(Request $request)
    {
        $input = $request->all();

        $message = $this->messageRepository->create($input);   

        $flag = Mail::send('front.mail',['name'=>$message->name, 'email'=>$message->email, 'tel'=>$message->tel, 'info'=>$message->info], function($message){
            $to = 'yyjz@foxmail.com';
            $message ->to($to)->subject('您有新的客户留言');
        });


        return '信息提交成功';
    }
}
