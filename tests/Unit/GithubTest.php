<?php

namespace Tests\Unit;

use App\User;
use App\Services\Github;
use PHPUnit\Framework\TestCase;

class GithubTest extends TestCase
{
    /** @test */
    function it_has_user_instance()
    {
        $github = new Github(new User);
        $this->assertInstanceOf(User::class, $github->getUser());
    }

    /** @test */
    function it_contains_profile_info()
    {
        $github = new Github(new User);
        $profile = [
            'profile' => 'saularis',
            'token' => 'sample_token'
        ];
        $this->assertEquals($profile, $github->profile());
    }

    /** @test */
    function it_contains_github_token()
    {
        $github = new Github(new User);
        $this->assertEquals('sample_token', $github->token());
    }
}
