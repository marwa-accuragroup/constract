<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    public function changeLang($lang)
    {
        Session(['locale' => $lang]);
        return redirect()->back();
    }

    public function error()
    {
        return view('error.custom');
    }

    public function perm()
    {
        return view('error.permission');
    }

}
