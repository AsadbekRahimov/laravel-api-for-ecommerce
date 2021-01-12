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
    public function __construct()
    {
        $this->model = new Brands;
        $this->resource = BrandResource::class;
        $this->resourceCollection = BrandCollection::class;
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
}