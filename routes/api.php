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
Route::prefix('api/v1/')->group(function () {
    Route::resource('autos', App\Http\Controllers\API\autoAPIController::class);
    Route::resource('auto_models', App\Http\Controllers\API\auto_modelAPIController::class);
});
Route::resource('autos', App\Http\Controllers\API\autoAPIController::class);

Route::resource('auto_models', App\Http\Controllers\API\auto_modelAPIController::class);

Route::resource('auto_motors', App\Http\Controllers\API\auto_motorAPIController::class);

Route::resource('auto_types', App\Http\Controllers\API\auto_typeAPIController::class);

Route::resource('calls_admins', App\Http\Controllers\API\calls_adminAPIController::class);

Route::resource('calls_cdrs', App\Http\Controllers\API\calls_cdrAPIController::class);

Route::resource('calls_cels', App\Http\Controllers\API\calls_celAPIController::class);

Route::resource('calls_extens', App\Http\Controllers\API\calls_extensAPIController::class);

Route::resource('calls_ivrs', App\Http\Controllers\API\calls_ivrAPIController::class);

Route::resource('calls_orders', App\Http\Controllers\API\calls_orderAPIController::class);

Route::resource('calls_queues', App\Http\Controllers\API\calls_queueAPIController::class);

Route::resource('calls_records', App\Http\Controllers\API\calls_recordAPIController::class);

Route::resource('calls_statuses', App\Http\Controllers\API\calls_statusAPIController::class);

Route::resource('calls_status_times', App\Http\Controllers\API\calls_status_timeAPIController::class);

Route::resource('calls_usermen', App\Http\Controllers\API\calls_usermanAPIController::class);

Route::resource('chat_groups', App\Http\Controllers\API\chat_groupAPIController::class);

Route::resource('chat_mails', App\Http\Controllers\API\chat_mailAPIController::class);

Route::resource('chat_messages', App\Http\Controllers\API\chat_messageAPIController::class);

Route::resource('chat_message_publics', App\Http\Controllers\API\chat_message_publicAPIController::class);

Route::resource('chat_notifies', App\Http\Controllers\API\chat_notifyAPIController::class);

Route::resource('chat_notify_roles', App\Http\Controllers\API\chat_notify_roleAPIController::class);

Route::resource('chat_privates', App\Http\Controllers\API\chat_privateAPIController::class);

Route::resource('chat_subscribes', App\Http\Controllers\API\chat_subscribeAPIController::class);

Route::resource('core_analytics', App\Http\Controllers\API\core_analyticsAPIController::class);

Route::resource('core_histories', App\Http\Controllers\API\core_historyAPIController::class);

Route::resource('core_inputs', App\Http\Controllers\API\core_inputAPIController::class);

Route::resource('core_mains', App\Http\Controllers\API\core_mainAPIController::class);

Route::resource('core_migras', App\Http\Controllers\API\core_migraAPIController::class);

Route::resource('core_queues', App\Http\Controllers\API\core_queueAPIController::class);

Route::resource('core_sessions', App\Http\Controllers\API\core_sessionAPIController::class);

Route::resource('core_settings', App\Http\Controllers\API\core_settingAPIController::class);

Route::resource('core_transacts', App\Http\Controllers\API\core_transactAPIController::class);

Route::resource('cpas_companies', App\Http\Controllers\API\cpas_companyAPIController::class);

Route::resource('cpas_lands', App\Http\Controllers\API\cpas_landAPIController::class);

Route::resource('cpas_offers', App\Http\Controllers\API\cpas_offerAPIController::class);

Route::resource('cpas_offer_items', App\Http\Controllers\API\cpas_offer_itemAPIController::class);

Route::resource('cpas_pays_histories', App\Http\Controllers\API\cpas_pays_historyAPIController::class);

Route::resource('cpas_sources', App\Http\Controllers\API\cpas_sourceAPIController::class);

Route::resource('cpas_streams', App\Http\Controllers\API\cpas_streamAPIController::class);

