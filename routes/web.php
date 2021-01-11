<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// Route::resource('users', 'UserController')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


Route::resource('shopBanners', App\Http\Controllers\shop_bannerController::class);

Route::resource('shopBrands', App\Http\Controllers\shop_brandController::class);

Route::resource('shopCatalogs', App\Http\Controllers\shop_catalogController::class);

Route::resource('shopCatalogWare', App\Http\Controllers\shop_catalog_wareController::class);

Route::resource('shopCategories', App\Http\Controllers\shop_categoryController::class);

Route::resource('shopChannels', App\Http\Controllers\shop_channelController::class);

Route::resource('shopCoupons', App\Http\Controllers\shop_couponController::class);

Route::resource('shopCouriers', App\Http\Controllers\shop_courierController::class);

Route::resource('shopDelays', App\Http\Controllers\shop_delayController::class);

Route::resource('shopDelayCauses', App\Http\Controllers\shop_delay_causeController::class);

Route::resource('shopDiscounts', App\Http\Controllers\shop_discountController::class);

Route::resource('shopElements', App\Http\Controllers\shop_elementController::class);

Route::resource('shopOffers', App\Http\Controllers\shop_offerController::class);

Route::resource('shopOptions', App\Http\Controllers\shop_optionController::class);

Route::resource('shopOptionBranches', App\Http\Controllers\shop_option_branchController::class);

Route::resource('shopOptionTypes', App\Http\Controllers\shop_option_typeController::class);

Route::resource('shopOrders', App\Http\Controllers\shop_orderController::class);

Route::resource('shopOrderItems', App\Http\Controllers\shop_order_itemController::class);

Route::resource('shopOverviews', App\Http\Controllers\shop_overviewController::class);

Route::resource('shopPackagings', App\Http\Controllers\shop_packagingController::class);

Route::resource('shopPayments', App\Http\Controllers\shop_paymentController::class);

Route::resource('shopProducts', App\Http\Controllers\shop_productController::class);

Route::resource('shopQuestions', App\Http\Controllers\shop_questionController::class);

Route::resource('shopRejectCauses', App\Http\Controllers\shop_reject_causeController::class);

Route::resource('shopReviews', App\Http\Controllers\shop_reviewController::class);

Route::resource('shopReviewOptions', App\Http\Controllers\shop_review_optionController::class);

Route::resource('shopShipments', App\Http\Controllers\shop_shipmentController::class);

Route::resource('treeShops', App\Http\Controllers\tree_shopController::class);