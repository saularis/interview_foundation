<?php

namespace Tests\Unit;

use App\User;
use App\Services\Github;
use PHPUnit\Framework\TestCase;

class GithubTest extends TestCase
{

    /** @test */
    function it_contains_profile_info()
    {
        $github = $this->createMock(Github::class);
        $github->method('profile')->willReturn('profile');
        $this->assertEquals('profile', $github->profile());
    }

    /** @test */
    function it_displayes_star_repos_for_the_user()
    {
        $github = $this->createMock(Github::class);
        $github->method('starred')->willReturn('starred repos');
        $this->assertEquals('starred repos', $github->starred());
    }
}
