<?php

namespace App\Http\Requests\API;

use App\Models\shop_delay_cause;
use InfyOm\Generator\Request\APIRequest;

class Createshop_delay_causeAPIRequest extends APIRequest
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
        return shop_delay_cause::$rules;
    }
}
