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

    public function token()
    {
        return 'sample_token';
    }
}
