<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::prefix('books')->group(function () {
//     Route::get('/', [BookController::class, "index"]);
//     Route::post('/create', [BookController::class, "create"]);
//     Route::get('/{_id}', [BookController::class, "show"]);
// });


Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, "index"]);
});


// Route::group(['as' => 'api'], function () {
Orion::hasManyResource('books', 'category', BookController::class)->only('index', 'show', 'search', 'destroy');
// });
