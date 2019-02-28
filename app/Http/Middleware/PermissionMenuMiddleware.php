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

        //$this->middleware(['role:user']);
       // dd(Auth::user()->roles[0]->name);
      //  die();
        //get user menu
      // $userData = User::find(auth()->user()->id);
        //menu
       /* $link = $request->path();
        //
        $userMenu = UserMenu::where('roleId', Auth::user()->roles[0]->name)->get();
        $mData = Menu::where('link', $link)->first();

       // if( $userMenu->contains('menuId', $mData->id ) ){

        if( $userMenu->contains('menuId', $mData->id ) ){
            return $next($request);
        }
        else{
            return redirect('admin/error');
        }
        return $next($request);*/

       $userRoles = Auth::user()->roles;
        $link = $request->path();
      //  dd($userRoles);
       if (count($userRoles) > 0)
       {
           foreach ($userRoles as $role)
           {

               $mData = Menu::where([ 'shortLink' => $role->name  , 'link' => $link])->first();
               //dd($mData);
               if( $mData ){
                   return $next($request);
               }
               else{
                   return redirect('admin/error');
               }
           }
       }
       else{
           return redirect('admin/error');
       }

        return $next($request);



    }
}
