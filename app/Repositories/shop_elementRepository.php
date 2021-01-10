<?php

namespace App\Repositories;

use App\Models\shop_element;
use App\Repositories\BaseRepository;

/**
 * Class shop_elementRepository
 * @package App\Repositories
 * @version January 10, 2021, 6:09 am UTC
*/

class shop_elementRepository extends BaseRepository
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
        'shop_product_id',
        'barcode',
        'barcode_type',
        'option_combine',
        'option_simple',
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
        return shop_element::class;
    }
}
