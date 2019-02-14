<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Menu;
use App\UserMenu;
use App\UserController;

class PermissionMiddleware
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
        //get user menu
        $userData = User::find(auth()->user()->id);
        //menu
        $link = $request->path();
        //
        $userMenu = UserMenu::where('groupId', $userData->groupId)->get();
        $mData = Menu::where('link', $link)->first();

        if( $userMenu->contains('menuId', $mData->id ) ){
            return $next($request);
        }
        else{
            return redirect('admin/error');
        }
        return $next($request);


    }
}
