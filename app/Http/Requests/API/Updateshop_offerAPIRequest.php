<?php

namespace App\Http\Requests\API;

use App\Models\shop_offer;
use InfyOm\Generator\Request\APIRequest;

class Updateshop_offerAPIRequest extends APIRequest
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
        $rules = shop_offer::$rules;
        
        return $rules;
    }
}
