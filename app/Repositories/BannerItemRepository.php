<?php

namespace App\Repositories;

use App\Models\BannerItem;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BannerItemRepository
 * @package App\Repositories
 * @version December 4, 2017, 12:17 pm CST
 *
 * @method BannerItem findWithoutFail($id, $columns = ['*'])
 * @method BannerItem find($id, $columns = ['*'])
 * @method BannerItem first($columns = ['*'])
*/
class BannerItemRepository extends BaseRepository
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
        return BannerItem::class;
    }

    public function getBannerItemsFoParent($id)
    {
        return BannerItem::where('banner_id', $id)->orderBy('sort', 'asc')->get();
    }
}
