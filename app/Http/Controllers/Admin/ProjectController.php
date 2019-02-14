<?php

namespace App\Http\Controllers\Admin;

use App\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use DB;
use App\Language;
use App\Cateory;
use App\Translate;
use App\ProjectCat;
use App\Site;
use App\Supervisors;
use App\Beneficiaries;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function projectInCat($id)
    {
        $allData = Projects::where('projectCategory' ,$id )->get();
        return view('admin.project.index')->with(['allData' => $allData]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'projectNo' => 'required',
            'projectName' => 'required',
            'projectCategory' => 'required',
        ]);

        //Insert
        $item = new Projects();
        $item->projectNo = $request->input('projectNo');
        $item->projectName = $request->input('projectName');
        $item->projectCategory = $request->input('projectCategory');
        $item->contractorName = $request->input('contractorName');
        $item->projectSite = $request->input('projectSite');
        $item->contractValue = $request->input('contractValue');
        $item->valueAdded = $request->input('valueAdded');
        $item->estimateValue = $request->input('estimateValue');
        $item->finalValue = $request->input('finalValue');
        $item->startDate = date("Y-m-d", strtotime($request->input('startDate')));
        $item->endDate = date("Y-m-d", strtotime($request->input('endDate')));
        $item->endDateEdit = date("Y-m-d", strtotime($request->input('endDateEdit')));
        $item->subtractionDate = date("Y-m-d", strtotime($request->input('subtractionDate')));
        $item->contractDate = date("Y-m-d", strtotime($request->input('contractDate')));
        $item->contractualValue = $request->input('contractualValue');

        if (!empty($request->input('completionRate'))) {
            $item->completionRate = implode(",", $request->input('completionRate'));
        } else {
            $item->completionRate = '';
        }

        if (!empty($request->input('currentSituation'))) {
            $item->currentSituation = implode(",", $request->input('currentSituation'));
        } else {
            $item->currentSituation = '';
        }

        if (!empty($request->input('notes'))) {
            $item->notes = implode(",", $request->input('notes'));
        } else {
            $item->notes = '';
        }

        $item->supervisors = $request->input('supervisors');
        $item->beneficiaries = $request->input('beneficiaries');
        $item->buildingArea = $request->input('buildingArea');
        $item->landArea = $request->input('landArea');
        $item->projectEngineer = $request->input('projectEngineer');
        $item->approveSchemas = $request->input('approveSchemas');
        $item->executionByDays = $request->input('executionByDays');
        $item->done = $request->input('done');


        $item->save();
        //
       // return redirect()->action('Admin\ProjectController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $catKeys = ProjectCat::where('catId', $id)->get();
        foreach ($catKeys as $key) {
            $translate = Translate::where('wordKey', $key->fieldName)->first();
            $key->name = $translate['name_' . Lang::getLocale()];
        }

        $projectCategory = Cateory::all();
        $Site = Site::all();
        foreach ($Site as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }
        $Supervisors = Supervisors::all();
        foreach ($Supervisors as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }


        $Beneficiaries = Beneficiaries::all();
        foreach ($Beneficiaries as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }


        return view('admin.project.create')->with(['catKeys' => $catKeys, 'projectCategory' => $projectCategory,
            'Site' => $Site, 'Beneficiaries' => $Beneficiaries, 'Supervisors' => $Supervisors,]);
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
        //
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
