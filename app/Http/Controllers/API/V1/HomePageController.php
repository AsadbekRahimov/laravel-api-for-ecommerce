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
use App\Http\Classes\CatalogItem;
use App\Http\Classes\BannerItem;
use App\Http\Classes\MarketItem;
use App\Http\Classes\CategoryItem;
use App\Http\Classes\ProductItem;
use App\Http\Classes\CatalogComponent;
use App\Http\Classes\BannerComponent;
use App\Http\Classes\MarketComponent;
use App\Http\Classes\CategoryComponent;
use App\Http\Classes\ProductComponent;

class HomePageController extends AppBaseController
{

    public function getHomePage(){

        /**
         * Banners
         */
        $homePage = new HomePage();

        $banner_types=array('carouselBanner', 'bannerOne', 'bannerTwo', 'bannerSectionOne', 'bannerSectionFour', 'bannerSectionFive', 'bannerDivider');
        $homePage->banners_component=DB::table('shop_banner')->select('id','type','image','link')->where('type', '<>', '')->get()
            ->groupBy('type')->map(function ($group) use($banner_types){     
                return $group->map(function ($value) use ($banner_types) {                                
                    if (in_array($value->type, $banner_types)) {
                        $bannerItem = new BannerItem();
                        if($value->image){
                            $value->image=$this->getImagePath('ShopBanner', $value->id, $value->image);
                        }
                        $bannerItem->id=$value->id;
                        $bannerItem->image=$value->image;
                        $bannerItem->link=$value->link;
                        return $bannerItem;
                    }                                                        
            });
        });

        $category_types=array('categoryOne', 'categoryTwo');
        $homePage->categories_component[$category_types[0]]=DB::table('shop_category')
            ->select('shop_category_id','id','name')->whereNull('shop_category_id')->get()//->groupBy('shop_category_id');
            ->map(function ($value) {
                $children=DB::table('shop_category')->select('id','name','image')->where('shop_category_id', '=', $value->id)->limit(4)->get()
                ->map(function ($value) {
                    $categoryItem= new CategoryItem();
                    $categoryItem->id=$value->id;
                    $categoryItem->name=$value->name;
                    $categoryItem->image=$this->getImagePath('ShopCategory', $value->id, $value->image);
                    return $categoryItem;
                });
                $categoryComponent= new CategoryComponent();
                $categoryComponent->id=$value->id;
                $categoryComponent->name=$value->name;
                $categoryComponent->categories=$children;
                return $categoryComponent;                                             
        });
        $homePage->categories_component[$category_types[1]]=DB::table('shop_category')
            ->select('id','name','image')->whereNull('shop_category_id')->inRandomOrder()->get()->chunk(6);
        
            
        

        
        return $this->sendResponse($homePage, 'Home Page retrieved successfully');
    }
    public function testHomePage(){

        $homePage = new HomePage();
        $product_types=array("bestSeller", "premium", "hotSelling");
        $homePage->catalogs_component[] = DB::table('shop_element')->select('id','name')->get()->groupBy('tags')->map(function ($group) use($product_types){
            
        });
        return $this->sendResponse($homePage, 'Home Page retrieved successfully');

    }
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
            $items= DB::table('shop_offer')
                // ->join('shop_catalog', 'shop_catalog.id','shop_offer.shop_catalog_id')
                ->select(['id','shop_catalog_id',  'name']);
                
                
                // ->whereHas("shop_catalog", function($query) use($shop_catalog_id) {
                //         $query->where("shop_catalog_id", "=", $shop_catalog_id);
                // });
            if($request->has('search')){
                $items=$items->where('name', 'like', '%'.$request['search'].'%');
            } 
            $items=$this->filter_items($request, $items); 
            
            if ($items->isEmpty()) {
                return $this->sendError('Shop Offers not found');
            }

            foreach($items as $item){
                $catalogs=DB::table('shop_catalog')->where('id', '=', $item->shop_catalog_id)->select(['id','shop_element_id', 'user_company_id', 'name'])->get();
                foreach($catalogs as $catalog){
                    $elements=DB::table('shop_element')->where('id', '=', $catalog->shop_element_id)->select(['id','shop_product_id'])->get();
                    foreach($elements as $element){
                        $products=DB::table('shop_product')->where('id', '=', $element->shop_product_id)->select(['id','image'])->get();
                        foreach($products as $product){
                            $product->image=$this->getImagePath('ShopBanner', $product->id, $product->image);
                        }                        
                        $element->shop_product_id=$products;
                    }
                    $user_companies=DB::table('user_company')->where('id', '=', $catalog->user_company_id)->select(['id','name'])->get();
                    $catalog->shop_element_id=$elements;
                    $catalog->user_company_id=$user_companies;
                }
                $item->shop_catalog_id=$catalogs;
            }

            return $this->sendResponse($items->toArray(), 'Shop Offers retrieved successfully');
        } catch (Exception $e) {
            return $this->sendError('System error: '.$e->getMessage());            
        } 
    }
    // $items={
    //     'name'=>'Hello',
    //     'product_id'
    // }
    // $foreign_key='product_id'
    // $elements={'name','image'}
    public function nestForeignKeys($items, $foreign_key, $elements){
        foreach(array_keys((array)$items) as $key){
            if(endsWith( $key, $foreign_key)){
                foreach($elements as $element){
                    $products=DB::table('shop_product')->where('id', '=', $element->shop_product_id)->select(['id','image'])->get();
                    foreach($products as $product){
                        $product->image=$this->getImagePath('ShopBanner', $product->id, $product->image);
                    }                        
                    $element->shop_product_id=$products;
                }
            }   
        }
        return true;
    }

    /**
     * cards [
     * {
     *  altType: 1,
     *  altText: "Часто покупаете?",
     *  sale:22,
     *  hasDelivery: false,
     *  inPremium:0,
     *  rdb: 1,
     *  unit:'UZS',
     *  oldPrice: 13990,
     *  newPrice: 17990,
     *  text: "Samsunng S6",
     *   
     * },
     * {...},
     * ...
     * ]
    */
    



    

    
    
}
