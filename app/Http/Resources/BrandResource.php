<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class BrandResource extends BaseResource
{

    public function __construct($resource, $code = 200, $message = 'Brand')
    {
        parent::__construct($resource, $code, $message);
    }
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        $this->data = [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image
        ];
        
        $this->data['image']=parent::getImagePath('ShopBrand', $this->id, $this->data['image'], true);
        // dd($this->data['image']);
        return parent::toArray($request);
    }

    
}
