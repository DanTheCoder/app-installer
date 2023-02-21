<?php

namespace DanTheCoder\AppInstaller\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InstallCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Disable the app installer if the process was completed
        if (config('app-installer.completed')) {
            return redirect('/');
        }

        return $next($request);
    }
}
