<?php

namespace App\Http\Requests\API;

use App\Models\shop_brand;
use InfyOm\Generator\Request\APIRequest;

class Createshop_brandAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return shop_brand::$rules;
    }
}
