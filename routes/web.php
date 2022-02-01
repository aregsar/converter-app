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


// Route::get("convert/{currency}", function ($currency) {
//     $amount = \Converter::convert($currency);
//     return $amount ?? "Currency not supported";
// })->name("convert");


Route::get("test", function () {
    return config("acme-converter.packagename_prefix");
});

Route::get('/user', function () {

    $user = \App\Models\User::all()->first();

    if ($user == null) {
        $user = new \App\Models\User(
            [
                "name" => "testuser",
                "email" => "testuser@gmail.com",
                "email_verified_at" => now(),
                "password" => bcrypt("password"),
                //'password' => \Illuminate\Support\Facades\Hash::make('password'),
                "remember_token" => "abcd",
            ]
        );

        $user->save();
    }

    return $user;
});


Route::get('/users', function () {

    return \App\Models\User::all();
});


Route::get('/notes', function () {

    return \Aregsar\Converter\Models\Note::all();
});



Route::get('/note', function () {

    $user = \App\Models\User::all()->firstOrFail();

    $user->notes()->create([
        'content'  => 'All work and no play make Jack a dull boy',
    ]);

    return \Aregsar\Converter\Models\Note::all();
});


Route::get('/clearusers', function () {

    foreach (\Aregsar\Converter\Models\Note::all() as $note) {
        $note->delete();
    }

    foreach (\App\Models\User::all() as $user) {
        $user->delete();
    }

    return \App\Models\User::all();
});



Route::get('/clearnotes', function () {

    foreach (\Aregsar\Converter\Models\Note::all() as $note) {
        $note->delete();
    }

    return \Aregsar\Converter\Models\Note::all();
});
