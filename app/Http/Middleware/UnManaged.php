<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class UnManaged
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
        $id = $request->id;
        $role = User::findOrFail($id)->role;
        if($role != "manager") {
            return $next($request);
        }
        if($request->is('api/*')) {
            return Response::json(["error" => "you can't manage this user"], 401);
        }

        return redirect(url("/users"));
    }
}
