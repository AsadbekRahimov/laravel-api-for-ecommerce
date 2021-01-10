<?php

namespace App\Repositories;

use App\Models\shop_coupon;
use App\Repositories\BaseRepository;

/**
 * Class shop_couponRepository
 * @package App\Repositories
 * @version January 10, 2021, 6:08 am UTC
*/

class shop_couponRepository extends BaseRepository
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
        'type',
        'price',
        'currency',
        'percent',
        'useful_count',
        'min_price_order',
        'coupon_code',
        'comment',
        'published_at',
        'expired_at',
        'status',
        'shop_category_id',
        'shop_product_id',
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
        return shop_coupon::class;
    }
}
