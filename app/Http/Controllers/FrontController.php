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

use Illuminate\Support\Facades\Log;

use Mail;
use App\Models\Post;

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
        $index_content=$this->pageRepository->getCachePageBySlug('index');


    	return view('front.index')
            //->with('banners', $banners)
            ->with('index_content', $index_content);
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
        $posts = $category->posts()->paginate($setting->post_page);

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
    	//是否为该分类自定义了模板
    	//一个文章会属于几个分类
    	$cats = $post->cats;
    	foreach ($cats as $key => $cat) {
    		if (view()->exists('front.post.'.$cat->slug)) {
	    		return view('front.post.'.$cat->slug)->with('post', $post)->with('prePost', $prePost)->with('nextPost', $nextPost);
	    	}
    	}
    	return view('front.post.index')->with('post', $post)->with('prePost', $prePost)->with('nextPost', $nextPost);
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
