<?php

namespace App\Repositories;

use App\Models\shop_product;
use App\Repositories\BaseRepository;

/**
 * Class shop_productRepository
 * @package App\Repositories
 * @version January 9, 2021, 1:07 pm UTC
*/

class shop_productRepository extends BaseRepository
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
        return shop_product::class;
    }
}
