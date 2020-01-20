<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
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
        $data = array();
        return view('gestion.dashboard.index', compact('data'));
    }

    /**
     * Show the application admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $data = array();
        return view('admin.dashboard.index', compact('data'));
    }
}
