<?php

namespace App\Repositories;

use App\Models\shop_reject_cause;
use App\Repositories\BaseRepository;

/**
 * Class shop_reject_causeRepository
 * @package App\Repositories
 * @version January 11, 2021, 9:20 am UTC
*/

class shop_reject_causeRepository extends BaseRepository
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
        return shop_reject_cause::class;
    }
}
