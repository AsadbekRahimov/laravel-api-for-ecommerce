<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="shop_product",
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
 *          description="Компания",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="shop_category_id",
 *          description="Категория",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="package",
 *          description="Упаковка",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="shop_option",
 *          description="Параметры опций",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="text",
 *          description="Полное описание продукта",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="text_lang",
 *          description="Переводы Полное описание продукта",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="image",
 *          description="Изображения",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="shop_option_ids",
 *          description="Опции продукта",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="shop_brand_id",
 *          description="Бренд",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="related",
 *          description="Связанные товары",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="shelf_life",
 *          description="Срок годности",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="shelf_life_unit",
 *          description="Единица измерения срока",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="weight",
 *          description="Вес в кг",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="size",
 *          description="Размеры",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="offer",
 *          description="Специальные предложения",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="rating",
 *          description="Рейтинг",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="measure",
 *          description="Единица измерения",
 *          type="string"
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
class shop_product extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'shop_product';
    
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
        'user_company_id',
        'shop_category_id',
        'package',
        'shop_option',
        'text',
        'text_lang',
        'image',
        'shop_option_ids',
        'shop_brand_id',
        'related',
        'shelf_life',
        'shelf_life_unit',
        'weight',
        'size',
        'offer',
        'rating',
        'measure',
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
        'user_company_id' => 'integer',
        'shop_category_id' => 'integer',
        'package' => 'string',
        'shop_option' => 'string',
        'text' => 'string',
        'text_lang' => 'string',
        'image' => 'string',
        'shop_option_ids' => 'string',
        'shop_brand_id' => 'integer',
        'related' => 'string',
        'shelf_life' => 'integer',
        'shelf_life_unit' => 'string',
        'weight' => 'float',
        'size' => 'string',
        'offer' => 'string',
        'rating' => 'float',
        'measure' => 'string',
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
        'user_company_id' => 'nullable|integer',
        'shop_category_id' => 'nullable|integer',
        'package' => 'nullable|string|max:255',
        'shop_option' => 'nullable|string',
        'text' => 'nullable|string',
        'text_lang' => 'nullable|string',
        'image' => 'nullable|string',
        'shop_option_ids' => 'nullable|string',
        'shop_brand_id' => 'nullable|integer',
        'related' => 'nullable|string',
        'shelf_life' => 'nullable|integer',
        'shelf_life_unit' => 'nullable|string|max:255',
        'weight' => 'nullable|numeric',
        'size' => 'nullable|string',
        'offer' => 'nullable|string',
        'rating' => 'nullable|numeric',
        'measure' => 'nullable|string|max:255',
        'deleted_at' => 'nullable',
        'deleted_by' => 'nullable|integer',
        'deleted_text' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'modified_at' => 'nullable',
        'created_by' => 'nullable|integer',
        'modified_by' => 'nullable|integer'
    ];

    
}
