<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Translate;


class TranslateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allData = Translate::all();
        return view('admin.translate.index')->with(['allData' => $allData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.translate.create');
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
            'wordKey' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);

        $insert =  new Translate();
        $insert->wordKey = $request->input('wordKey' );
        $insert->name_ar = $request->input('name_ar' );
        $insert->name_en = $request->input('name_en' );
        $insert->save();
        return redirect()->action('Admin\TranslateController@index');
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
        //
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
        //update Social
        $itr2 = $request->input('id');
        for ($x = 0; $x < count($itr2); $x++) {

            $update = Translate::find($request->input('id')[$x]);
            $update->name_ar = $request->input('name_ar')[$x];
            $update->name_en = $request->input('name_en')[$x];
            $update->save();


        }

        return redirect()->action('Admin\TranslateController@index');
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
}
