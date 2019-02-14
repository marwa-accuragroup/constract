<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use DB;
use App\Language;
use App\Cateory;


class CateoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()) {
            //
            $category = Cateory::all();
            return view('admin.category.index')->with('category', $category);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()) {
            $allLang = Language::all();
            $category = Cateory::all();
            return view('admin.category.create')->with(['allLang' => $allLang, 'category' => $category]);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'icon' => 'required',
        ]);

        //Insert
        $main = new Cateory();
        $main->icon = $request->input('icon');
        $main->name = $request->input('name');
        $main->name_en = $request->input('name_en');
        $main->save();
        //
        return redirect()->action('Admin\CateoryController@index');

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

        $main = Cateory::find($id);
        return view('admin.category.edit')->with(['main' => $main]);

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


        //Insert
        $main = Cateory::find($id);
        $main->imageName = '';
        $main->icon = $request->input('icon');
        $main->name = $request->input('name');
        $main->name_en = $request->input('name_en');
        $main->save();
        //
        return redirect()->action('Admin\CateoryController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteCat($id)
    {
        DB::table('cateories')->where('id', '=', $id)->delete();
        return redirect()->action('Admin\CateoryController@index');
    }
}
