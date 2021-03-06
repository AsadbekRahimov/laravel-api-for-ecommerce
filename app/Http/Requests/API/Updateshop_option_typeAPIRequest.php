<?php

namespace App\Http\Requests\API;

use App\Models\shop_option_type;
use InfyOm\Generator\Request\APIRequest;

class Updateshop_option_typeAPIRequest extends APIRequest
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
        $rules = shop_option_type::$rules;
        
        return $rules;
    }
}
