<?php

namespace App\Repositories;

use App\Models\shop_shipment;
use App\Repositories\BaseRepository;

/**
 * Class shop_shipmentRepository
 * @package App\Repositories
 * @version January 11, 2021, 9:20 am UTC
*/

class shop_shipmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sort',
        'name',
        'name_lang',
        'code',
        'title',
        'title_lang',
        'tranz',
        'accept',
        'active',
        'date',
        'date_deliver',
        'date_deliver_history',
        'shipment_type',
        'shop_courier_id',
        'responsible',
        'comment',
        'ware_place_ids',
        'user_place_ids',
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
        return shop_shipment::class;
    }
}
