<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()->getName();
        if (! $routeName) {
            return $next($request);
        }

        // Super Admin can bypass all
        if ($request->user()->hasRole('Super Admin')) {
            return $next($request);
        }

        if (! $request->user()->can($routeName)) {
            notify()->error('You do not have permission to access this page');
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
