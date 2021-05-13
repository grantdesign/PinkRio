<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class CheckIsAdmin
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
        $user = Auth::user();

        if (!$user->is_admin) {

            Auth::logout(); // выход из сессии
            return redirect()->route('home');

        }

        return $next($request);
    }
}
