<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

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
        $students = DB::table('students')->get();
        return view('studentdata',compact('students'))
        ->with('id',(request()->input('page',1)-1)*5);
    }

    public function storeStudent(Request $request)
    {
       DB::table('students')->insert([
            
            'first_name' => $request -> first_name,
            'last_name' => $request -> last_name
       
        ]);


        return redirect()->route('dashboard.studentdata')

        ->with('success','Students created successfully.');
    }

    public function studentmydata()
    {
        return view('studentmydata');
    }

    public function studentedit($id)
    {
        $students = DB::table('students')->where('id',$id)->first();
        return view('studentedit',compact('students'));
    }
    
    public function studentcreate()
    {
        return view('studentcreate');
    }

    public function studentshow()
    {
        return view('studentshow');
    }

    public function updateStudent(Request $request)
    {
        DB::table('students')->where('id',$request->id)->update([
            'first_name' => $request -> first_name,
            'last_name' => $request -> last_name
        ]);
        return redirect()->route('dashboard.studentdata')

        ->with('success','Student updated successfully.');
    }

    public function destroyStudent($id)
    {
        DB::table('students')->where('id',$id)->delete();

        return redirect()->route('dashboard.studentdata')

        ->with('success','Student Deleted Successfully.');
    }
    
}
