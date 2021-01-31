<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // kullanıcı user ise dashboard gözüksün
        //kernel.php yazdık
        if (auth()->user()->type !== 'admin') {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
