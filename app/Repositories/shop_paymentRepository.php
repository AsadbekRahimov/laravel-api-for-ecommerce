<?php

namespace App\Repositories;

use App\Models\shop_payment;
use App\Repositories\BaseRepository;

/**
 * Class shop_paymentRepository
 * @package App\Repositories
 * @version January 11, 2021, 9:20 am UTC
*/

class shop_paymentRepository extends BaseRepository
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
        'shop_order_id',
        'user_id',
        'payment',
        'code',
        'processor',
        'total',
        'date',
        'status',
        'details',
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
        return shop_payment::class;
    }
}
