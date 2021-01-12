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
        $this->makeImageLinks(parent::toArray($request));
        return $this->makeImageLinks(parent::toArray($request));
    }

    public function makeImageLinks($req){
        $datas=$req['data'];
        for ($i=0; $i<count($datas)-1; $i++) {
            // dd($datas[$i]['image']);
            if(strlen($datas[$i]['image'])>4){                
                $datas[$i]['image']=parent::getImagePath('ShopBrand', $this->id, $datas[$i]['image'], true);
            }            
        }
        $req['data']=$datas;
        return $req;
    }
}
