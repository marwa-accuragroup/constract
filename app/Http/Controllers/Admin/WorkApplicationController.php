<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkApplication;

class WorkApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = WorkApplication::all();
        return view('admin.workApplication.index')->with(['allData' => $allData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workApplication.create');
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
            'fileNo' => 'required',
            'applicationNo' => 'required',
            'address' => 'required',
        ]);

        //Insert
        $item = new WorkApplication();
        $item->fileNo = $request->input('fileNo');
        $item->applicationNo = $request->input('applicationNo');
        $item->address = $request->input('address');
        $item->closeDate = date("Y-m-d", strtotime($request->input('closeDate')));
        $item->notes = $request->input('notes');

        if ($request->hasFile('projectNo')) {
            $files = $request->file('projectNo');
            $filename = uniqid() . 'project_' . $files->getClientOriginalName();
            $files->move(public_path('/images/'), $filename);
            $item->projectNo = $filename;
        } else {
            $item->projectNo = '';
        }


        if ($request->hasFile('areaNo')) {
            $files = $request->file('areaNo');
            $filename = uniqid() . 'areaNo_' . $files->getClientOriginalName();
            $files->move(public_path('/images/'), $filename);
            $item->areaNo = $filename;
        } else {
            $item->areaNo = '';
        }


        $item->save();
        //
        return redirect()->action('Admin\WorkApplicationController@index');
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
        $editData = WorkApplication::find($id);
        return view('admin.workApplication.edit')->with(['editData' => $editData]);
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
            'fileNo' => 'required',
            'applicationNo' => 'required',
            'address' => 'required',
        ]);

        $oldData = WorkApplication::find($id);

        //Insert
        $item =  WorkApplication::find($id);
        $item->fileNo = $request->input('fileNo');
        $item->applicationNo = $request->input('applicationNo');
        $item->address = $request->input('address');
        $item->closeDate = date("Y-m-d", strtotime($request->input('closeDate')));
        $item->notes = $request->input('notes');

        if ($request->hasFile('projectNo')) {
            $files = $request->file('projectNo');
            $filename = uniqid() . 'project_' . $files->getClientOriginalName();
            $files->move(public_path('/images/'), $filename);
            $item->projectNo = $filename;
        } else {
            $item->projectNo = $oldData->projectNo;
        }


        if ($request->hasFile('areaNo')) {
            $files = $request->file('areaNo');
            $filename = uniqid() . 'areaNo_' . $files->getClientOriginalName();
            $files->move(public_path('/images/'), $filename);
            $item->areaNo = $filename;
        } else {
            $item->areaNo = $oldData->areaNo;
        }
        $item->save();
        //
        return redirect()->action('Admin\WorkApplicationController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delworkApp($id)
    {
        WorkApplication::where('id', $id)->delete();
        return redirect()->action('Admin\WorkApplicationController@index');
    }
}
