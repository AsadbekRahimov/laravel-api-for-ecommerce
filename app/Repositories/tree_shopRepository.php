<?php

namespace App\Repositories;

use App\Models\tree_shop;
use App\Repositories\BaseRepository;

/**
 * Class tree_shopRepository
 * @package App\Repositories
 * @version January 10, 2021, 6:11 am UTC
*/

class tree_shopRepository extends BaseRepository
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
        return tree_shop::class;
    }
}
