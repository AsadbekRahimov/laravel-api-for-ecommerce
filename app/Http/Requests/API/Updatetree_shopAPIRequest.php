<?php

namespace App\Http\Requests\API;

use App\Models\tree_shop;
use InfyOm\Generator\Request\APIRequest;

class Updatetree_shopAPIRequest extends APIRequest
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
        $rules = tree_shop::$rules;
        
        return $rules;
    }
}
