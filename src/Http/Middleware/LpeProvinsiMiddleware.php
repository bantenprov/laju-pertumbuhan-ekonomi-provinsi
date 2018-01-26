<?php namespace Bantenprov\LpeProvinsi\Http\Middleware;

use Closure;

/**
 * The LpeProvinsiMiddleware class.
 *
 * @package Bantenprov\LpeProvinsi
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LpeProvinsiMiddleware
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
