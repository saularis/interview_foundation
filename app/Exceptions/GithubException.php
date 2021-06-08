<?php

namespace App\Exceptions;

use Exception;

class GithubException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'status' => 'failed',
            'message' => 'invalid credentials'
        ], 401);
    }
}
