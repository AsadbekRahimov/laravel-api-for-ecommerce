<?php

namespace App\Http\Requests\API;

use App\Models\shop_reject_cause;
use InfyOm\Generator\Request\APIRequest;

class Updateshop_reject_causeAPIRequest extends APIRequest
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
        $rules = shop_reject_cause::$rules;
        
        return $rules;
    }
}
