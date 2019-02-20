<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;
use App\Translate;
use App\Projects;
use App\ProjectElectrical;
use App\Beneficiaries;

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
        return view('admin.projectElectric.index')->with(['allData' => $allData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allProject = Projects::all();
        $allWords = Translate::all();
        $allBeneficiaries = Beneficiaries::all();
        foreach ($allBeneficiaries as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }


        return view('admin.projectElectric.create')->with(['allProject' => $allProject, 'allWords' => $allWords,
            'allBeneficiaries' => $allBeneficiaries,]);
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
            'projectId' => 'required',
            'beneficiaries' => 'required',
        ]);
        //Insert
        $item = new ProjectElectrical();
        $item->projectId = $request->input('projectId');
        $item->beneficiaries = $request->input('beneficiaries');
        $item->buildingNumber = $request->input('buildingNumber');
        $item->electricityNumber = $request->input('electricityNumber');
        //current Situation
        $item->currentStatusOfConnectionCharges = $request->input('currentStatusOfConnectionCharges');
        $item->waterElectric = $request->input('waterElectric');
        $item->financial = $request->input('financial');
        $item->minister = $request->input('minister');
        $item->letter = $request->input('letter');
        $item->connectPower = $request->input('connectPower');
        if (!empty($request->input('notes')))
        {
            $item->notes = implode(',', $request->input('notes'));
        }
        else{
            $item->notes = '';
        }
        //upload files
        if ($request->hasFile('waterElectricImg')) {
            $file = $request->file('waterElectricImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->waterElectricImg = $filename;
        } else {
            $item->waterElectricImg = '';
        }
        /*=============*/
        if ($request->hasFile('ministerImg')) {
            $file = $request->file('ministerImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->ministerImg = $filename;
        } else {
            $item->ministerImg = '';
        }
        /*=============*/
        if ($request->hasFile('financialImg')) {
            $file = $request->file('financialImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->financialImg = $filename;
        } else {
            $item->financialImg = '';
        }
        /*=============*/
        if ($request->hasFile('letterImg')) {
            $file = $request->file('letterImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->letterImg = $filename;
        } else {
            $item->letterImg = '';
        }

        //currentStatusMaterials
        $item->currentStatusMaterials = $request->input('currentStatusMaterials');
        $item->waterElectricMaterials = $request->input('waterElectricMaterials');
        $item->financialMaterials = $request->input('financialMaterials');
        $item->ministerMaterials = $request->input('ministerMaterials');
        $item->letterMaterials = $request->input('letterMaterials');
        $item->materialsToContractor = $request->input('materialsToContractor');
        if (!empty($request->input('notesMaterials')))
        {
            $item->notesMaterials = implode(',', $request->input('notesMaterials'));
        }
        else{
            $item->notesMaterials = '';
        }
        //upload files
        if ($request->hasFile('waterElectricMaterialsImg')) {
            $file = $request->file('waterElectricMaterialsImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->waterElectricMaterialsImg = $filename;
        } else {
            $item->waterElectricMaterialsImg = '';
        }
        /*=============*/
        if ($request->hasFile('ministerMaterialsImg')) {
            $file = $request->file('ministerMaterialsImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->ministerMaterialsImg = $filename;
        } else {
            $item->ministerMaterialsImg = '';
        }
        /*=============*/
        if ($request->hasFile('financiaMaterialslImg')) {
            $file = $request->file('financiaMaterialslImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->financiaMaterialslImg = $filename;
        } else {
            $item->financiaMaterialslImg = '';
        }
        /*=============*/
        if ($request->hasFile('letterMaterialsImg')) {
            $file = $request->file('letterMaterialsImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->letterMaterialsImg = $filename;
        } else {
            $item->letterMaterialsImg = '';
        }



        //
        $item->save();
        //
        return redirect()->action('Admin\ProjectElectricalController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectElectrical $projectElectrical
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectElectrical $projectElectrical
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $allProject = Projects::all();
        $allWords = Translate::all();
        $allBeneficiaries = Beneficiaries::all();
        foreach ($allBeneficiaries as $data) {
            $nameArr = json_decode($data->name, true);
            $data->name = $nameArr['ar'];

        }
        $editData = ProjectElectrical::find($id);

        $notes = explode(',' , $editData->notes);
        $notesM = explode(',' , $editData->notesMaterials);


        return view('admin.projectElectric.edit')->with(['editData' => $editData, 'notes' => $notes ,
            'allProject' => $allProject, 'allWords' => $allWords,'notesM' => $notesM ,
            'allBeneficiaries' => $allBeneficiaries,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ProjectElectrical $projectElectrical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $oldData = ProjectElectrical::find($id);
        $this->validate($request, [
            'projectId' => 'required',
            'beneficiaries' => 'required',
        ]);
        //Insert
        $item =  ProjectElectrical::find($id);
        $item->projectId = $request->input('projectId');
        $item->beneficiaries = $request->input('beneficiaries');
        $item->buildingNumber = $request->input('buildingNumber');
        $item->electricityNumber = $request->input('electricityNumber');
        //current Situation
        $item->currentStatusOfConnectionCharges = $request->input('currentStatusOfConnectionCharges');
        $item->waterElectric = $request->input('waterElectric');
        $item->financial = $request->input('financial');
        $item->minister = $request->input('minister');
        $item->letter = $request->input('letter');
        $item->connectPower = $request->input('connectPower');
        if (!empty($request->input('notes')))
        {
            $item->notes = implode(',', $request->input('notes'));
        }
        else{
            $item->notes = $oldData->notes;
        }
        //upload files
        if ($request->hasFile('waterElectricImg')) {
            $file = $request->file('waterElectricImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->waterElectricImg = $filename;
        } else {
            $item->waterElectricImg =  $oldData->waterElectricImg;
        }
        /*=============*/
        if ($request->hasFile('ministerImg')) {
            $file = $request->file('ministerImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->ministerImg = $filename;
        } else {
            $item->ministerImg = $oldData->ministerImg;
        }
        /*=============*/
        if ($request->hasFile('financialImg')) {
            $file = $request->file('financialImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->financialImg = $filename;
        } else {
            $item->financialImg = $oldData->financialImg;
        }
        /*=============*/
        if ($request->hasFile('letterImg')) {
            $file = $request->file('letterImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->letterImg = $filename;
        } else {
            $item->letterImg = $oldData->letterImg;
        }

        //currentStatusMaterials
        $item->currentStatusMaterials = $request->input('currentStatusMaterials');
        $item->waterElectricMaterials = $request->input('waterElectricMaterials');
        $item->financialMaterials = $request->input('financialMaterials');
        $item->ministerMaterials = $request->input('ministerMaterials');
        $item->letterMaterials = $request->input('letterMaterials');
        $item->materialsToContractor = $request->input('materialsToContractor');
        if (!empty($request->input('notesMaterials')))
        {
            $item->notesMaterials = implode(',', $request->input('notesMaterials'));
        }
        else{
            $item->notesMaterials = $oldData->notesMaterials;
        }
        //upload files
        if ($request->hasFile('waterElectricMaterialsImg')) {
            $file = $request->file('waterElectricMaterialsImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->waterElectricMaterialsImg = $filename;
        } else {
            $item->waterElectricMaterialsImg = $oldData->waterElectricMaterialsImg;
        }
        /*=============*/
        if ($request->hasFile('ministerMaterialsImg')) {
            $file = $request->file('ministerMaterialsImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->ministerMaterialsImg = $filename;
        } else {
            $item->ministerMaterialsImg = $oldData->ministerMaterialsImg;
        }
        /*=============*/
        if ($request->hasFile('financiaMaterialslImg')) {
            $file = $request->file('financiaMaterialslImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->financiaMaterialslImg = $filename;
        } else {
            $item->financiaMaterialslImg = $oldData->financiaMaterialslImg;
        }
        /*=============*/
        if ($request->hasFile('letterMaterialsImg')) {
            $file = $request->file('letterMaterialsImg');
            $filename = uniqid() . 'electricty_' . $file->getClientOriginalName();
            $file->move(public_path('/images/'), $filename);
            $item->letterMaterialsImg = $filename;
        } else {
            $item->letterMaterialsImg = $oldData->letterMaterialsImg;
        }
        //
        $item->save();
        //
        return redirect()->action('Admin\ProjectElectricalController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectElectrical $projectElectrical
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
