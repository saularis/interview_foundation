<?php

namespace App\Services;

use Github\Client as GithubClient;

class Github
{

    protected GithubClient $githubClient;

    public function __construct($token)
    {
        $this->githubClient = new GithubClient();
        $this->githubClient->authentication($token, null, 'access_token_header');
    }

    public function profile()
    {
        return $this->githubClient->api('me');
    }

    public function starred()
    {
        return $this->profile()->starring()->all();
    }
}
