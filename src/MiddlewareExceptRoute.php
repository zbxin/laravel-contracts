<?php

namespace ZhiEq\Contracts;

use Closure;
use Illuminate\Http\Request;

abstract class MiddlewareExceptRoute
{
    protected $expectRoute = [

    ];

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     * @internal param Closure $next
     */

    public function checkExpectRoute($request)
    {
        return count(array_filter($this->expectRoute, function ($route) use ($request) {
                $route = substr($route, 1);
                return $request->route()->getName() === $route || $request->route()->uri() === $route;
            })) > 0;
    }

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if ($this->checkExpectRoute($request)) {
            return $next($request);
        }
        return $this->subHandle($request, $next);
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */

    abstract public function subHandle($request, Closure $next);
}
