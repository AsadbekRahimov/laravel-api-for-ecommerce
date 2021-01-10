<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="tree_shop",
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
class tree_shop extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tree_shop';
    
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
        'root',
        'lft',
        'rgt',
        'lvl',
        'icon',
        'icon_type',
        'activeOrig',
        'selected',
        'disabled',
        'readonly',
        'visible',
        'collapsed',
        'movable_u',
        'movable_d',
        'movable_l',
        'movable_r',
        'removable',
        'removable_all',
        'child_allowed',
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
        'root' => 'integer',
        'lft' => 'integer',
        'rgt' => 'integer',
        'lvl' => 'integer',
        'icon' => 'string',
        'icon_type' => 'boolean',
        'activeOrig' => 'boolean',
        'selected' => 'boolean',
        'disabled' => 'boolean',
        'readonly' => 'boolean',
        'visible' => 'boolean',
        'collapsed' => 'boolean',
        'movable_u' => 'boolean',
        'movable_d' => 'boolean',
        'movable_l' => 'boolean',
        'movable_r' => 'boolean',
        'removable' => 'boolean',
        'removable_all' => 'boolean',
        'child_allowed' => 'boolean',
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
        'root' => 'nullable|integer',
        'lft' => 'nullable|integer',
        'rgt' => 'nullable|integer',
        'lvl' => 'nullable|integer',
        'icon' => 'nullable|string|max:255',
        'icon_type' => 'nullable|boolean',
        'activeOrig' => 'nullable|boolean',
        'selected' => 'nullable|boolean',
        'disabled' => 'nullable|boolean',
        'readonly' => 'nullable|boolean',
        'visible' => 'nullable|boolean',
        'collapsed' => 'nullable|boolean',
        'movable_u' => 'nullable|boolean',
        'movable_d' => 'nullable|boolean',
        'movable_l' => 'nullable|boolean',
        'movable_r' => 'nullable|boolean',
        'removable' => 'nullable|boolean',
        'removable_all' => 'nullable|boolean',
        'child_allowed' => 'nullable|boolean',
        'deleted_at' => 'nullable',
        'deleted_by' => 'nullable|integer',
        'deleted_text' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'modified_at' => 'nullable',
        'created_by' => 'nullable|integer',
        'modified_by' => 'nullable|integer'
    ];

    
}
