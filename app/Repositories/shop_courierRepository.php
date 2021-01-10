<?php

namespace App\Repositories;

use App\Models\shop_courier;
use App\Repositories\BaseRepository;

/**
 * Class shop_courierRepository
 * @package App\Repositories
 * @version January 10, 2021, 6:08 am UTC
*/

class shop_courierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sort',
        'name',
        'name_lang',
        'code',
        'guid',
        'title',
        'title_lang',
        'tranz',
        'accept',
        'active',
        'delivery_price',
        'award_order',
        'award_return',
        'award_exchange',
        'bonus',
        'deposit',
        'status',
        'rating',
        'place_region_ids',
        'region_form',
        'user_company_id',
        'user_id',
        'auto_id',
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
        return shop_courier::class;
    }
}
