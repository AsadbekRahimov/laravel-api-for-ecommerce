<?php

namespace App\Repositories;

use App\Models\shop_order_item;
use App\Repositories\BaseRepository;

/**
 * Class shop_order_itemRepository
 * @package App\Repositories
 * @version January 10, 2021, 6:09 am UTC
*/

class shop_order_itemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sort',
        'name',
        'name_lang',
        'tranz',
        'accept',
        'active',
        'shop_order_id',
        'ware_id',
        'user_company_id',
        'shop_catalog_id',
        'best_before',
        'ware_return_id',
        'amount',
        'amount_history',
        'amount_partial',
        'amount_return',
        'price',
        'price_all',
        'price_all_partial',
        'price_all_return',
        'accepted',
        'check_return',
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
        return shop_order_item::class;
    }
}
