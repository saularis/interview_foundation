<?php

namespace Tests\Unit;

use App\User;
use App\Services\Github;
use PHPUnit\Framework\TestCase;

class GithubTest extends TestCase
{
    /** @test */
    public function it_has_user_instance()
    {
        $github = new Github(new User);
        $this->assertInstanceOf(User::class, $github->getUser());
    }

    /** @test */
    function it_contains_github_token()
    {
        $github = new Github(new User);
        $github->token();
        $this->assertEquals('sample_token', $github->token());
    }
}
