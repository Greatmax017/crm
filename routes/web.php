<?php

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
Route::get('/home', function(){
 return view('welcome');
});
Route::get('/', 'HomeController@index');
Route::get('/privacy', 'HomeController@privacy');
Route::get('/terms', 'HomeController@terms');
Route::get('/contact', 'HomeController@contact');
Route::get('/about', 'HomeController@about');
Route::get('/faq', 'HomeController@faq');
Route::post('/contact_us', 'HomeController@contact_us');
Route::get('/investment', 'HomeController@investment');
Route::get('/blog/{url}','HomeController@blog_item');

Route::post('/568740130:AAEy4Pn6vbpdHxPUAI3dzGVn3szWYNKDjGY/webhook', 'CronController@telegramWebhook');
Route::get('/blockchain/callback', 'CronController@blockchainCallback');

Route::get('/coinbase/callback', 'CronController@coinbaseCallback');
Route::post('/coinbase/webhook', 'CronController@coinbaseWebhook');
//Route::get('/coinbase/webhook', 'CronController@coinbaseWebhook');



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('user/activation/{token}', 'Auth\ActivationController@activateUser')->name('user.activate');
Route::get('/resend_activation', 'Auth\ActivationController@resendActivation')->middleware('auth');

//Route::get('/home', 'DashController@index');
Route::get('/dashboard', 'DashController@index');
Route::get('/bankdeposit', 'DashController@bankdeposit');
Route::get('/erc20payaddress', 'DashController@erc20payaddress');
Route::get('/fiataddress', 'DashController@fiataddress');
Route::get('/ApplyWithdrawals', 'DashController@ApplyWithdrawals');
Route::get('/payoptions', 'DashController@payoptions');
Route::get('/usdpayamount', 'DashController@usdpayamount');
Route::get('/usdtpayamount', 'DashController@usdtpayamount');
Route::get('/ercpayamount', 'DashController@ercpayamount');
Route::get('/record', 'DashController@record');
Route::get('/withrecord', 'DashController@withrecord');
Route::get('/Accountset', 'DashController@Accountset');
Route::get('/messagebox', 'DashController@messagebox');
Route::get('/Kyc', 'DashController@kyc');
Route::get('/invest', 'DashController@invest');
Route::get('/withdrawal', 'DashController@withdrawal');
Route::get('/profile', 'DashController@show_profile');
Route::get('/tutorials', 'DashController@show_tutorials');
Route::get('/airtime', 'DashController@airtime');
Route::get('/mtn_data', 'DashController@mtn_data');
Route::get('/add_money', 'DashController@add_money');
Route::get('/mtn_bulk_data', 'DashController@bulk_data');
Route::get('/other_gsm_data', 'DashController@other_gsm_data');
Route::get('/broadband', 'DashController@broadband');
Route::get('/cable', 'DashController@cable');
Route::get('/electricity', 'DashController@electricity');
Route::get('/education', 'DashController@education');
Route::get('/share_money', 'DashController@share_money');
Route::post('/share', 'DashController@share');
Route::post('/hash', 'DashController@hash');
Route::post('/pop', 'DashController@pop');
Route::post('/profilepic', 'DashController@profilepic');
Route::post('/kyc', 'DashController@kycupload');

Route::get('/data', function(){
    return view ('data');
} );
Route::get('/add_bundle', function(){
    return view ('add_bundle');
} );


Route::get('/referred_bonus', 'DashController@show_referred');
Route::get('/message/reply/{id?}', 'DashController@reply_message');
Route::get('/message/{id?}', 'DashController@show_message');
Route::get('/transaction_history', 'DashController@transaction_history');
Route::get('/affiliates', 'DashController@show_affiliates');
Route::get('/fiat/{id}', 'DashController@fiat');
Route::post('/purchase_request', 'DashController@purchase_request');
Route::post('/paid', 'DashController@paid');
Route::post('/deposit', 'DashController@deposit');
Route::post('/fiatdeposit', 'DashController@fiatdeposit');

Route::post('/investment-request', 'DashController@investment_request');

Route::post('/reset_password', 'DashController@change_password');

Route::post('/profile', 'DashController@save_profile');
Route::post('/applywithdraw', 'DashController@applywithdraw');
Route::post('/linkmt', 'DashController@linkmt');
Route::post('/confirm_rc', 'DashController@confirm_receipt');
Route::post('/get_bonus', 'DashController@get_bonus');
Route::post('/merge_shares', 'DashController@merge_shares');
Route::post('/confirm_ph', 'DashController@confirm_provide_help');
Route::post('/reject_ph', 'DashController@reject_provide_help');
//Route::post('/complain_rc', 'DashController@complain_receipt');
Route::post('/send_message', 'DashController@send_message');
Route::post('/unsuspend_acct', 'DashController@unsuspend_acct');
Route::post('/withdraw/{id}', 'DashController@withdraw');
Route::post('/share_testimony', 'DashController@share_testimony');
//Route::post('/pin_activation', 'DashController@pin_activation');
Route::post('/buy_airtime',  'DashController@buy_airtime');
// Route::get('/deposit', 'DashController@deposit');

