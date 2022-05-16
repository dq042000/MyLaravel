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

// 群組
Route::prefix('admin')->group(function () {
    Route::get('/title', [TitleController::class, 'index']);
    Route::get('/ad', [AdController::class, 'index']);
    Route::get('/image', [ImageController::class, 'index']);
    Route::get('/mvim', [MvimController::class, 'index']);
    Route::get('/total', [TotalController::class, 'index']);
    Route::get('/bottom', [BottomController::class, 'index']);
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/menu', [MenuController::class, 'index']);
});

// modals
Route::get('/modals/{module}', function ($module) {
    switch ($module) {
        case "addTitle":
            return view('modals.base_modal', ['modal_header' => '新增網站標題']);
            break;
        case "addAd":
            return view('modals.base_modal', ['modal_header' => '新增動態廣告文字']);
            break;
        case "addImage":
            return view('modals.base_modal', ['modal_header' => '新增校園映像圖片']);
            break;
        case "addMvim":
            return view('modals.base_modal', ['modal_header' => '新增動畫圖片']);
            break;
        case "addTotal":
            return view('modals.base_modal', ['modal_header' => '新增進站人數']);
            break;
        case "addBottom":
            return view('modals.base_modal', ['modal_header' => '新增頁尾版權']);
            break;
        case "addNews":
            return view('modals.base_modal', ['modal_header' => '新增最新消息']);
            break;
        case "addAdmin":
            return view('modals.base_modal', ['modal_header' => '新增管理者']);
            break;
        case "addMenu":
            return view('modals.base_modal', ['modal_header' => '新增選單']);
            break;
    }
});