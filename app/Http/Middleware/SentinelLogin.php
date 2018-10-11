<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class SentinelLogin
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
        if (Sentinel::check())
        {
            $user = Sentinel::getUser();
            if ($user->hasAccess('administrator')) {
                view()->share('authUser', Sentinel::getUser());
                return $next($request);
            } else {
                Sentinel::logout();
                return redirect()->back()->withErrors('Đăng nhập thất bại!');
            }
        }
        else
        {
            return redirect(route('admin.login'))->withErrors('Bạn cần đăng nhập!');
        }
    }
}
