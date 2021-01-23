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
});
Route::get('homeShopBanners', [App\Http\Controllers\API\V1\HomePageController::class, 'homeShopBanners']);
Route::get('homeShopCategories', [App\Http\Controllers\API\V1\HomePageController::class, 'homeShopCategories']);
Route::get('homeShopOffers', [App\Http\Controllers\API\V1\HomePageController::class, 'homeShopOffers']);
Route::get('getHomePage', [App\Http\Controllers\API\V1\HomePageController::class, 'getHomePage']);
Route::get('getProductPage', [App\Http\Controllers\API\V1\ProductPageController::class, 'getProductPage']);
Route::get('testHomePage', [App\Http\Controllers\API\V1\HomePageController::class, 'testHomePage']);

Route::get('searchPageWhile', [App\Http\Controllers\API\V1\SearchPageController::class, 'searchPageWhile']);
Route::get('searchPageBefore', [App\Http\Controllers\API\V1\SearchPageController::class, 'searchPageBefore']);
Route::get('searchPageAfter', [App\Http\Controllers\API\V1\SearchPageController::class, 'searchPageAfter']);

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