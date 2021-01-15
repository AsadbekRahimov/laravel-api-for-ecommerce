<?php

namespace App\Http\Controllers\API\V1;

use App\Models\shop_brand;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\shop_banner;
use App\Models\shop_category;
use Response;
use Illuminate\Support\Facades\DB;

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
        $items= DB::table('shop_banner')->select(['id', 'image']);
        $items=$this->filter_items($request, $items); 
        
        foreach($items as $item){
            if($item['image']){
                $item['image']=$this->getImagePath('ShopBanner', $item['id'], $item['image']);
            }
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
        $items= DB::table('shop_category')->select(['id', 'icon', 'name']);
        if($request->has('search')){
            $items=$items->where('name', 'like', '%'.$request['search'].'%');
        }     
        $items=$this->filter_items($request, $items);
        
        return $this->sendResponse($items->toArray(), 'Shop Categories retrieved successfully');
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
    public function homeShopOffers(Request $request)
    {
        $items= DB::table('shop_offer')->select(['id', 'name', 'shop_catalog_id']);
        if($request->has('search')){
            $items=$items->where('name', 'like', '%'.$request['search'].'%');
        }     
        $items=$this->filter_items($request, $items);
        
        return $this->sendResponse($items->toArray(), 'Shop Categories retrieved successfully');
    }




    
    
}
