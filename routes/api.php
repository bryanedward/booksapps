<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
// Controllers
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('category')->group(function () {
    // Route::get('/', [CategoryController::class, "index"]);
    Route::post('/store', [CategoryController::class, 'store']);
    // Route::get('/{_id}', [BookController::class, "show"]);
});

Route::group(['as' => 'api.'], function () {
    Orion::resource('posts', BookController::class);
    Orion::morphToManyResource('posts', 'authors', AuthorController::class);

});
