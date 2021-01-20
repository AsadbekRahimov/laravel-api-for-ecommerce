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
    //     $categoryComponent = new CategoryComponent();
    //     public $type;
    // public $id;
    // public $name;
    // /**
    //  * @var CategoryItem[] $categories
    //  */
    // public $categories;
        // $category_types['categoryOne'][]=DB::table('shop_category')->select('shop_category_id', 'name','image','link')->where('type', '<>', '')->get();
        $homePage->categories_component[$category_types[0]]=DB::table('shop_category')
            ->select('shop_category_id','id','name','image')->whereNotNull('shop_category_id')->inRandomOrder()->get();//->groupBy('shop_category_id');
        // dd( $categoryOne);
        $homePage->categories_component[$category_types[1]]=DB::table('shop_category')
            ->select('id','name','image')->where('shop_category_id', '=', null)->inRandomOrder()->get()->chunk(6);

        //     ->groupBy('shop_category_id')->map(function ($group) use($banner_types){     
        //         return $group->map(function ($value) use ($banner_types) {                                
        //             if (in_array($value->type, $banner_types)) {
        //                 $bannerItem = new BannerItem();
        //                 if($value->image){
        //                     $value->image=$this->getImagePath('ShopBanner', $value->id, $value->image);
        //                 }
        //                 $bannerItem->id=$value->id;
        //                 $bannerItem->image=$value->image;
        //                 $bannerItem->link=$value->link;
        //                 return $bannerItem;
        //             }                                                        
        //     });
        // });


        
        return $this->sendResponse($homePage, 'Home Page retrieved successfully');
    }
    public function testHomePage(){

        $homePage = new HomePage();
        /**
         * Products
         */
        // $products_types=array('productSectionOne'=>6, 'productSectionTwo'=>8);
        // $products_db=DB::table('shop_element as element')
        //     ->join('shop_product as product', 'shop_element.id','shop_offer.shop_catalog_id')->get();
        // foreach($products_types as $type=>$count)
        // {

        // }
        $productItem_1 = new ProductItem();
        $productItem_1->id="id";
        $productItem_1->name="name";
        $productItem_1->amount="amount";
        $productItem_1->status="status";
        $productItem_1->rating="rating";
        $productItem_1->reviewCount="reviewCount";
        $productItem_1->exist="exist";
        $productItem_1->currency="currency";
        $productItem_1->currencyType="currencyType";
        $productItem_1->cart_amount="cart_amount";
        $productItem_1->barcode="barcode";
        $productItem_1->measure="measure";
        $productItem_1->measureStep="measureStep";
        $productItem_1->discount="discount";

        // $productComponent_1 = new ProductComponent();


        /**
         * Banners
         */
        $bannerItem_1 = new BannerItem();
        $bannerItem_1->image="image link here 1";
        $bannerItem_1->link="web link 1";

        // $bannerItem_2 = new BannerItem();
        // $bannerItem_2->image="image link here 2";
        // $bannerItem_2->link="web link 2";

        // $bannerItem_3 = new BannerItem();
        // $bannerItem_3->image="image link here 3";
        // $bannerItem_3->link="web link 3";

        $bannerComponent_1= new BannerComponent();
        $bannerComponent_1->type="carouselBanner";
        $bannerComponent_1->banners[]=$bannerItem_1;      
        // $bannerComponent_1->banners[]=$bannerItem_2;
        // $bannerComponent_1->banners[]=$bannerItem_3;
        $bannerComponent_1->products[]="products";

        $homePage->banners_component[] = $bannerComponent_1;

        
        /**
         * Catalogs
         */
        $catalogItem_1 = new CatalogItem();
        $catalogItem_1->type="type";
        $catalogItem_1->id="id";
        $catalogItem_1->name="name";
        $catalogItem_1->banners[]="banners";
        $catalogItem_1->products[]="products";

        $catalogItem_2 = new CatalogItem();
        $catalogItem_2->type="type";
        $catalogItem_2->id="id";
        $catalogItem_2->name="name";
        $catalogItem_2->banners[]=$bannerItem_1;
        // $catalogItem_2->banners[]=$bannerItem_2;
        $catalogItem_2->products[]="products";

        $catalogComponent_1 = new CatalogComponent();
        $catalogComponent_1->type="catalogOne";
        
        $catalogComponent_1->catalogs[]=$catalogItem_1;
        $catalogComponent_1->catalogs[]=$catalogItem_2;


        $catalogItem_3 = new CatalogItem();
        $catalogItem_3->type="type";
        $catalogItem_3->id="id";
        $catalogItem_3->name="name";
        $catalogItem_3->banners[]="banners";
        $catalogItem_3->products[]="products";

        $catalogComponent_2 = new CatalogComponent();
        $catalogComponent_2->type="catalogTwo";
        
        $catalogComponent_2->catalogs[]=$catalogItem_2;
        $catalogComponent_2->catalogs[]=$catalogItem_3;

        $homePage->catalogs_component[] = $catalogComponent_1;
        $homePage->catalogs_component[] = $catalogComponent_2;


        
        // $homePage='';
        
        // $homePage=DB::table('shop_banner')->select('type','image','link')->get()
        //     ->groupBy('type')->map(function ($group) use($homePage) {
        //         /**
        //          * Banners
        //          */
        //         $banner_components=array('carouselBanner', 'bannerOne', 'bannerTwo', 'bannerSectionOne', 'bannerSectionFour', 'bannerSectionFive', 'bannerDivider');
        //         $bannerComponent= new BannerComponent();
        //         // $bannerComponent_1->type=$value->type;
        //         return $group->map(function ($value) use ($bannerComponent, $banner_components) {                                
        //                 if (in_array($value->type, $banner_components)) {
        //                     $bannerItem = new BannerItem();
        //                     $bannerItem->image=$value->image;
        //                     $bannerItem->link=$value->link;
        //                     // $bannerComponent->banners[]=$bannerItem;
        //                     // $bannerComponent->type=$value->type;
        //                     // $homePage->banners_component[] = $bannerComponent_1;
        //                     return $bannerItem;
        //                 }
                                                        
        //         });


        // });
        // foreach($banner_components as $banner_component){
            // $banner_item=DB::table('shop_banner')->selectRaw("shares.id AS share_id, users.id AS user_id , 
            // (CASE WHEN users.id = {$banner_component} THEN 1 ELSE 0 END) AS is_user)");

        // }
        // $banner_component='carouselBanner';
        // $banners=DB::table('shop_banner')->select(['image', 'link'])
        // ->where('type', '=', $banner_component)->get();
        // foreach($banners as $banner){
        //     $bannerItem = new BannerItem();
        //     dd($banner);
        //     // $bannerItem->image=$banner->image;
        //     // $bannerItem->link=$banner->link;
        //     $homePage[]=$bannerItem;
        // }
        
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
