<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use App\Language;
use App\Contractor;


class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = Contractor::all();
        foreach ($allData as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }
        return view('admin.contractor.index')->with(['allData' => $allData ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allLang = Language::all();
        return view('admin.contractor.create')->with(['allLang' => $allLang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ar' => 'required',
        ]);
        $allLang = Language::all();
        foreach ($allLang as $data) {

            $names[$data->symbol] = $request->input('name_' . $data->symbol);
            $tittles[$data->symbol] = $request->input('notes_' . $data->symbol);
        }
        $nameArr = json_encode($names);
        $tittleArr = json_encode($tittles);
        //Insert
        $item = new Contractor();
        $item->name = $nameArr;
        $item->notes = $tittleArr;
        $item->save();
        //
        return redirect()->action('Admin\ContractorController@index');
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
        $editData = Contractor::find($id);
        $nameArr = json_decode($editData->name, true);
        $notesArr = json_decode($editData->notes, true);
        $allLang = Language::all();
        return view('admin.contractor.edit')->with(['editData' => $editData, 'nameArr' => $nameArr , 'notesArr' => $notesArr , 'allLang' => $allLang]);
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
        $this->validate($request, [
            'name_ar' => 'required',
        ]);
        $allLang = Language::all();
        foreach ($allLang as $data) {

            $names[$data->symbol] = $request->input('name_' . $data->symbol);
            $tittles[$data->symbol] = $request->input('notes_' . $data->symbol);
        }
        $nameArr = json_encode($names);
        $tittleArr = json_encode($tittles);
        //update
        $item =  Contractor::find($id);
        $item->name = $nameArr;
        $item->notes = $tittleArr;
        $item->save();
        //
        return redirect()->action('Admin\ContractorController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delContractor($id)
    {
        Contractor::where('id' , $id)->delete();
        return redirect()->action('Admin\ContractorController@index');
    }
}
