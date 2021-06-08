<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    public function githubRedirect()
    {
        return Socialite::driver('github')->scopes(['read:user'])->redirect();
    }

    public function githubCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::firstOrNew([
            'email' => $githubUser->email
        ], [
            'name' => $githubUser->name,
            'token' =>  $githubUser->token,
            'email_verified_at' => Carbon::now()
        ]);
        $user->save();
        Auth::login($user);
        return redirect('/home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
