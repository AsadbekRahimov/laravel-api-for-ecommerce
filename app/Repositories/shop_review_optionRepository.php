<?php

namespace App\Repositories;

use App\Models\shop_review_option;
use App\Repositories\BaseRepository;

/**
 * Class shop_review_optionRepository
 * @package App\Repositories
 * @version January 11, 2021, 9:20 am UTC
*/

class shop_review_optionRepository extends BaseRepository
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
        'shop_option_branch_id',
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
        return shop_review_option::class;
    }
}
