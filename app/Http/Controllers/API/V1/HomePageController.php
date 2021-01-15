<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\DB;
use Exception;
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
        try {
            $items= DB::table('shop_banner')->select(['id', 'image']);
            $items=$this->filter_items($request, $items); 
            
            foreach($items as $item){
                // $item=(array)($item);
                if($item->image){
                    $item->image=$this->getImagePath('ShopBanner', $item->id, $item->image);
                }
            }
            if ($items->isEmpty()) {
                return $this->sendError('Shop Banner not found');
            }
            return $this->sendResponse($items->toArray(), 'Shop Banners retrieved successfully');
        } catch (Exception $e) {
            return $this->sendError('System error: '.$e->getMessage());            
        }        
    }

     /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/homeShopCategories",
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
    public function homeShopCategories(Request $request)
    {
        try {
            $items= DB::table('shop_category')->select(['id', 'icon', 'name']);
            // if($request->has('search')){
            //     $items=$items->where('name', 'like', '%'.$request['search'].'%');
            // } 
            $items=$this->filter_items($request, $items); 
            
            if ($items->isEmpty()) {
                return $this->sendError('Shop Categories not found');
            }
            return $this->sendResponse($items->toArray(), 'Shop Categories retrieved successfully');
        } catch (Exception $e) {
            return $this->sendError('System error: '.$e->getMessage());            
        } 
    }


    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/homeShopOffers",
     *      summary="Get a listing of the shop_offer.",
     *      tags={"HomePage"},
     *      description="Get shop_offer",
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
     *                  @SWG\Items(ref="#/definitions/shop_offer")
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
        try {
            $items= DB::table('shop_offer')->select(['id', 'shop_catalog_id', 'name']);//->join('shop_catalog', 'shop_offer.shop_catalog_id','=', 'shop_catalog.id');
            if($request->has('search')){
                $items=$items->where('name', 'like', '%'.$request['search'].'%');
            } 
            $items=$this->filter_items($request, $items); 
            
            // foreach($items as $item){
            //     $item=(array)($item);
            //     if($item['image']){
            //         $item['image']=$this->getImagePath('ShopCategory', $item['id'], $item['image']);
            //     }
            // }
            if ($items->isEmpty()) {
                return $this->sendError('Shop Offers not found');
            }
            return $this->sendResponse($items->toArray(), 'Shop Offers retrieved successfully');
        } catch (Exception $e) {
            return $this->sendError('System error: '.$e->getMessage());            
        } 
    }




    
    
}
