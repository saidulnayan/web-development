<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use File;
use Response;
use Illuminate\Support\Facades\Storage;

use App\Models\Admissions;
use App\Models\Parents;
use App\Models\Teachers;
use App\Models\User;
use App\Models\Courses;
use App\Models\Routines;
use App\Models\Materials;
use App\Models\Notices;
use App\Models\Attendances;

class StudentController extends Controller
{
    Public function index()
    {
        return view('frontend.pages.students.index');
    
    }

    Public function usertyp()
    {
       
        if (!Auth::check())
        {
            return view('auth.login');
        }
        else
        {

            $usertype = Auth::user()->usertype;
            

            if($usertype =='1')
            {
                return redirect()-> route('admintype');
            }
            elseif($usertype =='0')
            {
                return redirect()-> route('studenttype');
            }
            elseif($usertype =='2')
            {
                return redirect()-> route('teachertype');
            }
            elseif($usertype =='3')
            {
                return redirect()-> route('parenttype');
            }
            else
            {
                return view('auth.login');
                //abort(403);

            }
            
        }

    }

    public function home()
    {
        if (!Auth::check())
        {
            return view('auth.login');
        }
        else
        {
            $usertype = Auth::user()->usertype;

            if($usertype =='0')
            {
                return view('frontend.pages.students.home');
            }
            else
            {
                return view('auth.login');
                //abort(403);
            } 
        }
    }

    Public function stdmaterials()
    {
        
        $dept = 'CSE';
        $semester = '1st';
        $category = 'Regular';

        $sdata = Courses::where('dept',$dept)
            ->where('semester',$semester)
            ->where('category',$category)->get();
        
        return view('frontend.pages.students.materials',compact('sdata'));
    
    }

    Public function searchmaterials(Request $request)
    {
        
        $semester = $request->semester;
        $subcode = $request->subcode;
        $category = 'Regular';
        $dept = 'CSE';
        $sbtn = $request->subtn;

        // $data = Materials::where('dept',$dept)
        //     ->where('semester',$semester)
        //     ->where('category',$category)
        //     ->where('subcode',$subcode)->get();
        
        // return view('frontend.pages.students.materials',compact('data'));

        if(!empty($semester) && !empty($subcode) ){
            
            $data = Materials::where('dept',$dept)
            ->where('semester',$semester)
            ->where('category',$category)
            ->where('subcode',$subcode)->get();
            
        
            return view('frontend.pages.students.matdownload',compact('data'));

        }
        if(!empty($semester) && empty($subcode)){
        $sdata = Courses::where('dept',$dept)
            ->where('semester',$semester)
            ->where('category',$category)->get();
        
        return view('frontend.pages.students.materials',compact('sdata'));
        }
    
    }

    public function downloadmaterials($id)
    {
        $data = Materials::where('id',$id)->first();
        $path = $data->filepath;
        $name = $data->filename;
        $headers = ['Content-Type: image/jpeg'];

        return Storage::download($path, $name, $headers);
    }

    Public function notice()
    {
        $data = Notices::all();
        
        return view('frontend.pages.students.notice',compact('data'));
    
    }

    Public function attendance()
    {
        $stid = '139032';
        $sttds = Attendances::where('studentid',$stid)->get();
        
        return view('frontend.pages.students.attendance',compact('sttds'));
    
    }

    
}
