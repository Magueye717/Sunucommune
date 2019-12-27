<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

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
