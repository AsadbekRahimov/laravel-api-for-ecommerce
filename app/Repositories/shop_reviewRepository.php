<?php

namespace App\Repositories;

use App\Models\shop_review;
use App\Repositories\BaseRepository;

/**
 * Class shop_reviewRepository
 * @package App\Repositories
 * @version January 11, 2021, 9:20 am UTC
*/

class shop_reviewRepository extends BaseRepository
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
        'type',
        'shop_brand_id',
        'shop_product_id',
        'user_company_id',
        'rating',
        'parent_id',
        'rating_option',
        'text',
        'virtues',
        'drawbacks',
        'experience',
        'recommend',
        'anonymous',
        'like',
        'dislike',
        'photo',
        'user_id',
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
        return shop_review::class;
    }
}
