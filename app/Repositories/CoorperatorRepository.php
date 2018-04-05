<?php

namespace App\Repositories;

use App\Models\Coorperator;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CoorperatorRepository
 * @package App\Repositories
 * @version November 7, 2017, 4:14 pm CST
 *
 * @method Coorperator findWithoutFail($id, $columns = ['*'])
 * @method Coorperator find($id, $columns = ['*'])
 * @method Coorperator first($columns = ['*'])
*/
class CoorperatorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'image',
        'link'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Coorperator::class;
    }
}
