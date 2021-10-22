<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Professor;
use Illuminate\Support\Facades\DB;

class ProfessorController extends Controller
{
    public function index()
    {

    }
    public function profdata()
    {
        $profs = DB::table('profs')->get();
        return view('profdata',compact('profs'))
        ->with('id',(request()->input('page',1)-1)*5);
    }

    public function storeProf(Request $request)
    {
       DB::table('profs')->insert([
            
            'first_name' => $request -> first_name,
            'last_name' => $request -> last_name
       
        ]);


        return redirect()->route('professor.profdata')

        ->with('success','Professor created successfully.');
    }


    public function profedit($id)
    {
        $profs= DB::table('profs')->where('id',$id)->first();
        return view('profedit',compact('profs'));
    }
    
    public function profcreate()
    {
        return view('profcreate');
    }


    public function updateProf(Request $request)
    {
        DB::table('profs')->where('id',$request->id)->update([
            'first_name' => $request -> first_name,
            'last_name' => $request -> last_name
        ]);
        return redirect()->route('professor.profdata')

        ->with('success','Professor updated successfully.');
    }

    public function destroyProf($id)
    {
        DB::table('profs')->where('id',$id)->delete();

        return redirect()->route('professor.profdata')

        ->with('success','Professor Deleted Successfully.');
    }

    public function searchProf(Request $request)
   {
       $search = $request->get('search');
       $profs = DB::table('profs')->where('first_name', 'LIKE', '%'.$search.'%')->orWhere('last_name', 'LIKE', '%'.$search.'%')->paginate(5);
       return view('profdata', ['profs' => $profs])->with('id');
    }
    
}
