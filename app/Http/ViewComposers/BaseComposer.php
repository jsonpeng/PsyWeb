<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Repositories\SettingRepository;
use App\Repositories\MenuRepository;
use App\Repositories\LinkRepository;
use App\Repositories\BannerRepository;

class BaseComposer
{
    private $settingRepository;
    private $menuRepository;
    private $linkRepository;
    private $bannerRepository;

    public function __construct(
        SettingRepository $settingRepo,
        MenuRepository $menuRepo,
        LinkRepository $linkRepo,
        BannerRepository $bannerRepo
    )
    {
        $this->settingRepository = $settingRepo;
        $this->menuRepository = $menuRepo;
        $this->linkRepository = $linkRepo;
        $this->bannerRepository = $bannerRepo;
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
    }
}
