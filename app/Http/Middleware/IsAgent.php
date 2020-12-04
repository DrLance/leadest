<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAgent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->user()->is_agent) {
            return redirect()->route('leads.index');
        }
        return $next($request);
    }
}
