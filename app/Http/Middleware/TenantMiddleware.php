<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Domain;
use Illuminate\Support\Facades\Log;


class TenantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        $tenant = Domain::where('domain', $host)->first();

        if (!$tenant) {
            abort(404, 'Tenant not found.');
        }


        app()->singleton('tenant', function () use ($tenant) {
            return $tenant;
        });

        return $next($request);
    }
}
