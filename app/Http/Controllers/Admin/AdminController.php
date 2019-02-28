<?php


namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;
use DB;
use Auth;
use App\User;
use App\Usergroups;

class AdminController extends Controller
{

    public function __construct()
    {
        //$this->middleware(['role:user']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = User::all();
        return view('admin.admin.index')->with('allData', $allData);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $allGroup = Role::all();
        return view('admin.admin.create')->with(['allGroup' => $allGroup]);

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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $insert = new User();
        $insert->name = $request->input('name');
        $insert->email = $request->input('email');
        $insert->password = Hash::make($request->password);
        $insert->save();
        //
        $insert->attachRole($request->groupId);
        return redirect()->action('Admin\AdminController@index');

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

        $allGroup = Role::all();
        $editData = User::find($id);

        return view('admin.admin.edit')->with(['editData' => $editData, 'allGroup' => $allGroup]);

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
            'name' => 'required',

        ]);
        //
        if (empty($request->input('password'))) {
            $pass = $request->input('oldPassword');
        } else {
            $pass = $request->input('password');
        }

        $update = User::find($id);
        $update->name = $request->input('name');
        $update->email = $request->input('email');
        $update->password = Hash::make($pass);
        $update->save();
        $update->attachRole($request->groupId);

        return redirect()->action('Admin\AdminController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delAdmin($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect()->action('Admin\AdminController@index');
    }
}
