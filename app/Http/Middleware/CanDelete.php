<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CanDelete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $value = $request->user()->role;
        if($value == 'admin' || $value == 'manager') {
            return $next($request);
        }
        if($request->is('api/*')) {
            return Response::json(["error" => "you aren't auhtorized to delete data"], 401);
        }
        return redirect(url("/books"));
    }
}
