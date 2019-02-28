<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Menu;
use App\UserMenu;
use App\UserController;
use Auth;

class PermissionMenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $userRoles = Auth::user()->roles;
        $link = $request->path();
        foreach ($userRoles as $role) {

            $mData = Menu::where(['roles' => $role->name])/*->where('link', 'like', $link . '%')*/->first();
            //dd($mData);
            if ($mData) {
                return $next($request);
            } else {
                return redirect('admin/perm');
            }
        }

        return $next($request);


    }
}
