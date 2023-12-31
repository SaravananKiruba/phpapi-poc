<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PdfController;

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


Route::get('/getorderdetails', [OrderController::class, 'getOrderDetails']);
Route::get('/order-details/{orderNumber}', [OrderController::class, 'getOrderDetailbyOrderNo']);
Route::get('/getOrders', [OrderController::class, 'getOrders']);
Route::get('/generate-pdf/{orderNumber}', [PdfController::class, 'generatePdf']);

//Git checking 




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
