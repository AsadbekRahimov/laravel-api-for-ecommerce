<?php

namespace App\Http\Controllers\API\V1;

use App\Models\shop_brand;
use App\Repositories\shop_brandRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
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
