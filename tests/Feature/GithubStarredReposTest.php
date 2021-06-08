<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class GithubStarredReposTest extends TestCase
{
    /** @test */
    public function it_gets_starred_repos_from_github()
    {
        Http::fake(function ($request) {
            return Http::response('starred repos', 200);
        });

        $response = Http::post('/user/starred-repos', [
            'token' => 'some_token',
            'name' => 'abdulla malik',
            'email' => 'abdulla.coder@gmail.com'
        ]);
        
        $this->assertEquals('starred repos', $response->body());
    }
}
