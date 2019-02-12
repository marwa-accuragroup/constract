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
            foreach ($category as $data) {
                $nameArr = json_decode($data->name, true);
                $data->name = $nameArr['ar'];

            }
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
            foreach ($category as $data) {
                $nameArr = json_decode($data->name, true);
                $data->name = $nameArr[Lang::getLocale()];

            }
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
            'name_ar' => 'required',
            'icon' => 'required',
        ]);
        $allLang = Language::all();
        foreach ($allLang as $data) {

            $names[$data->symbol] = $request->input('name_' . $data->symbol);
            $tittles[$data->symbol] = $request->input('tittle_' . $data->symbol);
            $contents[$data->symbol] = $request->input('content_' . $data->symbol);
        }
        // dd($names);
        $nameArr = json_encode($names);
        // dd($nameArr);
        $tittleArr = json_encode($tittles);
        $contentsArr = json_encode($contents);
        //Insert
        $main = new Cateory();
        $main->imageName = '';
        $main->icon = $request->input('icon');
        $main->name = $nameArr;
        $main->tittle = $tittleArr;
        $main->content = $contentsArr;
        $main->inHome = $request->inHome;
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
        $nameArr = json_decode($main->name, true);
        return view('admin.category.edit')->with(['main' => $main, 'nameArr' => $nameArr]);

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


        $allLang = Language::all();
        foreach ($allLang as $data) {
            $names[$data->symbol] = $request->input('name_' . $data->symbol);
            $tittles[$data->symbol] = $request->input('tittle_' . $data->symbol);
            $contents[$data->symbol] = $request->input('content_' . $data->symbol);
        }
        $nameArr = json_encode($names);
        $tittleArr = json_encode($tittles);
        $contentsArr = json_encode($contents);
        //Insert
        $main = Cateory::find($id);
        $main->imageName = '';
        $main->icon = $request->input('icon');
        $main->name = $nameArr;
        $main->tittle = $tittleArr;
        $main->content = $contentsArr;
        $main->inHome = '';
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
