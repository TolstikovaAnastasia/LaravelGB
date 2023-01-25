<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\CategoriesController;
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
Route::group(['prefix' => 'admin'], static function() {
    Route::get('/', AdminController::class)
        ->name('admin.index');
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
    Route::get('/categories', [CategoriesController::class, 'index'])
        ->name('categories');

    Route::get('/categories/{category_id}/show', [CategoriesController::class, 'show'])
        ->where('category_id', '\d+')
        ->name('categories.show');
});