Route::middleware(['auth', 'admin'])->group(function () {
Route::get('/admin', 'AdminController@index');
Route::get('/admin/funding', 'AdminController@funding');
Route::post('/admin/funding', 'AdminController@fundingpaid');
    Route::get('/admin/airtime', 'AdminController@airtime');
    Route::post('/admin/update_airtime', 'AdminController@update_airtime');
    Route::get('/admin/users', 'AdminController@show_users');
    Route::get('/admin/messagebox', 'AdminController@messagebox');
    Route::get('/admin/message/reply/{id?}', 'AdminController@reply_message');
    Route::get('/admin/message/{id?}', 'AdminController@show_message');
    Route::get('/admin/deleted', 'AdminController@show_deleted_users');
    Route::get('/admin/user/{id}/suspend', 'AdminController@suspend_user');
    Route::get('/admin/user/{id}/release', 'AdminController@release_user');
    Route::get('/admin/user/{id}', 'AdminController@get_user');
    Route::get('/admin/transactions', 'AdminController@show_transactions');
    Route::get('/admin/kyc', 'AdminController@kyc');
    Route::get('/admin/testimonies', 'AdminController@show_testimonies');
    Route::post('/admin/clear_shares', 'AdminController@clear_shares');
    Route::get('/admin/withdrawals', 'AdminController@withrecord');
    Route::get('/admin/withdrawn', 'AdminController@show_withdrawn');
    Route::get('/admin/products', 'AdminController@products');
    Route::post('/admin/update_product', 'AdminController@update_product');
    Route::post('/admin/mt4', 'AdminController@mt4');
    Route::post('/admin/mt4password', 'AdminController@mt4password');
    Route::post('/admin/balance', 'AdminController@balance');
    Route::post('/admin/net', 'AdminController@net');
    Route::post('/admin/bonus', 'AdminController@bonus');
    Route::post('/admin/t_income', 'AdminController@t_income');
    Route::post('/admin/pnl', 'AdminController@pnl');
    Route::post('/admin/return', 'AdminController@return');
    Route::post('/admin/margin', 'AdminController@margin');
    Route::post('/admin/transact', 'AdminController@transact');
    Route::post('/admin/send_money', 'AdminController@send_money');
    Route::post('/admin/kyc_approve', 'AdminController@kyc_approve');
    Route::post('/admin/create_admin', 'AdminController@create_admin');
    Route::post('/admin/add_bundle', 'AdminController@add_bundle');
    Route::post('/admin/discount', 'AdminController@discount');

    Route::resource('/admin/blog', 'BlogController');
    Route::post('/admin/image', 'AdminController@uploadImage');
    Route::post('/admin/confirm_investment', 'AdminController@confirm_investment');
    Route::post('/admin/status_update', 'AdminController@status_update');
    Route::post('/admin/with_update', 'AdminController@with_update');

    Route::post('/admin_settings', 'AdminController@save_settings');
    Route::post('/admin_save_user', 'AdminController@save_user');
    Route::post('/admin/update_account', 'AdminController@update_account');
    Route::post('/admin_edit_transaction', 'AdminController@edit_transaction');
    Route::get('/admin_user_affiliate/{id}', 'AdminController@user_affiliate');
    Route::get('/admin/account/{id}', 'AdminController@account');

    Route::post('/admin_save_testimony', 'AdminController@save_testimony');
    Route::post('/admin_delete_testimony', 'AdminController@delete_testimony');

    Route::post('/admin_transactions', 'AdminController@save_transactions');
    Route::delete('/admin_transaction/{id}', 'AdminController@delete_transaction');
    Route::post('/admin/send_message', 'AdminController@send_message');
    Route::post('/delete_user', 'AdminController@delete_user');
    Route::post('/permanent/delete_user', 'AdminController@permanent_delete_user');
    Route::post('/restore/delete_user', 'AdminController@restore_delete_user');
    
    Route::post('/admin_notify', 'AdminController@admin_notify');
    Route::post('/admin_profile/{id}', 'AdminController@admin_profile');
});

Route::get('/test-notification', 'HomeController@test_notification')->middleware('auth');
//Route::get('/make-payment', 'PaymentController@make_payment')->middleware('auth');
//Route::post('/process_payment', 'PaymentController@process_payment')->middleware('auth');

// Route::get('/rave/callback', [
//     'uses' => 'PaymentController2@callback',
//     'as' => 'callback'
// ])->middleware('auth');
// Route::post('/pay', [
//     'uses' => 'PaymentController2@redirectToGateway',
//     'as' => 'pay'
// ])->middleware('auth');

Route::post('/pay', 'FlutterwaveController@initialize')->middleware('auth');
Route::post('/paynew', 'DashController@paynew')->middleware('auth');
// The callback url after a payment
Route::get('/rave/callback', 'FlutterwaveController@callback')->middleware('auth');


Route::get('/wealthy/cron/job', 'CronController@check_transactions');
Route::get('/run_script', 'CronController@run_script');
//Route::get('/wealthy/reset/accounts', 'CronController@reset_accounts');

Route::get('/populate', 'populator@index');
Route::get('/reloadprofit', 'populator@reloadprofit');
Route::get('/manual/login/{id}', 'populator@loginAs');
// Route::get('/firemail', 'CronController@firemail');

