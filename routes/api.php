<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', ProductController::class);


Route::get('rate-product/user/{user}/product/{product}/rate/{rate}', [ProductController::class, 'rateProduct', ['user', 'product', 'rate']]);

/*
Route::get('rate-product/data/{data}', function ($data) {
    return 'ok2' . $data;
});
*/

/*
Route::get('rate-product/data/{data}', function(){
    //$data = "Name";
    return App::call('App\Http\Controllers\Api\ProductController@rateProduct' , ['data' => $data]);
});
*/

/*
Route::get('rate-product', [ProductController::class, 'rateProduct']);
*/

/*
Route::get('user/{id}/profile', function ($id) {
    //
})->name('profile');
*/
