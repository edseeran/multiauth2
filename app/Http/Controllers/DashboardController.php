<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('admin')){
            return view('admindash');
        }elseif(Auth::user()->hasRole('professor')){
            return view('profdash');
        }elseif(Auth::user()->hasRole('student')){
            return view('studentdash');
        }
    }
    public function profdata()
    {
        return view('profdata');
    }

    public function studentdata()
    {
        return view('studentdata');
    }

    public function studentmydata()
    {
        return view('studentmydata');
    }

    public function studentedit()
    {
        return view('studentedit');
    }
    public function studentcreate()
    {
        return view('studentcreate');
    }
    public function studentshow()
    {
        return view('studentshow');
    }
}
