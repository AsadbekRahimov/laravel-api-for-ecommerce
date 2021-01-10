<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="shop_order",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sort",
 *          description="Сортировка",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="Уникальное имя",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name_lang",
 *          description="Переводы Уникальное имя",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="Название",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="title_lang",
 *          description="Переводы Название",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tranz",
 *          description="Транзакция",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="accept",
 *          description="Принято",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="active",
 *          description="Активный",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="user_company_id",
 *          description="Магазин",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="lang",
 *          description="Язык",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="image",
 *          description="Изображение",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="link",
 *          description="Ссылка",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="common",
 *          description="Показать на главной?",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="Время удаления",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="deleted_by",
 *          description="Удалён пользователем",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="deleted_text",
 *          description="Комментария удаления",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="Время создания",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="modified_at",
 *          description="Время изменения",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="created_by",
 *          description="Создан пользователем",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="modified_by",
 *          description="Изменен пользователем",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class shop_order extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'shop_order';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sort' => 'integer',
        'name' => 'string',
        'name_lang' => 'string',
        'code' => 'string',
        'tranz' => 'boolean',
        'accept' => 'boolean',
        'active' => 'boolean',
        'number' => 'string',
        'user_id' => 'integer',
        'parent' => 'integer',
        'children' => 'integer',
        'contact_name' => 'string',
        'status_universal' => 'string',
        'contact_phone' => 'string',
        'add_contact_phone' => 'string',
        'date' => 'date',
        'comment_user' => 'string',
        'responsible' => 'integer',
        'place_adress_id' => 'integer',
        'place_region_id' => 'integer',
        'distance' => 'float',
        'user_company_ids' => 'string',
        'operator' => 'integer',
        'comment_agent' => 'string',
        'tasks' => 'string',
        'source' => 'integer',
        'source_type' => 'string',
        'called_time' => 'datetime',
        'shop_reject_cause_id' => 'integer',
        'cpas_track' => 'string',
        'status_client' => 'string',
        'status_client_history' => 'string',
        'status_callcenter' => 'string',
        'status_callcenter_history' => 'string',
        'status_autodial' => 'string',
        'status_logistics' => 'string',
        'status_logistics_history' => 'string',
        'status_accept' => 'string',
        'status_accept_history' => 'string',
        'status_deliver' => 'string',
        'status_deliver_history' => 'string',
        'date_deliver' => 'date',
        'time_deliver' => 'string',
        'date_approve' => 'datetime',
        'date_return' => 'date',
        'delayed_deliver_date' => 'date',
        'shop_delay_id' => 'integer',
        'shop_delay_cause_id' => 'integer',
        'packaging' => 'integer',
        'labelled' => 'string',
        'fragile' => 'string',
        'weight' => 'float',
        'weight_plan' => 'float',
        'volume' => 'integer',
        'shop_shipment_id' => 'integer',
        'price' => 'integer',
        'prepayment' => 'integer',
        'deliver_price' => 'integer',
        'total_price' => 'integer',
        'shop_coupon_id' => 'integer',
        'shop_channel_id' => 'integer',
        'payment_type' => 'string',
        'additional_payment_type' => 'string',
        'additional_deliver' => 'integer',
        'additional_received_money' => 'integer',
        'accepted' => 'boolean',
        'shop_element_ids' => 'string',
        'ware_ids' => 'string',
        'deleted_by' => 'integer',
        'deleted_text' => 'string',
        'modified_at' => 'datetime',
        'created_by' => 'integer',
        'modified_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sort' => 'nullable|integer',
        'name' => 'nullable|string|max:255',
        'name_lang' => 'nullable|string',
        'code' => 'nullable|string|max:255',
        'tranz' => 'nullable|boolean',
        'accept' => 'nullable|boolean',
        'active' => 'nullable|boolean',
        'number' => 'nullable|string|max:255',
        'user_id' => 'nullable|integer',
        'parent' => 'nullable|integer',
        'children' => 'nullable|integer',
        'contact_name' => 'nullable|string|max:255',
        'status_universal' => 'nullable|string|max:255',
        'contact_phone' => 'nullable|string|max:255',
        'add_contact_phone' => 'nullable|string|max:255',
        'date' => 'nullable',
        'comment_user' => 'nullable|string|max:255',
        'responsible' => 'nullable|integer',
        'place_adress_id' => 'nullable|integer',
        'place_region_id' => 'nullable|integer',
        'distance' => 'nullable|numeric',
        'user_company_ids' => 'nullable|string',
        'operator' => 'nullable|integer',
        'comment_agent' => 'nullable|string|max:255',
        'tasks' => 'nullable|string|max:255',
        'source' => 'nullable|integer',
        'source_type' => 'nullable|string|max:255',
        'called_time' => 'nullable',
        'shop_reject_cause_id' => 'nullable|integer',
        'cpas_track' => 'nullable|string|max:255',
        'status_client' => 'nullable|string|max:255',
        'status_client_history' => 'nullable|string',
        'status_callcenter' => 'nullable|string|max:255',
        'status_callcenter_history' => 'nullable|string',
        'status_autodial' => 'nullable|string|max:255',
        'status_logistics' => 'nullable|string|max:255',
        'status_logistics_history' => 'nullable|string',
        'status_accept' => 'nullable|string|max:255',
        'status_accept_history' => 'nullable|string',
        'status_deliver' => 'nullable|string|max:255',
        'status_deliver_history' => 'nullable|string',
        'date_deliver' => 'nullable',
        'time_deliver' => 'nullable|string|max:255',
        'date_approve' => 'nullable',
        'date_return' => 'nullable',
        'delayed_deliver_date' => 'nullable',
        'shop_delay_id' => 'nullable|integer',
        'shop_delay_cause_id' => 'nullable|integer',
        'packaging' => 'nullable|integer',
        'labelled' => 'nullable|string|max:255',
        'fragile' => 'nullable|string|max:255',
        'weight' => 'nullable|numeric',
        'weight_plan' => 'nullable|numeric',
        'volume' => 'nullable|integer',
        'shop_shipment_id' => 'nullable|integer',
        'price' => 'nullable',
        'prepayment' => 'nullable',
        'deliver_price' => 'nullable|integer',
        'total_price' => 'nullable',
        'shop_coupon_id' => 'nullable|integer',
        'shop_channel_id' => 'nullable|integer',
        'payment_type' => 'nullable|string|max:255',
        'additional_payment_type' => 'nullable|string|max:255',
        'additional_deliver' => 'nullable|integer',
        'additional_received_money' => 'nullable',
        'accepted' => 'nullable|boolean',
        'shop_element_ids' => 'nullable|string',
        'ware_ids' => 'nullable|string',
        'deleted_at' => 'nullable',
        'deleted_by' => 'nullable|integer',
        'deleted_text' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'modified_at' => 'nullable',
        'created_by' => 'nullable|integer',
        'modified_by' => 'nullable|integer'
    ];

    
}
