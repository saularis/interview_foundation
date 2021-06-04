<?php

namespace Tests\Unit;

use App\Services\Github;
use PHPUnit\Framework\TestCase;

class GithubTest extends TestCase
{
    /** @test */
    function it_contains_github_token()
    {
        $github = new Github;
        $github->token();
        $this->assertEquals('sample_token', $github->token());
    }
}
