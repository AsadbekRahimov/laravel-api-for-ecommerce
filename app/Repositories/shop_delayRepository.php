<?php

namespace App\Repositories;

use App\Models\shop_delay;
use App\Repositories\BaseRepository;

/**
 * Class shop_delayRepository
 * @package App\Repositories
 * @version January 11, 2021, 9:18 am UTC
*/

class shop_delayRepository extends BaseRepository
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
        'date',
        'comment',
        'date_delay',
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
        return shop_delay::class;
    }
}
