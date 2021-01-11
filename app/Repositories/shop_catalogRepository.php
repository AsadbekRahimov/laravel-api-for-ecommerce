<?php

namespace App\Repositories;

use App\Models\shop_catalog;
use App\Repositories\BaseRepository;

/**
 * Class shop_catalogRepository
 * @package App\Repositories
 * @version January 11, 2021, 9:17 am UTC
*/

class shop_catalogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sort',
        'name',
        'name_lang',
        'guid',
        'title',
        'title_lang',
        'tranz',
        'accept',
        'active',
        'user_company_id',
        'parent',
        'shop_element_id',
        'currency',
        'price',
        'amount',
        'available',
        'price_old',
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
        return shop_catalog::class;
    }
}
