<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkCat;
use App\WorkRequest;
use App\Contractor;

class WorkRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = WorkRequest::all();
        return view('admin.workRequest.index')->with([ 'allData' => $allData ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCat = WorkCat::all();
        $allContractor = Contractor::all();
        foreach ($allContractor as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }
        return view('admin.workRequest.create')->with(['allCat' => $allCat , 'allContractor' => $allContractor]);

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
            'workCatId' => 'required',
            'requestNo' => 'required',
            'bidderNo' => 'required',
            'address' => 'required',
            'contractor' => 'required',
            'price' => 'required',
            'balanceItem' => 'required',
            'days' => 'required',
        ]);

        //Insert
        $item = new WorkRequest();
        $item->workCatId = $request->input('workCatId');
        $item->requestNo = $request->input('requestNo');
        $item->bidderNo = $request->input('bidderNo');
        $item->address = $request->input('address');
        $item->contractor = $request->input('contractor');
        $item->price = $request->input('price');
        $item->balanceItem = $request->input('balanceItem');
        $item->days = $request->input('days');
        $item->notes = $request->input('notes');
        $item->save();
        //
        return redirect()->action('Admin\WorkRequestController@index');
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
        $editData = WorkRequest::find($id);
        $allCat = WorkCat::all();
        $allContractor = Contractor::all();
        foreach ($allContractor as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }
        return view('admin.workRequest.edit')->with(['editData' => $editData , 'allCat' => $allCat , 'allContractor' => $allContractor]);
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
            'workCatId' => 'required',
            'requestNo' => 'required',
            'bidderNo' => 'required',
            'address' => 'required',
            'contractor' => 'required',
            'price' => 'required',
            'balanceItem' => 'required',
            'days' => 'required',
        ]);

        //Insert
        $item =  WorkRequest::find($id);
        $item->workCatId = $request->input('workCatId');
        $item->requestNo = $request->input('requestNo');
        $item->bidderNo = $request->input('bidderNo');
        $item->address = $request->input('address');
        $item->contractor = $request->input('contractor');
        $item->price = $request->input('price');
        $item->balanceItem = $request->input('balanceItem');
        $item->days = $request->input('days');
        $item->notes = $request->input('notes');
        $item->save();
        //
        return redirect()->action('Admin\WorkRequestController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delworkRequest($id)
    {
        WorkRequest::where('id' , $id)->delete();
        return redirect()->action('Admin\WorkRequestController@index');
    }
}
