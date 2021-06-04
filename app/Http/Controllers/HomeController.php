<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if(Cookie::get('isLoggedIn')){
            return view('home');
        }
        
        return redirect('/');
    }
}
