<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
    use SoftDeletes;
    public $table = 'shop_brand';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected $visible = ['id', 'name', 'image'];

    /**
     * Return list of brands for a business
     *
     * @param int $user_company_id
     *
     * @return array
     */
    public static function forDropdown($user_company_id)
    {
        $brands = Brands::where('user_company_id', $user_company_id)->pluck('name', 'id', 'image');
        return $brands;
    }
}
