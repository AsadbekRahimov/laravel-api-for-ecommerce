<?php

namespace App\Repositories;

use App\Models\shop_packaging;
use App\Repositories\BaseRepository;

/**
 * Class shop_packagingRepository
 * @package App\Repositories
 * @version January 10, 2021, 6:10 am UTC
*/

class shop_packagingRepository extends BaseRepository
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
        return shop_packaging::class;
    }
}
