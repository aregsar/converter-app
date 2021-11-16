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


Route::get("convert/{currency}", function ($currency) {
    // $amount = \Aregsar\Converter\ConverterFacade::convert($currency);
    $amount = Converter::convert($currency);
    return $amount ?? "Currency not supported";
})->name("convert");
