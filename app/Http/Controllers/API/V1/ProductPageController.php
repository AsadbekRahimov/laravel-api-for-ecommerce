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
    public function getProductPage(Request $request, $element_id){
        try {
            $items= DB::table('shop_product')
            ->leftJoin('shop_category', 'shop_product.shop_category_id', '=', 'shop_category.id')
            ->leftJoin('user_company', 'shop_product.user_company_id', '=', 'user_company.id')
            ->leftJoin('shop_brand', 'shop_product.shop_brand_id', '=', 'shop_brand.id')
            ->leftJoin('shop_element', 'shop_product.id', '=', 'shop_element.shop_product_id')
            ->select( 
                'shop_product.name as product_name', 
                'shop_product.title as product_title', 
                'shop_product.package as product_package', 
                'shop_product.shop_option as product_options', 
                'shop_product.text as product_text', 
                'shop_product.image as product_image', 
                'shop_product.offer as product_offers',
                'shop_product.rating as product_rating', 
                'shop_category.name as product_category', 
                'user_company.name as product_company',
                'shop_brand.name as product_brand',  
            )->where('shop_element.shop_product_id', '=', $element_id)->get();
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
            return $this->sendResponse($items->toArray(), 'Product retrieved successfully');
        } catch (Exception $e) {
            return $this->sendError('System error: '.$e->getMessage());            
        }
    } 
    
}
