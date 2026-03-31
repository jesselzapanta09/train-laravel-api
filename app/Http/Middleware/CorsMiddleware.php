<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $allowedOriginsRaw = env('ALLOWED_ORIGINS', '*');
        $origin            = $request->header('Origin', '');

        if ($request->getMethod() === 'OPTIONS') {
            $response = response('', 200);
            return $this->addCorsHeaders($response, $origin, $allowedOriginsRaw);
        }

        $response = $next($request);

        return $this->addCorsHeaders($response, $origin, $allowedOriginsRaw);
    }

    private function addCorsHeaders(Response $response, string $origin, string $allowedOriginsRaw): Response
    {
        $allowOrigin = '*';

        if ($allowedOriginsRaw !== '*' && $origin !== '') {
            $allowedOrigins = array_map('trim', explode(',', $allowedOriginsRaw));
            $allowOrigin = in_array($origin, $allowedOrigins, true) ? $origin : '';
        }

        if ($allowOrigin === '') {
            return $response;
        }

        return $response
            ->header('Access-Control-Allow-Origin', $allowOrigin)
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization')
            ->header('Access-Control-Allow-Credentials', 'true');
    }
}
