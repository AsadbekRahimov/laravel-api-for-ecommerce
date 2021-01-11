<?php

namespace App\Repositories;

use App\Models\shop_offer;
use App\Repositories\BaseRepository;

/**
 * Class shop_offerRepository
 * @package App\Repositories
 * @version January 11, 2021, 9:19 am UTC
*/

class shop_offerRepository extends BaseRepository
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
        'shop_catalog_id',
        'type',
        'start',
        'end',
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
        return shop_offer::class;
    }
}
