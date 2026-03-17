<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            if (auth()->user()->role == 'superadmin') {
                return $next($request);
            }
            // return response()->json(['You do not have permission to access for this page.']); 
            abort(403, 'You are not allowed to permission');
        } else {
            return redirect()->route('/login');
        }
    }
}
