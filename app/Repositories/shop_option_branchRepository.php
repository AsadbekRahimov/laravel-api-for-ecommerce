<?php

namespace App\Repositories;

use App\Models\shop_option_branch;
use App\Repositories\BaseRepository;

/**
 * Class shop_option_branchRepository
 * @package App\Repositories
 * @version January 10, 2021, 6:09 am UTC
*/

class shop_option_branchRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sort',
        'name',
        'name_lang',
        'title',
        'title_lang',
        'tranz',
        'accept',
        'active',
        'show',
        'deleted_by',
        'deleted_text',
        'modified_at',
        'created_by',
        'modified_by'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return shop_option_branch::class;
    }
}
