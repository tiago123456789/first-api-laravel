<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class HandlerExceptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (is_a($response->exception, ValidationException::class)) {
            return response($response->exception->errors())->setStatusCode(Response::HTTP_BAD_REQUEST);

        }

        return $response;
    }
}
