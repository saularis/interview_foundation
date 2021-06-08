<?php

namespace App\Http\Controllers;

use App\User;
use App\Services\Github;
use App\Http\Requests\StarredRepoRequest;

class UserController extends Controller
{
    public function getStarredRepos(StarredRepoRequest $request, Github $github)
    {
        User::updateToken($request);
        $starredRepos = $github->setAccessToken($request->token)->getStarredRepos();
        return response()->json(['starred_repos' => $starredRepos], 200);
    }
}
