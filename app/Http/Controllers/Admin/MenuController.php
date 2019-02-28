<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Menu;
use App\Role;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lang = Menu::all();
        // $lang = Menu::where('parentId' , '=', 0)->get();

        $categories = Menu::all(); // Menu::where('parentId', '=', 0)->get();
        $allCategories = Menu::pluck('name_ar', 'id')->all();

        return view('admin.menu.index')->with(['lang' => $lang, 'categories' => $categories,
            'allCategories' => $allCategories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $all = Menu::all();
        $allRole = Role::all();
        return view('admin.menu.create')->with(['all' => $all , 'allRole' => $allRole ]);

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
            'name_ar' => 'required',
        ]);

        $lagn = new Menu();
        $lagn->name_ar = $request->input('name_ar');
        $lagn->name_en = $request->input('name_en');
        $lagn->link = $request->input('link');
        $lagn->shortLink = $request->input('shortLink');
        $lagn->icon = $request->input('icon');
        $lagn->parentId = $request->input('parentId');
        $lagn->roles = implode(',' , $request->input('roles'));
        $lagn->save();
        return redirect()->action('Admin\MenuController@index');

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

        $lang = Menu::find($id);
        $all = Menu::all();
        $allRole = Role::all();
        return view('admin.menu.edit')->with(['lang' => $lang, 'all' => $all , 'allRole' => $allRole ]);

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
            'name_ar' => 'required',
        ]);
        if ($request->hasFile('flag')) {
            //
            $flag = time() . '.' . $request->file('flag')->getClientOriginalExtension();
            $request->file('flag')->move(public_path('images'), $flag);
        } else {
            $flag = $request->input('oldImage');
        }


        $lagn = Menu::find($id);
        $lagn->name_ar = $request->input('name_ar');
        $lagn->name_en = $request->input('name_en');
        $lagn->link = $request->input('link');
        $lagn->shortLink = $request->input('shortLink');
        $lagn->icon = $request->input('icon');
        $lagn->parentId = $request->input('parentId');
        $lagn->roles = implode(',' ,  (array)$request->input('roles'));
        $lagn->save();
        //
        return redirect()->action('Admin\MenuController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delmenu($id)
    {
        DB::table('menus')->where('id', '=', $id)->delete();
        return redirect()->action('Admin\MenuController@index');
    }

}
