<?php

namespace App\Repositories;

use App\Models\shop_brand;
use App\Repositories\BaseRepository;

/**
 * Class shop_brandRepository
 * @package App\Repositories
 * @version January 10, 2021, 6:07 am UTC
*/

class shop_brandRepository extends BaseRepository
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
        'location',
        'image',
        'rating',
        'user_company_id',
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
        return shop_brand::class;
    }
}
