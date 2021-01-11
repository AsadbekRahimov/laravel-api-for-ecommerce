<?php

namespace App\Repositories;

use App\Models\shop_category;
use App\Repositories\BaseRepository;

/**
 * Class shop_categoryRepository
 * @package App\Repositories
 * @version January 11, 2021, 9:18 am UTC
*/

class shop_categoryRepository extends BaseRepository
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
        return shop_category::class;
    }
}
