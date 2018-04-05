<?php

namespace App\Repositories;

use App\Models\Setting;
use InfyOm\Generator\Common\BaseRepository;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
/**
 * Class SettingRepository
 * @package App\Repositories
 * @version October 17, 2017, 2:48 pm CST
 *
 * @method Setting findWithoutFail($id, $columns = ['*'])
 * @method Setting find($id, $columns = ['*'])
 * @method Setting first($columns = ['*'])
*/
class SettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'site_name',
        'key_words',
        'description',
        'contactor',
        'mobile',
        'tel',
        'tel_tousu',
        'intro',
        'address',
        'logo',
        'weixin',
        'qq',
        'post_page'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Setting::class;
    }

    //通过别名获取分类信息
    public function getCachedSetting(){
        return Cache::remember('glabal_setting', Config::get('web.longtimecache'), function() {
            $setting = Setting::first();
            if (is_null($setting)) {
                return Setting::create([
                    'name' => '网站名称'
                ]);
            } else {
                return $setting;
            }
        });
    }
}
