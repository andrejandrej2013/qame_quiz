<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::name('user.')->group(function(){
    Route::view('/private','private')->middleware('auth')->name('private');
    Route::get('/login', function () {
        if(Auth::check())
        {
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');
    // Route::post('/login', 'App\Http\Controllers\UserController@submit')->name('reg-form');
    // Route::get('/logout', [])->name('logout');
    Route::get('/registration', function () {
        if(Auth::check())
        {
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    // Route::post('/registration', 'App\Http\Controllers\UserController@submit')->name('reg-form');

});




Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/rank', function () {
    return view('rank');
})->name('rank');

Route::post('/reg-form/submit', 'App\Http\Controllers\UserController@submit')->name('reg-form');