<?php

use App\Http\Controllers\API\APIStatusController;
use App\Http\Controllers\API\ProductController;
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

Route::get('token', function () {
    return csrf_token();
});

Route::apiResource('/', APIStatusController::class);
Route::apiResource('products', ProductController::class);