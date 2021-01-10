<?php

namespace App\Repositories;

use App\Models\shop_discount;
use App\Repositories\BaseRepository;

/**
 * Class shop_discountRepository
 * @package App\Repositories
 * @version January 10, 2021, 6:08 am UTC
*/

class shop_discountRepository extends BaseRepository
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
        'min_price',
        'type',
        'kind',
        'discount_percent',
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
        return shop_discount::class;
    }
}
