<?php

namespace App\Http\Middleware;

use App\Models\User;

use Closure;

use Auth;

class Admin
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
        if ( Auth::check() && User::isAdmin() ) {
            
            return $next($request);
        }

        Auth::logout();

        return redirect('/login')->withErrorMessage('Only administratrators can access the dashboard!');
        
    }
}
