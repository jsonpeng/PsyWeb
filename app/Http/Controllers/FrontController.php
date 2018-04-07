<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SettingRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\PageRepository;
use App\Repositories\MenuRepository;
use App\Repositories\MessageRepository;
use App\Repositories\LinkRepository;
use App\Repositories\BannerRepository;
use App\Repositories\CoorperatorRepository;
use Illuminate\Support\Facades\Log;
use App\Models\Banner;
use Mail;
use App\Models\Post;
//这里要使用User类 这个类会映射你本地数据库的users表
use App\User;
//这个包同样可以控制用户角色信息获取登录
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
	private $settingRepository;
	private $categoryRepository;
	private $postRepository;
	private $pageRepository;
    private $menuRepository;
    private $messageRepository;
    private $linkRepository;
    private $bannerRepository;

    public function __construct(
    	SettingRepository $settingRepo,
    	CategoryRepository $categoryRepo,
    	PostRepository $postRepo,
    	PageRepository $pageRepo,
        MenuRepository $menuRepo,
        MessageRepository $messageRepo,
        LinkRepository $linkRepo,
        BannerRepository $bannerRepo
    )
    {
        $this->settingRepository = $settingRepo;
        $this->categoryRepository = $categoryRepo;
        $this->postRepository = $postRepo;
        $this->pageRepository = $pageRepo;
        $this->menuRepository = $menuRepo;
        $this->messageRepository = $messageRepo;
        $this->linkRepository = $linkRepo;
        $this->bannerRepository = $bannerRepo;
    }

    // 首页
    public function index(Request $request)
    {

        //右侧文章列表 取每个分类的最新上传的第一篇文章
        
        #大学成长
        $UniversityGrowth=$this->categoryRepository->getCachePostFirstOfCatIncludeChildren('UniversityGrowth');

        #校园社交
        $CampusAssocia=$this->categoryRepository->getCachePostFirstOfCatIncludeChildren('CampusAssocia');

        #每日心理学
        $Psychology=$this->categoryRepository->getCachePostFirstOfCatIncludeChildren('Psychology');

        #心灵鸡汤
        $ChickenSoup=$this->categoryRepository->getCachePostFirstOfCatIncludeChildren('ChickenSoup');

        #所有分类列表
        $RootCat=$this->categoryRepository->getRootCat();

        #最新资讯
        $NewsestPosts=$this->postRepository->NewsestPosts();

        $input=$request->all();

        #搜索结果
        $serach_word=null;

        if(array_key_exists('word',$input)){
            if(!empty($input['word'])){
                $serach_word=$this->postRepository->SerachPostList($input['word']);

                //dd($input['word']);
            }
        }
        #ZHEGEHAODUOL好多了
        #如果有uinfo我们 就取对应的用户信息
         if(array_key_exists('uinfo',$input)){
            if(!empty($input['uinfo'])){
                $user=User::where('email',$input['uinfo'])->first();
                #这种方法会查两次数据库  不过相对是通过url参数来实现denglu
                    if(!empty($user)){
                    return '登录的用户是'.$user->name;
                }
            }
        }

        // if(!empty(Auth::user())){
        //     $user=Auth::logout();
        //     $request->session()->invalidate();
        // }
    	return view('front.index',compact('input','serach_word','UniversityGrowth','CampusAssocia','Psychology','ChickenSoup','RootCat','NewsestPosts'));
       
    }

    //分类页面
    public function cat(Request $request, $id)
    {
        $category = '';
        if (is_numeric($id)) {
            $category = $this->categoryRepository->getCacheCategory($id);
        } else {
            $category = $this->categoryRepository->getCacheCategoryBySlug($id);
        }
    
    	//分类信息不存在
        if (empty($category)) {
            return redirect('/');
        }
    	$setting = $this->settingRepository->getCachedSetting();
        //$posts = $category->posts()->where('status', 1)->paginate($setting->post_page);
        $posts=$this->categoryRepository->getCachePostOfCatIncludeChildren($category);
        
        if($category->slug=='PsychologyGuide' || $category->slug=='PsychologyTest'){
           return redirect(route('login'));
        }


    	//是否为该分类自定义了模板
    	if (view()->exists('front.cat.'.$category->slug)) {
    		return view('front.cat.'.$category->slug)->with('category', $category)->with('posts', $posts);
    	} else {
    		return view('front.cat.index')->with('category', $category)->with('posts', $posts);
    	}
    }

    //文章页面
    public function post(Request $request, $id)
    {
    	$post = $this->postRepository->getCachePost($id);
    	//分类信息不存在
        if (empty($post)) {
            return redirect('/');
        }
        $post->update(['view' => $post->view + 1]);

        $prePost = $this->postRepository->PrevPost($id);
        $nextPost = $this->postRepository->NextPost($id);

        //相关热点
        $HotPostsList=$this->postRepository->HotPostsByPostId($id,4);
        
        //推荐阅读
        $TuiJianRead=$this->postRepository->GetRandPosts(15);

    	//是否为该分类自定义了模板
    	//一个文章会属于几个分类
    	$cats = $post->cats;
        $category=null;
    	foreach ($cats as $key => $cat) {
            $category=$cat;
    		if (view()->exists('front.post.'.$cat->slug)) {
	    		return view('front.post.'.$cat->slug)->with('TuiJianRead',$TuiJianRead)->with('HotPostsList',$HotPostsList)->with('post', $post)->with('prePost', $prePost)->with('nextPost', $nextPost);
	    	}
    	}
      

    	return view('front.post.index')->with('TuiJianRead',$TuiJianRead)->with('HotPostsList',$HotPostsList)->with('category',$category)->with('post', $post)->with('prePost', $prePost)->with('nextPost', $nextPost);
    }

    //单页面
    public function page(Request $request, $id)
    {
        $page = '';
        if (is_numeric($id)) {
            $page = $this->pageRepository->getCachePage($id);
        } else {
            $page = $this->pageRepository->getCachePageBySlug($id);
        }
        
    	//分类信息不存在
        if (empty($page)) {
            return redirect('/');
        }

        $page->update(['view' => $page->view + 1]);

    	//是否为该分类自定义了模板
    	if (view()->exists('front.page.'.$page->slug)) {
    		return view('front.page.'.$page->slug)->with('page', $page);
    	} else {
    		return view('front.page.index')->with('page', $page);
    	}
    }
    /**
     *登录接口交互
     *登录需要验证邮箱和密码
     主要是一个取数据查数据的过程
     现在登录成功了 还需要显示用户信息 所以我们就需要在重定向的时候把用户登录信息存储到session或者 后缀中去 比如我现在用后缀 然后取用户信息
     */
    public function loginApi(Request $request){
            $input=$request->all();

            $email=$input['email'];

            #先验证邮箱 再验证密码 这一段查询相当于 select * from users where `email` = `$email`;
            $user=User::where('email',$email)->first();

            #如果能找到该用户的结果 我们再验证密码
            if(!empty($user)){
                #这里是数据表中users的密码
                $password=$user->password;
                #这里验证密码是匹配的就跳到首页 否则就重定向到登录
                if($password==$input['password']){
                    #php用.拼接字符串
                    Auth::login($user);
                    return redirect('/');
                }else{
                    return redirect(route('login'));
                }

            }
            #同理这里也是
            else{
                return redirect(route('login'));
            }

    }

   /**
     *注册接口交互
     */
    public function regApi(Request $request){

        //这一段代码会默认把所有http发送过来的数据转换为数组键值对
        $input=$request->all();

        //create==insert 这个括号里面的参数类型是array数组
        //然后 需要注意的一点是 如果用户已经有了 用户名重复的 你觉得可以继续创建吗?不会 那就先不管他
        //然后我需要用这个键值对来创建新的用户

        #创建用户
        $user=User::create($input);

        #跳转到登录页
        return redirect(route('login'));

     }

    public function login(Request $request){
        return view('front.user.login');
    }

    public function reg(Request $request){
        return view('front.user.reg');
    }


    public function submitInfo(Request $request){
        $name=$request->get('name');
        $tel=$request->get('tel');
        $info=$request->get('info');
        $this->messageRepository->create([
            'name'=>$name,
            'tel'=>$tel,
            'info'=>$info
        ]);


        Mail::send('emails.index',['tel'=>$tel,'info'=>$info],function($message){
            $to =$this->settingRepository->findWithoutFail(1)->email;
            $message ->to($to)->subject('预约试听体验课成功');
        });

        return ['status'=>true,'msg'=>'提交成功'];
    }

}
