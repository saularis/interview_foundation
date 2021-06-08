<?php

namespace App\Http\Controllers;

use App\User;
use App\Services\Github;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function getStarredRepos(Request $request, Github $github)
    {
        $request->validate([
            'token' => 'required'
        ]);

        if (Auth::user()->email == $request->email) {
            User::where('email', $request->email)
                ->update(['token' => Crypt::encrypt($request->token)]);
        }
        $starredRepos = $github->setAccessToken($request->token)->getStarredRepos();
        return response()->json(['starred_repos' => $starredRepos], 200);
    }
}
