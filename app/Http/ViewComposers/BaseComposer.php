<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Repositories\SettingRepository;
use App\Repositories\MenuRepository;
use App\Repositories\LinkRepository;
use App\Repositories\BannerRepository;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;

//这个包同样可以控制用户角色信息获取登录
use Illuminate\Support\Facades\Auth;

class BaseComposer
{
    private $settingRepository;
    private $menuRepository;
    private $linkRepository;
    private $bannerRepository;
    private $postRepository;
    private $categoryRepository;

    public function __construct(
        SettingRepository $settingRepo,
        MenuRepository $menuRepo,
        LinkRepository $linkRepo,
        BannerRepository $bannerRepo,
        PostRepository $postRepo,
        CategoryRepository $categoryRepo
    )
    {
        $this->settingRepository = $settingRepo;
        $this->menuRepository = $menuRepo;
        $this->linkRepository = $linkRepo;
        $this->bannerRepository = $bannerRepo;
        $this->postRepository = $postRepo;
        $this->categoryRepository=$categoryRepo;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menus', $this->menuRepository->getCacheMenu('main'));
        $view->with('footer_menus', $this->menuRepository->getCacheMenu('footer'));
        $view->with('setting', $this->settingRepository->getCachedSetting());
        $view->with('banners', $this->bannerRepository->getCacheBanner('main'));
        $view->with('links', $this->linkRepository->cachedLinks());

        //热门推荐 推荐阅读
        $view->with('Remen',$this->postRepository->GetRandPosts(8));

        //点击排行
        $view->with('ClickSortPosts',$this->postRepository->ClickSortPosts(8));

        //大家都在看
        $view->with('WeSeePosts',$this->postRepository->ClickSortPosts(4));
        
        //猜你喜欢 分类列表
        $view->with('CaiYouLike',$this->categoryRepository->GetRandCats());

        //焦点关注
        $view->with('AttentionPosts',$this->postRepository->ClickSortPosts(6));

        //用户信息
        $view->with('userInfo',empty(Auth::user()?null:Auth::user()));
        //dd(Auth::user());
        //登录状态
        $view->with('loginStatus',Auth::check());

    }
}
