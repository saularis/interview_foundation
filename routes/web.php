<?php

use App\User;
use Illuminate\Support\Facades\Cookie;
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

Route::get('/', function (Request $request) {
    //ray(cookie('isLoggedIn'));
    if(Cookie::get('isLoggedIn')){
        return redirect('/home');
    }
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::get('/callback', function () {
    $user = new User();
    $user->code = request('code');
    $user->save();
    Cookie::queue('isLoggedIn', true, 10);
    return redirect('/home');
});
