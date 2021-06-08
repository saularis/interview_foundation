<?php

namespace Tests\Unit;

use App\User;
use App\Services\Github;
use PHPUnit\Framework\TestCase;

class GithubTest extends TestCase
{

    /** @test */
    public function it_displayes_star_repos_for_the_user()
    {
        $github = $this->createMock(Github::class);
        $github->setAccessToken('some_token');
        $github->method('getStarredRepos')->willReturn('starred repos');
        $this->assertEquals('starred repos', $github->getStarredRepos());
    }
}
