<?php

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

// // 只要是admin進來的(url: http://localhost/admin)
// Route::prefix('admin')->group(function () {
//     // 接在admin之後的(url: http://localhost/admin/title)
//     Route::view('/', 'backend.title');
//     Route::view('/title', 'backend.title');
//     Route::view('/ad', 'backend.ad');
// });

Route::view('/admin', 'backend.module', ['header' => '網站標題管理', 'module' => 'Title']);
Route::get('/admin/{module}', function ($module) {
    switch ($module) {
        case "title":
            return view('backend.module', ['header' => '網站標題管理', 'module' => 'Title']);
            break;
        case "ad":
            return view('backend.module', ['header' => '動態廣告文字管理', 'module' => 'Ad']);
            break;
        case "image":
            return view('backend.module', ['header' => '校園映像圖片管理', 'module' => 'Image']);
            break;
        case "mvim":
            return view('backend.module', ['header' => '動畫圖片管理', 'module' => 'Mvim']);
            break;
        case "total":
            return view('backend.module', ['header' => '進站人數管理', 'module' => 'Total']);
            break;
        case "bottom":
            return view('backend.module', ['header' => '頁尾版權管理', 'module' => 'Bottom']);
            break;
        case "news":
            return view('backend.module', ['header' => '最新消息管理', 'module' => 'News']);
            break;
        case "admin":
            return view('backend.module', ['header' => '管理者管理', 'module' => 'Admin']);
            break;
        case "menu":
            return view('backend.module', ['header' => '選單管理', 'module' => 'Menu']);
            break;
    }
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