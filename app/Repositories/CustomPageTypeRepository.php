<?php

namespace App\Repositories;

use App\Models\CustomPageType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CustomPageTypeRepository
 * @package App\Repositories
 * @version December 20, 2017, 4:34 pm CST
 *
 * @method CustomPageType findWithoutFail($id, $columns = ['*'])
 * @method CustomPageType find($id, $columns = ['*'])
 * @method CustomPageType first($columns = ['*'])
*/
class CustomPageTypeRepository extends BaseRepository
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
        return CustomPageType::class;
    }
}
