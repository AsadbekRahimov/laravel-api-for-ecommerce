<?php

namespace App\Repositories;

use App\Models\shop_question;
use App\Repositories\BaseRepository;

/**
 * Class shop_questionRepository
 * @package App\Repositories
 * @version January 10, 2021, 6:10 am UTC
*/

class shop_questionRepository extends BaseRepository
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
        'target',
        'shop_brand_id',
        'shop_product_id',
        'user_company_id',
        'text',
        'parent_id',
        'votes',
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
        return shop_question::class;
    }
}
