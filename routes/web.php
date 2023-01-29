<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
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

Route::get('/', function () {
    return view('newsPortal');
});

//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function() {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

Route::group(['prefix' => ''], static function() {
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

    Route::get('/news/{news_id}/show', [NewsController::class, 'show'])
        ->where('news_id', '\d+')
        ->name('news.show');

    Route::get('/categories/news/', [NewsController::class, 'index'])
        ->name('categories_id');
});

Route::group(['prefix' => ''], static function() {
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories');

    Route::get('/categories/{category_id}/show', [CategoryController::class, 'show'])
        ->where('category_id', '\d+')
        ->name('categories.show');
});
