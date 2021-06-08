<?php

namespace App\Services;

use Github\Client as GithubClient;
use App\Exceptions\GithubException;
use Github\Exception\RuntimeException;

class Github extends GithubClient
{
    public function setAccessToken($token)
    {
        $this->authenticate($token, null, 'access_token_header');
        return $this;
    }

    public function getStarredRepos()
    {
        try {
            $starredRepos = $this->api('me')->starring()->all();
        } catch (RuntimeException $exception) {
            throw new GithubException($exception->getMessage(), 401);
        }
        return $starredRepos;
    }
}
