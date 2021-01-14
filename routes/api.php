<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/v1/login', [App\Http\Controllers\API\V1\Auth\LoginController::class, 'login']);

Route::middleware('auth.jwt')->group(function () {
    // Route::apiResource('brands','BrandController');
    // Route::get('products/search', 'ProductController@search');
    // Route::get('products/featured-products', 'ProductController@featuredProducts');
    // Route::apiResource('products', 'ProductController');
});
Route::apiResource('brands',App\Http\Controllers\API\V1\BrandController::class);
Route::get('homeShopBrands', [App\Http\Controllers\API\V1\HomePageController::class, 'homeShopBrands']);

// Route::resource('shopProducts', App\Http\Controllers\API\shop_productAPIController::class);
// Route::resource('shopBanners', App\Http\Controllers\API\shop_bannerAPIController::class);
// Route::resource('shopOrders', App\Http\Controllers\API\shop_bannerAPIController::class);


Route::resource('shopBanners', App\Http\Controllers\API\shop_bannerAPIController::class);

Route::resource('shopBrands', App\Http\Controllers\API\shop_brandAPIController::class);

Route::resource('shopCatalogs', App\Http\Controllers\API\shop_catalogAPIController::class);

Route::resource('shopCatalogWare', App\Http\Controllers\API\shop_catalog_wareAPIController::class);

Route::resource('shopCategories', App\Http\Controllers\API\shop_categoryAPIController::class);

Route::resource('shopChannels', App\Http\Controllers\API\shop_channelAPIController::class);

Route::resource('shopCoupons', App\Http\Controllers\API\shop_couponAPIController::class);

Route::resource('shopCouriers', App\Http\Controllers\API\shop_courierAPIController::class);

Route::resource('shopDelays', App\Http\Controllers\API\shop_delayAPIController::class);

Route::resource('shopDelayCauses', App\Http\Controllers\API\shop_delay_causeAPIController::class);

Route::resource('shopDiscounts', App\Http\Controllers\API\shop_discountAPIController::class);

Route::resource('shopElements', App\Http\Controllers\API\shop_elementAPIController::class);

Route::resource('shopOffers', App\Http\Controllers\API\shop_offerAPIController::class);

Route::resource('shopOptions', App\Http\Controllers\API\shop_optionAPIController::class);

Route::resource('shopOptionBranches', App\Http\Controllers\API\shop_option_branchAPIController::class);

Route::resource('shopOptionTypes', App\Http\Controllers\API\shop_option_typeAPIController::class);

Route::resource('shopOrders', App\Http\Controllers\API\shop_orderAPIController::class);

Route::resource('shopOrderItems', App\Http\Controllers\API\shop_order_itemAPIController::class);

Route::resource('shopOverviews', App\Http\Controllers\API\shop_overviewAPIController::class);

Route::resource('shopPackagings', App\Http\Controllers\API\shop_packagingAPIController::class);

Route::resource('shopPayments', App\Http\Controllers\API\shop_paymentAPIController::class);

Route::resource('shopProducts', App\Http\Controllers\API\shop_productAPIController::class);

Route::resource('shopQuestions', App\Http\Controllers\API\shop_questionAPIController::class);

Route::resource('shopRejectCauses', App\Http\Controllers\API\shop_reject_causeAPIController::class);

Route::resource('shopReviews', App\Http\Controllers\API\shop_reviewAPIController::class);

Route::resource('shopReviewOptions', App\Http\Controllers\API\shop_review_optionAPIController::class);

Route::resource('shopShipments', App\Http\Controllers\API\shop_shipmentAPIController::class);

Route::resource('treeShops', App\Http\Controllers\API\tree_shopAPIController::class);

// Route::resource('homePageAPIController', App\Http\Controllers\API\HomePageAPIController::class);

// Route::resource('shop_brands', App\Http\Controllers\API\shop_brandAPIController::class);

// Route::resource('shop_catalogs', App\Http\Controllers\API\shop_catalogAPIController::class);

// Route::resource('shop_catalog_ware', App\Http\Controllers\API\shop_catalog_wareAPIController::class);

// Route::resource('shop_categories', App\Http\Controllers\API\shop_categoryAPIController::class);

// Route::resource('shop_channels', App\Http\Controllers\API\shop_channelAPIController::class);

// Route::resource('shop_coupons', App\Http\Controllers\API\shop_couponAPIController::class);

// Route::resource('shop_couriers', App\Http\Controllers\API\shop_courierAPIController::class);

// Route::resource('shop_delays', App\Http\Controllers\API\shop_delayAPIController::class);

// Route::resource('shop_delay_causes', App\Http\Controllers\API\shop_delay_causeAPIController::class);

// Route::resource('shop_discounts', App\Http\Controllers\API\shop_discountAPIController::class);

// Route::resource('shop_elements', App\Http\Controllers\API\shop_elementAPIController::class);

// Route::resource('shop_offers', App\Http\Controllers\API\shop_offerAPIController::class);

// Route::resource('shop_options', App\Http\Controllers\API\shop_optionAPIController::class);

// Route::resource('shop_option_branches', App\Http\Controllers\API\shop_option_branchAPIController::class);

// Route::resource('shop_option_types', App\Http\Controllers\API\shop_option_typeAPIController::class);

// Route::resource('shop_orders', App\Http\Controllers\API\shop_orderAPIController::class);

// Route::resource('shop_order_items', App\Http\Controllers\API\shop_order_itemAPIController::class);

// Route::resource('shop_overviews', App\Http\Controllers\API\shop_overviewAPIController::class);

// Route::resource('shop_packagings', App\Http\Controllers\API\shop_packagingAPIController::class);

// Route::resource('shop_payments', App\Http\Controllers\API\shop_paymentAPIController::class);

// Route::resource('shop_products', App\Http\Controllers\API\shop_productAPIController::class);

// Route::resource('shop_questions', App\Http\Controllers\API\shop_questionAPIController::class);

// Route::resource('shop_reject_causes', App\Http\Controllers\API\shop_reject_causeAPIController::class);

// Route::resource('shop_reviews', App\Http\Controllers\API\shop_reviewAPIController::class);

// Route::resource('shop_review_options', App\Http\Controllers\API\shop_review_optionAPIController::class);

// Route::resource('shop_shipments', App\Http\Controllers\API\shop_shipmentAPIController::class);

// Route::resource('tree_shops', App\Http\Controllers\API\tree_shopAPIController::class);