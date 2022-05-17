<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BottomController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MvimController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\TotalController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'home');

// redirect: 自動導向
Route::redirect('/admin', '/admin/title');

// 後台管理群組
Route::prefix('admin')->group(function () {
    // get
    Route::get('/title', [TitleController::class, 'index']);
    Route::get('/ad', [AdController::class, 'index']);
    Route::get('/image', [ImageController::class, 'index']);
    Route::get('/mvim', [MvimController::class, 'index']);
    Route::get('/total', [TotalController::class, 'index']);
    Route::get('/bottom', [BottomController::class, 'index']);
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/menu', [MenuController::class, 'index']);

    // post
    Route::post('/title', [TitleController::class, 'store']);
    Route::post('/ad', [AdController::class, 'store']);
    Route::post('/image', [ImageController::class, 'store']);
    Route::post('/mvim', [MvimController::class, 'store']);
    Route::post('/news', [NewsController::class, 'store']);
    Route::post('/admin', [AdminController::class, 'store']);
    Route::post('/menu', [MenuController::class, 'index']);

    // update
    Route::patch('/title/{id}', [TitleController::class, 'update']);

    // delete
    Route::delete('/title/{id}', [TitleController::class, 'destroy']);

    // show
    Route::patch('/title/sh/{id}', [TitleController::class, 'display']);
});

// modals群組
Route::prefix('modals')->group(function () {
    Route::get('/addTitle', [TitleController::class, 'create']);
    Route::get('/addAd', [AdController::class, 'create']);
    Route::get('/addImage', [ImageController::class, 'create']);
    Route::get('/addMvim', [MvimController::class, 'create']);
    Route::get('/addTotal', [TotalController::class, 'create']);
    Route::get('/addBottom', [BottomController::class, 'create']);
    Route::get('/addNews', [NewsController::class, 'create']);
    Route::get('/addAdmin', [AdminController::class, 'create']);
    Route::get('/addMenu', [MenuController::class, 'create']);
});

// edit
Route::get('/modals/title/{id}', [TitleController::class, 'edit']);