<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;

class BrandCollection extends BaseCollection
{

    public function __construct($resource, $code = 200, $message = "Brand list")
    {
        parent::__construct($resource, $code, $message);
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->data = $this->collection;
        return parent::toArray($request);
    }
}
