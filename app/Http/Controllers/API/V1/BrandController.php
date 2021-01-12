<?php


namespace App\Http\Controllers\API\V1;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Brands;
use App\Http\Resources\BrandCollection;
use App\Http\Resources\BrandResource;
use Illuminate\Support\Facades\Auth;

class BrandController extends ApiController
{

    protected $rules = [
        'name' => 'required|string',
        'image' => 'nullable|string'
    ];

    protected $model, $resource, $resourceCollection;
    protected $file_path;
    public function __construct()
    {
        $this->model = new Brands;
        $this->resource = BrandResource::class;
        $this->resourceCollection = BrandCollection::class;
        $this->file_path=public_path('uploaz/ShopBrand/image/');
    }

    protected function params($request)
    {
        $rules = $this->getRules($request);
        $this->validate($request, $rules);
        // dd($request);
        // $images = explode(',' , $request['image']);
        // $request['image']=$this->getImagePath($images[0], $request['id']);
        // $user = Auth::guard('api')->user();
        $additional = [];
        // $additional['user_company_id'] = $user->business_id;
        // $additional['created_by'] = $user->id;
        return $request->all() + $additional;
    }

    protected function getRules($request)
    {
        if ($request->isMethod('patch')) {
            $this->rules = [
                'name' => 'string',
                'image' => 'nullable|string'
            ];
        }
        return $this->rules;
    }


    public function getImagePath($fileName, $id){
        return asset($this->file_path."/".$id."/" . $fileName);       
    }

    /**
     * Get the  image.
     *
     * @return string
     */
    // public function getImageUrlAttribute()
    // {
    //     if (!empty($this->image)) {
    //         //D:\Komputer\my_programs\openserver\OpenServer\domains\laravel-api-for-ecommerce\public\upload\uploaz\ShopBrand\image\1
    //         $image_url = asset('/upload/uploaz/' . config('constants.image_path.brand') . '/image/' . rawurlencode($this->image));
    //     } else {
    //         $image_url = asset('/img/default.png');
    //     }
    //     return $image_url;
    // }

    /**
    * Get the  image path.
    *
    * @return string
    */
    // public function getImagePathAttribute()
    // {
    //     if (!empty($this->image)) {
    //         $image_path = public_path('uploads') . '/' . config('constants.image_path.brand') . '/' . $this->image;
    //     } else {
    //         $image_path = null;
    //     }
    //     return $image_path;
    // }
}