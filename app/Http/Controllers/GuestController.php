<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('welcome');
    }
}
