<?php namespace Bantenprov\LpePprovinsi\Http\Middleware;

use Closure;

/**
 * The LpePprovinsiMiddleware class.
 *
 * @package Bantenprov\LpePprovinsi
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LpePprovinsiMiddleware
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
        return $next($request);
    }
}
