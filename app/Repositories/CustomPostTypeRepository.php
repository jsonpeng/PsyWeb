<?php

namespace App\Repositories;

use App\Models\CustomPostType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CustomPostTypeRepository
 * @package App\Repositories
 * @version December 18, 2017, 11:56 am CST
 *
 * @method CustomPostType findWithoutFail($id, $columns = ['*'])
 * @method CustomPostType find($id, $columns = ['*'])
 * @method CustomPostType first($columns = ['*'])
*/
class CustomPostTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug',
        'des'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CustomPostType::class;
    }

    public function getAttachListBySlug($slug){
        return CustomPostType::where('slug',$slug)->first()->postItems()->get();
    }

    public function getAll(){
        return CustomPostType::all();
    }

    public function getNameBySlug($slug){
        return CustomPostType::where('slug',$slug)->first();
    }

    public function getOneNameBySlug($slug){
        return CustomPostType::where('slug',$slug)->first()->name;
    }

}
