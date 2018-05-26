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

    //菜单的数据
    public function menus(){
        $menus = app('menu')->getCacheMenu('main');
        return api_tem($menus);
    }

    //所有的分类
    public function all_cats(){
        return api_tem(app('cat')->getRootCat());
    }

    //最新资讯
    public function newest_post(){
        return api_tem(app('post')->NewsestPosts());
    }

    //大学成长
    public function cat_posts($slug){
        return api_tem(app('cat')->getCachePostFirstOfCatIncludeChildren($slug));
    }

    //搜索文章
    public function search_posts(Request $request){
        return (api_tem(app('post')->SerachPostList($request->input('query'))));
    }
    
    //登录
    public function user_login(Request $request){
        $input = $request->all();
        $email = $input['email'];
        $password==$input['password'];
        
        #返回的用户对象
        $user=app('user')->model()::where('email',$email)->first();

        return api_tem($user->id);
    }
   
    //注册
    public function user_register(Request $request){
        $input=$request->all();
        return api_tem(app('user')->create($input));

    }

    //个人中心
    public function user_center(Request $request,$id){        
        //return api_tem(app('user')->);

    }
    //个人信息修改

    //我的收藏
    public function user_collect(Request $request){

    }
    //我的吐槽
    public function user_tucao(Request $request){
        return api_tem(app('message')->getmessageBoard($request->input('id')));
    }

    //收藏/取消收藏 文章操作

    //心事吐槽列表
    public function tucaolist(Request $request){
        return api_tem(app('message')->getMessageListByUserObj($request->input('id')));
    }

    //发布吐槽

    //更换头像
    public function head_img(){
        return api_tem();
    }
}
