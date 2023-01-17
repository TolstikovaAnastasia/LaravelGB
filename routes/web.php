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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', static function (string $name): string {
    return "Hello, {$name}";
});

Route::get('/news', static function (): string {
    return "Below you will find news on completely different topics.";
});

Route::get('/news/{id}', static function (string $id) {
    return "News with #ID {$id}: 'Kevin Feige On Why Ant-Man And The Wasp: Quantumania Is The Start Of The MCU’s Phase 5 – Exclusive.'";
});

