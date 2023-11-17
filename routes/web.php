<?php

use App\Http\Middleware\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.welcome');
})->name('index');

Route::post('/saveDataToMySQL2', [\App\Http\Controllers\HomeController::class, 'saveDataToMySQL2'])->name('saveDataToMySQL2');
Route::post('/saveDataToMySQL3', [\App\Http\Controllers\HomeController::class, 'saveDataToMySQL3'])->name('saveDataToMySQL3');

Route::get('/plans', [\App\Http\Controllers\Subscriptions\PlanController::class, 'plans'])->name('plans');
Route::get('/plan/purchase', [\App\Http\Controllers\Subscriptions\PlanController::class, 'purchasePlan'])->name('plan.purchase');
Route::get('/plan/{plan}/purchase/result', [\App\Http\Controllers\Subscriptions\PlanController::class, 'purchasePlanResult'])->name('plan.purchase.result');

Auth::routes();

Route::group(['middleware' => ['auth', Subscriber::class]], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('plans', \App\Http\Controllers\Admin\PlanController::class);
    Route::delete('/destroy/all', [\App\Http\Controllers\Admin\PlanController::class, 'destroyAll'])->name('plans.destroyAll');
    //Transactions
    Route::get('/transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');
    //Settings
    Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('index');
        Route::post('/site', [\App\Http\Controllers\Admin\SettingsController::class, 'siteUpdate'])->name('siteUpdate');
        Route::post('/seo', [\App\Http\Controllers\Admin\SettingsController::class, 'seoUpdate'])->name('seoUpdate');
        Route::post('/payment', [\App\Http\Controllers\Admin\SettingsController::class, 'paymentUpdate'])->name('paymentUpdate');
        Route::post('/sms', [\App\Http\Controllers\Admin\SettingsController::class, 'smsUpdate'])->name('smsUpdate');
    });
});
