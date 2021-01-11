<?php

namespace App\Repositories;

use App\Models\shop_order;
use App\Repositories\BaseRepository;

/**
 * Class shop_orderRepository
 * @package App\Repositories
 * @version January 11, 2021, 9:19 am UTC
*/

class shop_orderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sort',
        'name',
        'name_lang',
        'code',
        'tranz',
        'accept',
        'active',
        'number',
        'user_id',
        'parent',
        'children',
        'contact_name',
        'status_universal',
        'contact_phone',
        'add_contact_phone',
        'date',
        'comment_user',
        'responsible',
        'place_adress_id',
        'place_region_id',
        'distance',
        'user_company_ids',
        'operator',
        'comment_agent',
        'tasks',
        'source',
        'source_type',
        'called_time',
        'shop_reject_cause_id',
        'cpas_track',
        'status_client',
        'status_client_history',
        'status_callcenter',
        'status_callcenter_history',
        'status_autodial',
        'status_logistics',
        'status_logistics_history',
        'status_accept',
        'status_accept_history',
        'status_deliver',
        'status_deliver_history',
        'date_deliver',
        'time_deliver',
        'date_approve',
        'date_return',
        'delayed_deliver_date',
        'shop_delay_id',
        'shop_delay_cause_id',
        'packaging',
        'labelled',
        'fragile',
        'weight',
        'weight_plan',
        'volume',
        'shop_shipment_id',
        'price',
        'prepayment',
        'deliver_price',
        'total_price',
        'shop_coupon_id',
        'shop_channel_id',
        'payment_type',
        'additional_payment_type',
        'additional_deliver',
        'additional_received_money',
        'accepted',
        'shop_element_ids',
        'ware_ids',
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
        return shop_order::class;
    }
}
