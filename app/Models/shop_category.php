<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="shop_category",
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
class shop_category extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'shop_category';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'sort',
        'name',
        'name_lang',
        'title',
        'title_lang',
        'tranz',
        'accept',
        'active',
        'icon',
        'shop_brand_ids',
        'shop_review_option_ids',
        'shop_option_type',
        'shop_category_id',
        'image',
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
        'title' => 'string',
        'title_lang' => 'string',
        'tranz' => 'boolean',
        'accept' => 'boolean',
        'active' => 'boolean',
        'icon' => 'string',
        'shop_brand_ids' => 'string',
        'shop_review_option_ids' => 'string',
        'shop_option_type' => 'string',
        'shop_category_id' => 'integer',
        'image' => 'string',
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
        'title' => 'nullable|string|max:255',
        'title_lang' => 'nullable|string',
        'tranz' => 'nullable|boolean',
        'accept' => 'nullable|boolean',
        'active' => 'nullable|boolean',
        'icon' => 'nullable|string|max:255',
        'shop_brand_ids' => 'nullable|string',
        'shop_review_option_ids' => 'nullable|string',
        'shop_option_type' => 'nullable|string',
        'shop_category_id' => 'nullable|integer',
        'image' => 'nullable|string',
        'deleted_at' => 'nullable',
        'deleted_by' => 'nullable|integer',
        'deleted_text' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'modified_at' => 'nullable',
        'created_by' => 'nullable|integer',
        'modified_by' => 'nullable|integer'
    ];

    
}
