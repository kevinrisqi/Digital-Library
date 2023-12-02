<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        // if (!Auth::guard('admin')->check()) {
        //     error_log('bridge by middleware');
        //     // If not authenticated, redirect to the admin login page or do something else
        //     return redirect()->route('admin.login');
        // }
        return $next($request);
    }
}
