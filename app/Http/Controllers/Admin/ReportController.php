<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use DB;
use App\Cateory;
use App\Translate;
use App\ProjectCat;
use App\Site;
use App\Supervisors;
use App\Beneficiaries;
use App\Projects;
use App\ProjectDetails;
use App\Contractor;
use App\ProjectLog;
use App\ProjectElectrical;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = Projects::all();
        $allCat = Cateory::all();
        $allBeneficiaries = Beneficiaries::all();
        foreach ($allBeneficiaries as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }
        $allSite = Site::all();
        foreach ($allSite as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }
        $allContracto = Contractor::all();
        foreach ($allContracto as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }
        return view('admin.report.index')->with(['allData' => $allData , 'allBeneficiaries' => $allBeneficiaries,
            'allSite' => $allSite , 'allContracto' => $allContracto , 'allCat' => $allCat]);
    }


    public function search(Request $request)
    {
        $projects  = Projects::where('id' , '!=' , 0);

        if ($request->has('projectNo')) {
            $projects->where('projectNo', $request->projectNo);
        }

        if ($request->has('beneficiaries') && $request->beneficiaries != 0) {
            $projects->where('beneficiaries', $request->beneficiaries);
        }

        if ($request->has('projectSite') && $request->projectSite != 0) {
            $projects->where('projectSite', $request->projectSite);
        }

        if ($request->has('contractorName') && $request->contractorName != 0) {
            $projects->where('contractorName', $request->contractorName);
        }

        if ($request->has('done') && $request->done != 0) {
            $projects->where('done', $request->done);
        }

        if ($request->has('projectCategory') && $request->projectCategory != 0) {
            $projects->where('projectCategory', $request->projectCategory);
        }
        $allData =  $projects->get();

        // dd($allData);
        $allCat = Cateory::all();
        $allBeneficiaries = Beneficiaries::all();
        foreach ($allBeneficiaries as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }
        $allSite = Site::all();
        foreach ($allSite as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }
        $allContracto = Contractor::all();
        foreach ($allContracto as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }
        return view('admin.report.index')->with(['allData' => $allData , 'allBeneficiaries' => $allBeneficiaries,
            'allSite' => $allSite , 'allContracto' => $allContracto , 'allCat' => $allCat]);

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
        //
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
        //
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
