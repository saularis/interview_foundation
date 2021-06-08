<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

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

Route::get('/', 'GuestController@index')->name('welcome');
Route::get('/login', 'AuthController@githubRedirect');
Route::get('/callback', 'AuthController@githubCallback');
Route::get('/logout', 'AuthController@logout');

Route::get('/home', 'HomeController@index')->middleware('web', 'auth');
Route::post('/user/starred-repos', 'UserController@getStarredRepos')->middleware('web', 'auth');
