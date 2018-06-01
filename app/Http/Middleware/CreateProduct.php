<?php

namespace App\Http\Middleware;

use Closure;

class CreateProduct
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
        if (!$request->user()->hasRole('product.create')) {
            return redirect('/');
        }

        return $next($request);
    }
}
