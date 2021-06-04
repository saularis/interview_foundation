<?php

namespace Tests\Unit;

use App\User;
use App\Services\Github;
use PHPUnit\Framework\TestCase;

class GithubTest extends TestCase
{
    protected GitHub $github;

    public function setUp() : void
    {
        $this->github = new Github(new User);
    }

    /** @test */
    function it_has_user_instance()
    {
        $this->assertInstanceOf(User::class, $this->github->getUser());
    }

    /** @test */
    function it_contains_profile_info()
    {
        $profile = [
            'profile' => 'saularis',
            'token' => 'sample_token'
        ];
        $this->assertEquals($profile, $this->github->profile());
    }

    /** @test */
    function it_contains_github_token()
    {
        $this->assertEquals('sample_token', $this->github->token());
    }

    /** @test */
    function it_displayes_star_repos_for_the_user()
    {
        $this->assertEquals('star repositories', $this->github->starred());
    }
}
