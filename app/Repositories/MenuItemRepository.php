<?php

namespace App\Repositories;

use App\Models\MenuItem;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MenuItemRepository
 * @package App\Repositories
 * @version November 3, 2017, 5:05 pm CST
 *
 * @method MenuItem findWithoutFail($id, $columns = ['*'])
 * @method MenuItem find($id, $columns = ['*'])
 * @method MenuItem first($columns = ['*'])
*/
class MenuItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'sort',
        'link',
        'parent_id',
        'menu_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MenuItem::class;
    }
}
