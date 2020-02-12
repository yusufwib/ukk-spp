<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminAccess
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
        if (Session::get('level') == 1) {
            return $next($request);
        }

        else {
            return redirect()->back()->with('access_err', 'Entri meja hanya bisa diakses admin!');
        }
    }
}
