<?php

namespace App\Http\Middleware\Subscription;

use Closure;

class RedirectIfNotactive
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
      if(!auth()->check() || auth()->user()->doesNotHaveSubscription()) {
        return redirect()->route('account.index');
      }
        return $next($request);
    }
}
