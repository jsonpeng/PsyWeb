<?php

namespace App\Repositories;

use App\Models\Page;
use InfyOm\Generator\Common\BaseRepository;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

/**
 * Class PageRepository
 * @package App\Repositories
 * @version October 17, 2017, 8:08 pm CST
 *
 * @method Page findWithoutFail($id, $columns = ['*'])
 * @method Page find($id, $columns = ['*'])
 * @method Page first($columns = ['*'])
*/
class PageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug',
        'content',
        'view',
        'seo_title',
        'seo_keyword',
        'seo_des',
        'status',
        'image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Page::class;
    }

    public function getCachePage($id){
        return Cache::remember('zcjy_page_'.$id, Config::get('web.shrottimecache'), function() use ($id) {
            try {
                return Page::find($id);
            } catch (Exception $e) {
                return;
            }
        });
    }

    public function getCachePageBySlug($slug){
        return Cache::remember('zcjy_page_'.$slug, Config::get('web.shrottimecache'), function() use ($slug) {
            try {
                return Page::where('slug', $slug)->first();
            } catch (Exception $e) {
                return;
            }
        });
    }
}
