<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('autos', App\Http\Controllers\autoController::class);

Route::resource('autoModels', App\Http\Controllers\auto_modelController::class);

Route::resource('autoMotors', App\Http\Controllers\auto_motorController::class);

Route::resource('autoTypes', App\Http\Controllers\auto_typeController::class);

Route::resource('callsAdmins', App\Http\Controllers\calls_adminController::class);

Route::resource('callsCdrs', App\Http\Controllers\calls_cdrController::class);

Route::resource('callsCels', App\Http\Controllers\calls_celController::class);

Route::resource('callsExtens', App\Http\Controllers\calls_extensController::class);

Route::resource('callsIvrs', App\Http\Controllers\calls_ivrController::class);

Route::resource('callsOrders', App\Http\Controllers\calls_orderController::class);

Route::resource('callsQueues', App\Http\Controllers\calls_queueController::class);

Route::resource('callsRecords', App\Http\Controllers\calls_recordController::class);

Route::resource('callsStatuses', App\Http\Controllers\calls_statusController::class);

Route::resource('callsStatusTimes', App\Http\Controllers\calls_status_timeController::class);

Route::resource('callsUsermen', App\Http\Controllers\calls_usermanController::class);

Route::resource('chatGroups', App\Http\Controllers\chat_groupController::class);

Route::resource('chatMails', App\Http\Controllers\chat_mailController::class);

Route::resource('chatMessages', App\Http\Controllers\chat_messageController::class);

Route::resource('chatMessagePublics', App\Http\Controllers\chat_message_publicController::class);

Route::resource('chatNotifies', App\Http\Controllers\chat_notifyController::class);

Route::resource('chatNotifyRoles', App\Http\Controllers\chat_notify_roleController::class);

Route::resource('chatPrivates', App\Http\Controllers\chat_privateController::class);

Route::resource('chatSubscribes', App\Http\Controllers\chat_subscribeController::class);

Route::resource('coreAnalytics', App\Http\Controllers\core_analyticsController::class);

Route::resource('coreHistories', App\Http\Controllers\core_historyController::class);

Route::resource('coreInputs', App\Http\Controllers\core_inputController::class);

Route::resource('coreMains', App\Http\Controllers\core_mainController::class);

Route::resource('coreMigras', App\Http\Controllers\core_migraController::class);

Route::resource('coreQueues', App\Http\Controllers\core_queueController::class);

Route::resource('coreSessions', App\Http\Controllers\core_sessionController::class);

Route::resource('coreSettings', App\Http\Controllers\core_settingController::class);

Route::resource('coreTransacts', App\Http\Controllers\core_transactController::class);

Route::resource('cpasCompanies', App\Http\Controllers\cpas_companyController::class);

Route::resource('cpasLands', App\Http\Controllers\cpas_landController::class);

Route::resource('cpasOffers', App\Http\Controllers\cpas_offerController::class);

Route::resource('cpasOfferItems', App\Http\Controllers\cpas_offer_itemController::class);

Route::resource('cpasPaysHistories', App\Http\Controllers\cpas_pays_historyController::class);

Route::resource('cpasSources', App\Http\Controllers\cpas_sourceController::class);

Route::resource('cpasStreams', App\Http\Controllers\cpas_streamController::class);

Route::resource('cpasStreamItems', App\Http\Controllers\cpas_stream_itemController::class);

Route::resource('cpasTeasers', App\Http\Controllers\cpas_teaserController::class);

Route::resource('cpasTrackers', App\Http\Controllers\cpas_trackerController::class);

Route::resource('discAmounts', App\Http\Controllers\disc_amountController::class);

Route::resource('doftDrivers', App\Http\Controllers\doft_driversController::class);

Route::resource('doftShippers', App\Http\Controllers\doft_shippersController::class);

Route::resource('doftSignups', App\Http\Controllers\doft_signupController::class);

Route::resource('dragApps', App\Http\Controllers\drag_appController::class);

Route::resource('dragConfigs', App\Http\Controllers\drag_configController::class);

Route::resource('dragConfigDbs', App\Http\Controllers\drag_config_dbController::class);

Route::resource('dragForms', App\Http\Controllers\drag_formController::class);

Route::resource('dragFormDbs', App\Http\Controllers\drag_form_dbController::class);

Route::resource('dynaChesses', App\Http\Controllers\dyna_chessController::class);

Route::resource('dynaChessItems', App\Http\Controllers\dyna_chess_itemController::class);

Route::resource('dynaChessQueries', App\Http\Controllers\dyna_chess_queryController::class);

Route::resource('dynaConfigs', App\Http\Controllers\dyna_configController::class);

Route::resource('dynaDynagrids', App\Http\Controllers\dyna_dynagridController::class);

Route::resource('dynaDynagridDtls', App\Http\Controllers\dyna_dynagrid_dtlController::class);

Route::resource('dynaFilters', App\Http\Controllers\dyna_filterController::class);

Route::resource('dynaMultis', App\Http\Controllers\dyna_multiController::class);

Route::resource('dynaStats', App\Http\Controllers\dyna_statsController::class);

Route::resource('faqs', App\Http\Controllers\faqsController::class);

Route::resource('faqsManuals', App\Http\Controllers\faqs_manualController::class);

Route::resource('faqsTypes', App\Http\Controllers\faqs_typeController::class);

Route::resource('govsDegrees', App\Http\Controllers\govs_degreeController::class);

Route::resource('govsEducations', App\Http\Controllers\govs_educationController::class);

Route::resource('govsPositions', App\Http\Controllers\govs_positionController::class);

Route::resource('govsSpecialities', App\Http\Controllers\govs_specialityController::class);

Route::resource('langs', App\Http\Controllers\langController::class);

Route::resource('langNationalities', App\Http\Controllers\lang_nationalityController::class);

Route::resource('mapsNavigates', App\Http\Controllers\maps_navigateController::class);

Route::resource('menus', App\Http\Controllers\menuController::class);

Route::resource('menuImages', App\Http\Controllers\menu_imageController::class);

Route::resource('news', App\Http\Controllers\newsController::class);

Route::resource('newsTypes', App\Http\Controllers\news_typeController::class);

Route::resource('pageActions', App\Http\Controllers\page_actionController::class);

Route::resource('pageApis', App\Http\Controllers\page_apiController::class);

Route::resource('pageApiTypes', App\Http\Controllers\page_api_typeController::class);

Route::resource('pageApps', App\Http\Controllers\page_appController::class);

Route::resource('pageBlocks', App\Http\Controllers\page_blocksController::class);

Route::resource('pageBlocksTypes', App\Http\Controllers\page_blocks_typeController::class);

Route::resource('pageThemes', App\Http\Controllers\page_themeController::class);