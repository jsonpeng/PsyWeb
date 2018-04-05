<?php

namespace App\Repositories;

use App\Models\Link;
use InfyOm\Generator\Common\BaseRepository;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

/**
 * Class LinkRepository
 * @package App\Repositories
 * @version November 7, 2017, 4:15 pm CST
 *
 * @method Link findWithoutFail($id, $columns = ['*'])
 * @method Link find($id, $columns = ['*'])
 * @method Link first($columns = ['*'])
*/
class LinkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'link'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Link::class;
    }

    public function cachedLinks()
    {
        return Cache::remember('all_links', Config::get('web.longtimecache'), function() {
            return Link::all();
        });
        
    }
}
