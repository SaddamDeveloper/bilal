<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangerController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashstationController;
use App\Http\Controllers\OrderController;
use App\Models\Cashstation;

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

Route::middleware('throttle:60,60')->group(function () {
	Route::prefix('public')->group(function () {
		// Public
	    Route::get('recent_exchange', [PublicController::class, 'recentTransaction']);
	    Route::get('newest_currency', [PublicController::class, 'newestCurrency']);
	});
});

Route::middleware('throttle:500,60')->group(function () {
	Route::middleware('auth:sanctum')->group(function(){

		// Exchanger
		Route::prefix('exchanger')->group(function () {
	    	Route::get('/', [ExchangerController::class, 'getPair'])->name('exchanger.pair');
		    Route::get('country', [ExchangerController::class, 'getCountry']);
		    Route::get('search', [ExchangerController::class, 'findPair'])->name('exchanger.pair.find');
		    Route::prefix('offer')->group(function () {
		    	Route::post('new', [ExchangerController::class, 'newOffer']);
		   	});
	    });

		// Order
	    Route::prefix('order')->group(function () {
	    	Route::prefix('favorite')->group(function () {
				Route::get('list', [OrderController::class, 'getFavorite']);
				Route::delete('delete', [OrderController::class, 'delFavorite']);
			});

			Route::prefix('alert')->group(function () {
				Route::get('list', [OrderController::class, 'getAlert']);
				Route::delete('delete', [OrderController::class, 'delAlert']);
			});

			Route::prefix('blacklist')->group(function () {
				Route::get('list', [OrderController::class, 'getBlacklist']);
				Route::post('create_new', [OrderController::class, 'storeBlacklist']);
				Route::delete('delete', [OrderController::class, 'delBlacklist']);
			});

			Route::prefix('bindings')->group(function () {
				Route::get('list', [OrderController::class, 'getBindings']);
				Route::post('create_new', [OrderController::class, 'storeBindings']);
				Route::delete('delete', [OrderController::class, 'delBindings']);
			});

			Route::prefix('rating')->group(function () {
				Route::get('/', [OrderController::class, 'getRatings']);
			});
		});

	    //Wallet
        Route::prefix('wallet')->group(function(){
            Route::apiResource('', WalletController::class);
            Route::apiResource('transaction', TransactionController::class);
            Route::post('request', [TransactionController::class, 'request']);

            //Balance
            Route::prefix('balance')->group(function(){
                Route::get('search', [BalanceController::class, 'search']);
                Route::get('/{currency_id}', [BalanceController::class, 'balance']);
                Route::post('convert', [BalanceController::class, 'convert']);
            });

			// Cash Stations
			Route::prefix('cashstation')->group(function () {
				Route::get('/', [CashstationController::class, 'index']);
				Route::get('/service/{id}', [CashstationController::class, 'show']);
				Route::get('/comments', [CashstationController::class, 'comments']);
				Route::get('/reviews', [CashstationController::class, 'reviews']);
				Route::post('/add_comments', [CashstationController::class, 'addComments']);
				Route::get('/by/map', [CashstationController::class, 'byMap']);
			});
        });

	});

	Route::prefix('auth')->group(function () {
		// AUTH
		Route::post('login', [AuthController::class, 'login']);
		Route::post('register', [AuthController::class, 'register']);
		Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
	});

});