Route::resource('cpas_stream_items', App\Http\Controllers\API\cpas_stream_itemAPIController::class);

Route::resource('cpas_teasers', App\Http\Controllers\API\cpas_teaserAPIController::class);

Route::resource('cpas_trackers', App\Http\Controllers\API\cpas_trackerAPIController::class);

Route::resource('disc_amounts', App\Http\Controllers\API\disc_amountAPIController::class);

Route::resource('doft_drivers', App\Http\Controllers\API\doft_driversAPIController::class);

Route::resource('doft_shippers', App\Http\Controllers\API\doft_shippersAPIController::class);

Route::resource('doft_signups', App\Http\Controllers\API\doft_signupAPIController::class);

Route::resource('drag_apps', App\Http\Controllers\API\drag_appAPIController::class);

Route::resource('drag_configs', App\Http\Controllers\API\drag_configAPIController::class);

Route::resource('drag_config_dbs', App\Http\Controllers\API\drag_config_dbAPIController::class);

Route::resource('drag_forms', App\Http\Controllers\API\drag_formAPIController::class);

Route::resource('drag_form_dbs', App\Http\Controllers\API\drag_form_dbAPIController::class);

Route::resource('dyna_chesses', App\Http\Controllers\API\dyna_chessAPIController::class);

Route::resource('dyna_chess_items', App\Http\Controllers\API\dyna_chess_itemAPIController::class);

Route::resource('dyna_chess_queries', App\Http\Controllers\API\dyna_chess_queryAPIController::class);

Route::resource('dyna_configs', App\Http\Controllers\API\dyna_configAPIController::class);

Route::resource('dyna_dynagrids', App\Http\Controllers\API\dyna_dynagridAPIController::class);

Route::resource('dyna_dynagrid_dtls', App\Http\Controllers\API\dyna_dynagrid_dtlAPIController::class);

Route::resource('dyna_filters', App\Http\Controllers\API\dyna_filterAPIController::class);

Route::resource('dyna_multis', App\Http\Controllers\API\dyna_multiAPIController::class);

Route::resource('dyna_stats', App\Http\Controllers\API\dyna_statsAPIController::class);

Route::resource('faqs', App\Http\Controllers\API\faqsAPIController::class);

Route::resource('faqs_manuals', App\Http\Controllers\API\faqs_manualAPIController::class);

Route::resource('faqs_types', App\Http\Controllers\API\faqs_typeAPIController::class);

Route::resource('govs_degrees', App\Http\Controllers\API\govs_degreeAPIController::class);

Route::resource('govs_educations', App\Http\Controllers\API\govs_educationAPIController::class);

Route::resource('govs_positions', App\Http\Controllers\API\govs_positionAPIController::class);

Route::resource('govs_specialities', App\Http\Controllers\API\govs_specialityAPIController::class);

Route::resource('langs', App\Http\Controllers\API\langAPIController::class);

Route::resource('lang_nationalities', App\Http\Controllers\API\lang_nationalityAPIController::class);

Route::resource('maps_navigates', App\Http\Controllers\API\maps_navigateAPIController::class);

Route::resource('menus', App\Http\Controllers\API\menuAPIController::class);

Route::resource('menu_images', App\Http\Controllers\API\menu_imageAPIController::class);

Route::resource('news', App\Http\Controllers\API\newsAPIController::class);

Route::resource('news_types', App\Http\Controllers\API\news_typeAPIController::class);

Route::resource('page_actions', App\Http\Controllers\API\page_actionAPIController::class);

Route::resource('page_apis', App\Http\Controllers\API\page_apiAPIController::class);

Route::resource('page_api_types', App\Http\Controllers\API\page_api_typeAPIController::class);

Route::resource('page_apps', App\Http\Controllers\API\page_appAPIController::class);

Route::resource('page_blocks', App\Http\Controllers\API\page_blocksAPIController::class);

Route::resource('page_blocks_types', App\Http\Controllers\API\page_blocks_typeAPIController::class);

Route::resource('page_themes', App\Http\Controllers\API\page_themeAPIController::class);