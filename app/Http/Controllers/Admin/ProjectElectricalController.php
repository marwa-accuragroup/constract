<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use App\Projects;
use App\ProjectElectrical;

class ProjectElectricalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = ProjectElectrical::all();
        return view('admin.projectElectric.index')->with(['allData' => $allData ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allProject = Projects::all();
        return view('admin.projectElectric.create')->with(['allProject' => $allProject ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectElectrical  $projectElectrical
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectElectrical $projectElectrical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectElectrical  $projectElectrical
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectElectrical $projectElectrical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectElectrical  $projectElectrical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectElectrical $projectElectrical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectElectrical  $projectElectrical
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectElectrical $projectElectrical)
    {
        //
    }
}
