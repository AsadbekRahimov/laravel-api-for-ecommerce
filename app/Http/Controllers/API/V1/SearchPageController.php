<?php

namespace App\Http\Controllers\API\V1;

use App\Models\shop_brand;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_brandController
 * @package App\Http\Controllers\API
 */

class SearchPageController extends AppBaseController
{
    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/searchPageWhile",
     *      summary="Get a listing of the shop_brands.",
     *      tags={"SearchPage"},
     *      description="Get shop_brands",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="search",
     *          description="search field of shop_banner",
     *          type="string",
     *          required=false,
     *          in="path"
     *      ),
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
    public function searchPageWhile(Request $request)
    {
        $items = shop_brand::all('id', 'name', 'image');
        if($request->has('search')){
            $items=$items->where('name', '=',$request->search);
        }
        
        foreach($items as $item){
            if($item['image']){
                $item['image']=$this->getImagePath('ShopBrand', $item['id'], $item['image']);
            }
        }
        
        return $this->sendResponse($items->toArray(), 'Shop Brands retrieved successfully');
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/searchPageBefore",
     *      summary="Get a listing of the shop_elements.",
     *      tags={"SearchPage"},
     *      description="Get shop_elements",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="search",
     *          description="search field of shop_element",
     *          type="string",
     *          required=false,
     *          in="path"
     *      ),
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
     *                  @SWG\Items(ref="#/definitions/shop_element")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function searchPageBefore(Request $request)
    {
        $items = shop_brand::all('id', 'name', 'image');
        if($request->has('search')){
            $items=$items->where('name', '=',$request->search);
        }
        
        foreach($items as $item){
            if($item['image']){
                $item['image']=$this->getImagePath('ShopBrand', $item['id'], $item['image']);
            }
        }
        
        return $this->sendResponse($items->toArray(), 'Shop Brands retrieved successfully');
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/searchPageAfter",
     *      summary="Get a listing of the shop_brands.",
     *      tags={"SearchPage"},
     *      description="Get shop_brands",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="search",
     *          description="search field of shop_banner",
     *          type="string",
     *          required=false,
     *          in="path"
     *      ),
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
    public function searchPageAfter(Request $request)
    {
        $items = shop_brand::all('id', 'name', 'image');
        if($request->has('search')){
            $items=$items->where('name', '=',$request->search);
        }
        
        foreach($items as $item){
            if($item['image']){
                $item['image']=$this->getImagePath('ShopBrand', $item['id'], $item['image']);
            }
        }
        
        return $this->sendResponse($items->toArray(), 'Shop Brands retrieved successfully');
    }

    
}
