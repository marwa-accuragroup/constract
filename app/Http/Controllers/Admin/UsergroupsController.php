<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Usergroups;
use App\UserWeb;
use App\Menu;
use App\UserMenu;
use App\UserController;
use App\Cateory;
use App\UserMenuCat;

class UsergroupsController extends Controller
{
    public function index()
    {

        $allData = Usergroups::all();
        return view('admin.group.index')->with('lang', $allData);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $allMenu = Menu::where('parentId', '!=', 0)->get();
        $projectCat = Cateory::all();
        return view('admin.group.create')->with(['allMenu' => $allMenu, 'projectCat' => $projectCat,]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'name' => 'required|unique:usergroups',
        ]);
        $insert = new Usergroups();
        $insert->name = $request->input('name');
        //menu
        $menu = $request->input('menu');
        $permission = json_encode($menu);
        $insert->permission = $permission;
        $insert->save();
        if (!empty($menu) && isset($menu)) {
            foreach ($menu as $m) {
                $insert_m = new UserMenu();
                $insert_m->groupId = $insert->id;
                $insert_m->menuId = $m;
                $insert_m->value = 1;
                $insert_m->save();

            }
        }

        $cat = $request->input('cat');
        if (!empty($cat) && isset($cat)) {
            foreach ($cat as $m) {
                $insert_m = new UserMenuCat();
                $insert_m->groupId = $insert->id;
                $insert_m->catId = $m;
                $insert_m->value = 1;
                $insert_m->save();

            }
        }

        return redirect()->action('Admin\UsergroupsController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = Usergroups::find($id);
        //
        $allMenu = Menu::where('parentId', '!=', 0)->get();
        $groupMenu = UserMenu::where('groupId', '=', $id)->get();
        //
        $projectCat = Cateory::all();
        $catMenu = UserMenuCat::where('groupId', '=', $id)->get();
        return view('admin.group.edit')->with(['editData' => $editData, 'allMenu' => $allMenu,
            'groupMenu' => $groupMenu , 'projectCat' => $projectCat ,  'catMenu' => $catMenu ,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);


        $update = Usergroups::find($id);
        $update->name = $request->input('name');
        //menu
        $menu = $request->input('menu');
        // $permission = json_encode($menu);
        $update->permission = '';
        $update->save();
        //

        if (!empty($menu) && isset($menu)) {
            UserMenu::where('groupId', $id)->delete();
            foreach ($menu as $m) {
                $insert_m = new UserMenu();
                $insert_m->groupId = $id;
                $insert_m->menuId = $m;
                $insert_m->value = 1;
                $insert_m->save();
            }
        }

        $cat = $request->input('cat');
        if (!empty($cat) && isset($cat)) {
            UserMenuCat::where('groupId', $id)->delete();
            foreach ($cat as $m) {
                $insert_m = new UserMenuCat();
                $insert_m->groupId = $id;
                $insert_m->catId = $m;
                $insert_m->value = 1;
                $insert_m->save();

            }
        }

        return redirect()->action('Admin\UsergroupsController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delgroup($id)
    {
        $checkData = DB::table('users')->where('groupId', '=', $id)->get();
        if (count($checkData) > 0) {
            // return redirect()->action('Admin\UsergroupsController@index');
        } else {
            DB::table('usergroups')->where('id', '=', $id)->delete();
            UserMenu::where('groupId', $id)->delete();
            UserController::where('groupId', $id)->delete();
            return redirect()->action('Admin\UsergroupsController@index');
        }


    }
}
