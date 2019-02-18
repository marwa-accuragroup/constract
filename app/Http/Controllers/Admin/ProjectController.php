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
        return view('admin.project.index')->with(['allData' => $allData , 'catId' => $id]);
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
            'projectNo' => 'required|unique:projects',
            'projectName' => 'required',

        ]);

        //Insert
        $item = new Projects();
        $item->projectNo = $request->input('projectNo');
        $item->projectName = $request->input('projectName');
        $item->projectCategory = $request->input('projectCategory');
        $item->contractorName = $request->input('contractorName');
        $item->projectSite = $request->input('projectSite');
        $item->contractValue = $request->input('contractValue');
        $item->estimateValue = $request->input('estimateValue');
        $item->finalValue = $request->input('finalValue');
        $item->startDate = date("Y-m-d", strtotime($request->input('startDate')));
        $item->endDate = date("Y-m-d", strtotime($request->input('endDate')));
        $item->endDateEdit = date("Y-m-d", strtotime($request->input('endDateEdit')));
        $item->subtractionDate = date("Y-m-d", strtotime($request->input('subtractionDate')));
        $item->contractDate = date("Y-m-d", strtotime($request->input('contractDate')));
        $item->contractualValue = $request->input('contractualValue');
        $item->supervisors = $request->input('supervisors');
        $item->beneficiaries = $request->input('beneficiaries');
        $item->buildingArea = $request->input('buildingArea');
        $item->landArea = $request->input('landArea');
        $item->projectEngineer = $request->input('projectEngineer');
        $item->approveSchemas = $request->input('approveSchemas');
        $item->executionByDays = $request->input('executionByDays');
        $item->done = $request->input('done');
        $item->save();

       //Add project details
       $projectId = $item->id;
        if ($request->has('completionRate'))
        {
            $completionRate = $request->input('completionRate');
            foreach ($completionRate as $sub)
            {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'completionRate';
                $subItem->value = $sub;
                $subItem->save();
            }
        }


        if ($request->has('currentSituation') )
        {
            $currentSituation = $request->input('currentSituation');
            foreach ($currentSituation as $sub)
            {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'currentSituation';
                $subItem->value = $sub;
                $subItem->save();
            }
        }


        if ($request->has('notes'))
        {
            $notes = $request->input('notes');
            foreach ($notes as $sub)
            {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'notes';
                $subItem->value = $sub;
                $subItem->save();
            }
        }



        if ($request->has('valueAdded') )
        {
            $valueAdded = $request->input('valueAdded');
            foreach ($valueAdded as $sub)
            {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'valueAdded';
                $subItem->value = $sub;
                $subItem->save();
            }
        }



        /*Tabs Data*********************************************/
        if ($request->hasFile('paper')) {
            $files = $request->file('paper');
            foreach ($files as $file) {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'paper';
                //
                $filename = uniqid() . 'paper_' . $file->getClientOriginalName();
                $file->move(public_path('/images/'),$filename);
                $subItem->value = $filename;
                $subItem->save();
            }
        }

        if ($request->hasFile('map')) {
            $files = $request->file('map');
            foreach ($files as $file) {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'map';
                //
                $filename = uniqid() . 'map_' . $file->getClientOriginalName();
                $file->move(public_path('/images/'),$filename);
                $subItem->value = $filename;
                $subItem->save();
            }
        }


        if ($request->hasFile('work')) {
            $files = $request->file('work');
            foreach ($files as $file) {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'work';
                //
                $filename = uniqid() . 'work_' . $file->getClientOriginalName();
                $file->move(public_path('/images/'),$filename);
                $subItem->value = $filename;
                $subItem->save();
            }
        }


        if ($request->hasFile('electric')) {
            $files = $request->file('electric');
            foreach ($files as $file) {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'electric';
                //
                $filename = uniqid() . 'electric_' . $file->getClientOriginalName();
                $file->move(public_path('/images/'),$filename);
                $subItem->value = $filename;
                $subItem->save();
            }
        }


        $catId = $request->input('projectCategory');
        return redirect()->action('Admin\ProjectController@projectInCat' , $catId);


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

        $Contractor = Contractor::all();
        foreach ($Contractor as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }


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


        return view('admin.project.create')->with(['catKeys' => $catKeys,'Contractor' => $Contractor ,  'projectCategory' => $projectCategory,
            'Site' => $Site, 'Beneficiaries' => $Beneficiaries, 'Supervisors' => $Supervisors, 'catId' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = Projects::find($id);

        $catKeys = ProjectCat::where('catId', $editData->projectCategory)->get();
        foreach ($catKeys as $key) {
            $translate = Translate::where('wordKey', $key->fieldName)->first();
            $key->name = $translate['name_' . Lang::getLocale()];
        }
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

        $paper = ProjectDetails::where(['projectId' => $id , 'type' => 'paper' ])->get();
        $map = ProjectDetails::where(['projectId' => $id , 'type' => 'map' ])->get();
        $work = ProjectDetails::where(['projectId' => $id , 'type' => 'work' ])->get();
        $electric = ProjectDetails::where(['projectId' => $id , 'type' => 'electric' ])->get();


        return view('admin.project.edit')->with(['editData' => $editData  , 'catKeys' => $catKeys,
            'Site' => $Site, 'Beneficiaries' => $Beneficiaries, 'Supervisors' => $Supervisors,
            'paper' => $paper, 'map' => $map, 'work' => $work,
            'electric' => $electric,]);
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
        $this->validate($request, [
            'projectNo' => 'required',
            'projectName' => 'required',
        ]);

        //Insert
        $item =  Projects::find($id);
        $item->projectNo = $request->input('projectNo');
        $item->projectName = $request->input('projectName');
        $item->projectCategory = $request->input('projectCategory');
        $item->contractorName = $request->input('contractorName');
        $item->projectSite = $request->input('projectSite');
        $item->contractValue = $request->input('contractValue');
        $item->estimateValue = $request->input('estimateValue');
        $item->finalValue = $request->input('finalValue');
        $item->startDate = date("Y-m-d", strtotime($request->input('startDate')));
        $item->endDate = date("Y-m-d", strtotime($request->input('endDate')));
        $item->endDateEdit = date("Y-m-d", strtotime($request->input('endDateEdit')));
        $item->subtractionDate = date("Y-m-d", strtotime($request->input('subtractionDate')));
        $item->contractDate = date("Y-m-d", strtotime($request->input('contractDate')));
        $item->contractualValue = $request->input('contractualValue');
        $item->supervisors = $request->input('supervisors');
        $item->beneficiaries = $request->input('beneficiaries');
        $item->buildingArea = $request->input('buildingArea');
        $item->landArea = $request->input('landArea');
        $item->projectEngineer = $request->input('projectEngineer');
        $item->approveSchemas = $request->input('approveSchemas');
        $item->executionByDays = $request->input('executionByDays');
        $item->done = $request->input('done');
        $item->save();

        //Add project details
        $projectId = $item->id;
        if ($request->has('completionRate'))
        {
            $completionRate = $request->input('completionRate');
            foreach ($completionRate as $sub)
            {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'completionRate';
                $subItem->value = $sub;
                $subItem->save();
            }
        }


        if ($request->has('currentSituation') )
        {
            $currentSituation = $request->input('currentSituation');
            foreach ($currentSituation as $sub)
            {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'currentSituation';
                $subItem->value = $sub;
                $subItem->save();
            }
        }


        if ($request->has('notes'))
        {
            $notes = $request->input('notes');
            foreach ($notes as $sub)
            {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'notes';
                $subItem->value = $sub;
                $subItem->save();
            }
        }



        if ($request->has('valueAdded') )
        {
            $valueAdded = $request->input('valueAdded');
            foreach ($valueAdded as $sub)
            {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'valueAdded';
                $subItem->value = $sub;
                $subItem->save();
            }
        }



        /*Tabs Data*********************************************/
      /*  if ($request->hasFile('paper')) {
            $files = $request->file('paper');
            foreach ($files as $file) {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'paper';
                //
                $filename = uniqid() . 'paper_' . $file->getClientOriginalName();
                $file->move(public_path('/images/'),$filename);
                $subItem->value = $filename;
                $subItem->save();
            }
        }

        if ($request->hasFile('map')) {
            $files = $request->file('map');
            foreach ($files as $file) {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'map';
                //
                $filename = uniqid() . 'map_' . $file->getClientOriginalName();
                $file->move(public_path('/images/'),$filename);
                $subItem->value = $filename;
                $subItem->save();
            }
        }


        if ($request->hasFile('work')) {
            $files = $request->file('work');
            foreach ($files as $file) {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'work';
                //
                $filename = uniqid() . 'work_' . $file->getClientOriginalName();
                $file->move(public_path('/images/'),$filename);
                $subItem->value = $filename;
                $subItem->save();
            }
        }


        if ($request->hasFile('electric')) {
            $files = $request->file('electric');
            foreach ($files as $file) {
                $subItem = new ProjectDetails();
                $subItem->projectId = $projectId;
                $subItem->userId = Auth::user()->id;
                $subItem->type = 'electric';
                //
                $filename = uniqid() . 'electric_' . $file->getClientOriginalName();
                $file->move(public_path('/images/'),$filename);
                $subItem->value = $filename;
                $subItem->save();
            }
        }


        $catId = $request->input('projectCategory');
        return redirect()->action('Admin\ProjectController@projectInCat' , $catId);*/


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delProject($id)
    {
        Projects::where('id' , $id)->delete();
        ProjectDetails::where('projectId' , $id)->delete();
        return redirect()->back();
    }


    public function finishedProjects()
    {
        $allData = Projects::where([ 'done' => 1 ] )->get();
        foreach ($allData as $data)
        {
            $contractor = Contractor::find($data->contractorName);
            $nameArr = json_decode($contractor->name, true);
            $data->contractorName = $nameArr['ar'];


            $Beneficiaries = Beneficiaries::find($data->beneficiaries);
            $nameArr1 = json_decode($Beneficiaries->name, true);
            $data->Beneficiaries = $nameArr1['ar'];
        }
        return view('admin.project.finishProject')->with(['allData' => $allData]);
    }




}
