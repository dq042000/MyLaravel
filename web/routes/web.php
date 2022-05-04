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

Route::get('/admin/{module}', function ($module) {
    switch ($module) {
        case "title":
            return view('backend.module', ['header' => '網站標題管理']);
            break;
        case "ad":
            return view('backend.module', ['header' => '動態廣告文字管理']);
            break;
    }
});