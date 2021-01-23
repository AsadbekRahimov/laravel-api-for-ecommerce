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

use App\Http\Classes\HomePage;
use App\Http\Classes\BannerItem;
use App\Http\Classes\MarketItem;
use App\Http\Classes\CategoryItem;
use App\Http\Classes\ProductItem;
use App\Http\Classes\CatalogComponent;
use App\Http\Classes\BannerComponent;
use App\Http\Classes\MarketComponent;
use App\Http\Classes\CategoryComponent;
use App\Http\Classes\ProductComponent;
use App\Http\Classes\ProductPage;

class ProductPageController extends AppBaseController
{
    public function getProductPage( $request){
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
    
}
