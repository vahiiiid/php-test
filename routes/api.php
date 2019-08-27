<?php

use Illuminate\Http\Request;

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


Route::group([
    'middleware' => 'api',
], function () {
    Route::post('v1/auth/login', 'Api\V1\Auth\AuthController@login');
    Route::post('v1/auth/logout', 'Api\V1\Auth\AuthController@logout');
    Route::post('v1/auth/refresh', 'Api\V1\Auth\AuthController@refresh');
    Route::post('v1/auth/me', 'Api\V1\Auth\AuthController@me');

    Route::get('v1/restaurants', 'Api\V1\Restaurants\RestaurantController@index');
    Route::get('v1/foods/restaurant/{id}', 'Api\V1\Foods\FoodController@getRestaurantFoods');
    Route::get('v1/orders/user', 'Api\V1\Orders\OrderController@getUserOrders');
    Route::put('v1/orders/{order}/change-status', 'Api\V1\Orders\OrderController@changeOrderStatus');
});

Route::apiResources([
    'v1/orders' => 'Api\V1\Orders\OrderController',
]);
