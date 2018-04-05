<?php

namespace App\Repositories;

use App\Models\Banner;
use InfyOm\Generator\Common\BaseRepository;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

use App\Models\BannerItem;

/**
 * Class BannerRepository
 * @package App\Repositories
 * @version October 17, 2017, 8:45 pm CST
 *
 * @method Banner findWithoutFail($id, $columns = ['*'])
 * @method Banner find($id, $columns = ['*'])
 * @method Banner first($columns = ['*'])
*/
class BannerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'link',
        'sort'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Banner::class;
    }

    public function banners()
    {
        return Banner::all();
    }

/*
    public function cachedBanners()
    {
        return Cache::remember('all_banners', Config::get('web.longtimecache'), function() {
            return Banner::all();
        });
        
    }
*/
    public function getCacheBanner($slug)
    {
        return Cache::remember('banner_'.$slug, Config::get('web.shrottimecache'), function() use ($slug) {
            try {
                $banner = Banner::where('slug', $slug)->first();
                if (is_null($banner)) {
                    return [];
                }else{
                    return $banner->bannerItems()->orderBy('sort', 'asc')->get();
                }
            } catch (Exception $e) {
                return;
            }
        });
    }
}
