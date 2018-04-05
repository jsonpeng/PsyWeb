<?php

namespace App\Repositories;

use App\Models\CustomPostTypeItems;
use App\Models\CustomPostType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CustomPostTypeItemsRepository
 * @package App\Repositories
 * @version December 18, 2017, 2:36 pm CST
 *
 * @method CustomPostTypeItems findWithoutFail($id, $columns = ['*'])
 * @method CustomPostTypeItems find($id, $columns = ['*'])
 * @method CustomPostTypeItems first($columns = ['*'])
*/
class CustomPostTypeItemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'des',
        'type',
        'custom_post_type_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CustomPostTypeItems::class;
    }

    //通过父类id获取内容
    public function getItemsFoParentId($id)
    {
        return CustomPostTypeItems::where('custom_post_type_id', $id)->get();
    }

    //通过字段名获取到本身对象
    public function getOneByName($name)
    {
        return CustomPostTypeItems::where('name', $name)->first();
    }

    //通过字段名获取到上级别名
    public function getOneSlugByName($name){
        $items= CustomPostTypeItems::where('name', $name)->first();
        if(!empty($items)){
            $slug=CustomPostType::find($items->custom_post_type_id)->slug;
            return $slug;
        }else{
            return '';
        }
    }

}
