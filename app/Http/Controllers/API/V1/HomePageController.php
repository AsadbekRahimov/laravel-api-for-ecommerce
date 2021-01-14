<?php

namespace App\Http\Controllers\API\V1;

use App\Models\shop_brand;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\shop_banner;
use App\Models\shop_category;
use Response;

/**
 * Class shop_brandController
 * @package App\Http\Controllers\API
 */

class HomePageController extends AppBaseController
{
    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/homeShopBanners",
     *      summary="Get a listing of the shop_banner.",
     *      tags={"HomePage"},
     *      description="Get shop_banner",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/shop_banner")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function homeShopBanners(Request $request)
    {
        $items = shop_banner::all('id', 'image');
        // if($request->has('search')){
        //     $items=$items->where('name', '=',$request->search);
        // }
        
        foreach($items as $item){
            if($item['image']){
                $item['image']=$this->getImagePath('ShopBanner', $item['id'], $item['image']);
            }
        }
        if($request->has('per_page')){
            $per_page = $request->get('per_page', 20);
            $items = $items->paginate($per_page);
        }
        
        return $this->sendResponse($items->toArray(), 'Shop Banners retrieved successfully');
    }

     /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/homeShopCategory",
     *      summary="Get a listing of the shop_category.",
     *      tags={"HomePage"},
     *      description="Get shop_category",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/shop_category")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function homeShopCategory(Request $request)
    {
        $items = shop_category::get(['id', 'icon', 'name']);
        // if($request->has('search')){
        //     $items=$items->where('name', '=',$request->search);
        // }
        
        // foreach($items as $item){
        //     if($item['image']){
        //         $item['image']=$this->getImagePath('ShopCategory', $item['id'], $item['image']);
        //     }
        // }
        // if($request->has('per_page')){
        //     $per_page = $request->get('per_page', 20);
        //     $items = $items->paginate($per_page);
        // }
        
        return $this->sendResponse($items->toArray(), 'Shop Categories retrieved successfully');
    }




    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/homeShopBrands",
     *      summary="Get a listing of the shop_brands.",
     *      tags={"HomePage"},
     *      description="Get shop_brands",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/shop_brand")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function homeShopBrands()
    {
        $items = shop_brand::all('id', 'name', 'image');
        // if($request->has('search')){
        //     $items=$items->where('name', '=',$request->search);
        // }
        
        foreach($items as $item){
            if($item['image']){
                $item['image']=$this->getImagePath('ShopBrand', $item['id'], $item['image']);
            }
        }
        
        return $this->sendResponse($items->toArray(), 'Shop Brands retrieved successfully');
    }

    
}
