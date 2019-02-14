<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use DB;
use App\Language;
use App\Cateory;
use App\Translate;
use App\ProjectCat;

class ProjectCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCat = Cateory::all();

        return view('admin.projectCat.index')->with([ 'allCat' => $allCat ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $allCat = Cateory::all();

        $allKeys = Translate::all();
        return view('admin.projectCat.create')->with([ 'allCat' => $allCat , 'allKeys' => $allKeys ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $itr2 = $request->input('keys');
        for ($x = 0; $x < count($itr2); $x++) {

            $item = new ProjectCat();
            $item->catId = $request->input('catId');
            $item->fieldName = $request->input('keys')[$x];
            $item->type = $request->input('type')[$x];
            $item->save();
        }
        return redirect()->action('Admin\ProjectCatController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allCat = Cateory::all();


        $allKeys = Translate::all();
        $editData = ProjectCat::where('catId' , $id)->get();
        return view('admin.projectCat.edit')->with([ 'id' => $id , 'editData' => $editData , 'allCat' => $allCat , 'allKeys' => $allKeys ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //delete Old items
        ProjectCat::where('catId' , $id)->delete();
        //
        $itr2 = $request->input('keys');
        for ($x = 0; $x < count($itr2); $x++) {

            $item = new ProjectCat();
            $item->catId = $request->input('catId');
            $item->fieldName = $request->input('keys')[$x];
            $item->type = $request->input('type')[$x];
            $item->save();
        }
        return redirect()->action('Admin\ProjectCatController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
