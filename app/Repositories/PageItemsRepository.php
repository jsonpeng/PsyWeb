<?php

namespace App\Repositories;

use App\Models\PageItems;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PageItemsRepository
 * @package App\Repositories
 * @version December 20, 2017, 5:08 pm CST
 *
 * @method PageItems findWithoutFail($id, $columns = ['*'])
 * @method PageItems find($id, $columns = ['*'])
 * @method PageItems first($columns = ['*'])
*/
class PageItemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key',
        'name',
        'type',
        'value',
        'page_id',
        'custom_page_types_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PageItems::class;
    }

    public function getItemsFoParentId($id)
    {
        return PageItems::where('custom_page_types_id', $id)->get();
    }

    public function updateValueByKey($key,$v){
        return PageItems::where('key',$key)->update(['value'=>$v]);
    }
}
