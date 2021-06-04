<?php

namespace App\Services;

use App\User;

class Github
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function profile()
    {
        // return $this->getUser()->github;
        return [
            'profile' => 'saularis',
            'token' => 'sample_token'
        ];
    }

    public function token()
    {
        // return $this->profile()->token;
        return $this->profile()['token'];
    }
}
