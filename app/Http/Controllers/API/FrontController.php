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

    //对应别名的横幅
    public function banners(Request $request,$slug = 'main'){
        return api_tem(app('banner')->getCacheBanner($slug));
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
        #返回的用户对象
        $user=app('user')->model()::where('email',$email)->first();
        #如果邮件找的到的话 就继续往下面验证密码
        if(!empty($user)){
            $password = $user->password;
            if($password == $input['password']){
                 return api_tem($user->id);
            }
            else{
                 return api_tem('密码错误',1);
            } 
        }
        else{
              return api_tem('该邮箱地址不存在',1);
        }
    }
   
    //注册
    public function user_register(Request $request){
        $input = $request->all();
        $exit_user = app('user')->model()::where('email',$input['email'])->first();
        #如果已经注册过的邮箱不能重复注册
        if(!empty($exit_user)){
            return api_tem('该邮箱已使用',1);
        }
        return api_tem(app('user')->create($input));

    }

    //个人中心
    public function user_center(Request $request,$id){        
        return api_tem(app('user')->findWithoutFail($id));
    }

    //个人信息修改
    public function user_update(Request $request,$id){
        $user = app('user')->findWithoutFail($id);
        $user->update($request->all());
        return api_tem('更新成功');
    }

    //我的收藏
    public function user_collect(Request $request,$id){
        $user = app('user')->findWithoutFail($id);
        $collect =  $user->posts()->get();
        return api_tem($collect);
    }

    //我的吐槽 个人中心
    public function user_tucao(Request $request,$id){
        return api_tem(app('message')->getMessageListByUserObj(app('user')->findWithoutFail($id)));
        
    }

    //收藏/取消收藏 文章操作
    public function user_collect_action(Request $request,$id,$post_id,$status=true){
        return app('user')->collectAction(app('user')->findWithoutFail($id),$post_id,$status,false);
    }

    //心事吐槽列表 所有人看得到的
    public function tucaolist(Request $request){
       return api_tem(app('message')->all());
    }

    //发布吐槽 发布单条评论
    public function  publish_tucao(Request $request,$id){
       $user = app('user')->findWithoutFail($id);
       $input = $request->all();
       $input['name'] = $user->name;
       $input['email'] = $user->email;
       $message = app('message')->create($input);
       return api_tem('发布成功');
    }

}
