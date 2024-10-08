<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isGuru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('guru')->check()) {
            $sessionData = $request->session()->get('meta_data');
            if ($sessionData && isset($sessionData['roles'])) {
                if ($sessionData['roles']) {
                    return $next($request);
                }
            }
        }

        $request->session()->invalidate();
        return response()->redirectToRoute('logout')->with('error', 'Session anda habis.');
    }
}
