<?php

namespace App\Repositories;

use App\Models\shop_catalog_ware;
use App\Repositories\BaseRepository;

/**
 * Class shop_catalog_wareRepository
 * @package App\Repositories
 * @version January 11, 2021, 9:18 am UTC
*/

class shop_catalog_wareRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sort',
        'title',
        'title_lang',
        'tranz',
        'accept',
        'active',
        'shop_catalog_id',
        'ware_id',
        'best_before',
        'amount',
        'amount_history',
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
        return shop_catalog_ware::class;
    }
}
