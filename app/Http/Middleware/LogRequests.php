<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Ghi lại thông điệp Log
        Log::info('Request',[
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'params' => $request->all(),
        ]);

        $response = $next($request);

        Log::info('Response', [
            'status' => $response->getStatusCode(),
            'content' => $response->getContent()
        ]);

        return $response;
    }
}
