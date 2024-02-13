<?php

use App\Http\Controllers\ProductController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->as('v1:')->group(static function (): void {

    Route::get('/', function () {
        echo 'Welcome to our API v1';
    });

    Route::prefix('products')->as('products:')->controller(ProductController::class)->group(static function (): void {
        Route::get('/', 'index')->name('index');
    });
});
