<?php

namespace App\Http\Controllers;

use App\Models\Admissions;
use App\Models\Parents;
use App\Models\Teachers;
use App\Models\User;
use App\Models\Courses;
use App\Models\Routines;
use App\Models\Departments;
use App\Models\Students;
use App\Models\Notices;
use App\Models\Results;


use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use File;


class AdminController extends Controller
{
    Public function index()
    {
        return view('admin.pages.index');
    
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

            if($usertype =='1')
            {
                return view('admin.pages.admin');
            }
            else
            {
                return view('auth.login');
                //abort(403);
            } 
        }
    }


    // admin actions
    Public function admission()
    {
        $data = Departments::all();
        return view('admin.pages.admission',compact('data'));
    
    }

    public function admissionform(Request $request)
    {  

        $request->validate([
            'photo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            
    
            if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
    
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(200, 200);
            $image_resize->save('images/students/'.$name);
    
            }
    
        $data = new Admissions;

        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->gender = $request->gender;
        $data->studentid = $request->studentid;
        $data->semester = "1st";
        $data->regno = $request->regno;
        $data->category = $request->category;
        $data->studentemail = $request->studentemail;
        $data->studentphone = $request->studentphone;
        $data->nid = $request->nid;
        $data->birth = $request->birth;
        $data->address = $request->address;
        $data->country = $request->country;
        $data->dept = $request->dept;
        $data->session = $request->session;
        $data->year = $request->year;
        $data->section = $request->section;
        $data->parrentid = $request->parrentid;
        $data->Photo = $name;
        $data->parrentphone = $request->parrentphone;
        $data->semfees = $request->semfees;
        $data->examfees = $request->examfees;
        $data->payment = "0";
        $data->save();
        
        $pdata = new Parents;

        $pdata->parentname = $request->parentname;
        $pdata->studentid = $request->studentid;
        $pdata->parrentid = $request->parrentid;
        $pdata->parrentphone = $request->parrentphone;
        $pdata->parentaddress = $request->parentaddress;
        $pdata->parentemail = $request->parentemail;
        $pdata->occupation = $request->occupation;
        $pdata->relation = $request->relation;
        $pdata->save();

        $usdata = new User;

        $usdata->name = $request->studentid;
        $usdata->email = $request->studentemail;
        $usdata->usertype = "0";
        $usdata->password = $request->studentid;
        $usdata->save();

        $updata = new User;

        $updata->name = $request->parrentid;
        $updata->email = $request->parentemail;
        $updata->usertype = "3";
        $updata->password = $request->parrentid;
        $updata->save();
        
        
        $getcount = Departments::where('dptcode',$request->dept)->first();
        $sts = $getcount->totalstudents;
        $getcount->totalstudents = (int)$sts + 1;
        $getcount->save();
        
        return back()->with('success','Registration Completed successfully');

    }

    Public function courses()
    {
        $data = Departments::all();
        return view('admin.pages.courses',compact('data'));
    
    }

    public function coursesform(Request $request)
    {  
    
        $data = new Courses;

        $data->coursename = $request->coursename;
        $data->coursecode = $request->coursecode;
        $data->semester = $request->semester;
        $data->dept = $request->dept;
        $data->credit = $request->credit;
        $data->category = $request->category;
        $data->teacherid = $request->teacherid;

        $tid = $request->teacherid;
        $findtchr = Teachers::where('teacherid',$tid)->first();

        $data->teachername = $findtchr->teachername;
        
        $data->save();
        
    
        return back()->with('success','Course Created successfully');

    }

    Public function teachers()
    {
        $data = Departments::all();
        return view('admin.pages.teachers',compact('data'));
    
    }

    public function teachersform(Request $request)
    {  
        $request->validate([
        'photo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $name = time().'.'.$image->getClientOriginalExtension();

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(200, 200);
        $image_resize->save('images/teachers/'.$name);

        }
    
        $data = new Teachers;

        $data->teachername = $request->teachername;
        $data->teacherid = $request->teacherid;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->Photo = $name;
        $data->address = $request->address;
        $data->country = $request->country;
        $data->dept = $request->dept;
        $data->nid = $request->nid;
        $data->post = $request->post;
        $data->joiningdate = $request->joiningdate;
        $data->strsalary = $request->strsalary;
        $data->especiality = $request->especiality;
        $data->graduation = $request->graduation;
        $data->save();

        $updata = new User;

        $updata->name = $request->teacherid;
        $updata->email = $request->email;
        $updata->usertype = "2";
        $updata->password = $request->teacherid;
        $updata->save();

        $getcount = Departments::where('dptcode',$request->dept)->first();
        $tts = $getcount->totalteachers;
        $getcount->totalteachers = (int)$tts + 1;
        $getcount->save();
    
        return back()->with('success','Teacher Added successfully');

    }

    Public function routineselect()
    {
        $data = Routines::where('routinetype','Class Routine')->get();
        
        return view('admin.pages.routineselect',compact('data'));
    
    }
    
    public function addroutine(Request $request)
    {  
        
        $data = new Routines;

        $data->day = $request->day;
        $data->strtime = $request->strtime;
        $data->endtime = $request->endtime;
        $data->location = $request->location;
        $data->teacherid = $request->teacherid;
        $data->subcode = $request->subcode;
        $data->subname = $request->subname;
        $data->semester = $request->semester;
        $data->dept = $request->dept;
        $data->category = $request->category;
        $data->routinetype = $request->routinetype;
    
        $data->teachername = $request->teachername;
        
        $data->save();
        return back()->with('success','Routine Added successfully');

    }

    Public function editroutine($id)
    {
        $data = Routines::where('id',$id)->first();

        if($data->routinetype == 'Class Routine')
        {
            return view('admin.pages.editroutine',compact('data'));
        }

        if($data->routinetype == 'Exam Routine')
        {
            return view('admin.pages.exameditroutine',compact('data'));
        }
    
    }

    public function updateroutine(Request $request)
    {
        $id = $request->id;
        $data = Routines::where('id',$id)->first();

            $data->day = $request->day;
            $data->strtime = $request->strtime;
            $data->endtime = $request->endtime;
            $data->location = $request->location;
            $data->teacherid = $request->teacherid;
            $data->subcode = $request->subcode;
            $data->subname = $request->subname;
            $data->semester = $request->semester;
            $data->dept = $request->dept;
            $data->category = $request->category;
            $data->routinetype = $request->routinetype;
        
            $data->teachername = $request->teachername;
            
            $data->save();

        if($data->routinetype == 'Class Routine')
        {
            return redirect('/admin/routine/students')->with('success','Routine Updated Successfully');

        }
        if($data->routinetype == 'Exam Routine')
        {
            return redirect('/admin/routine/exam')->with('success','Routine Updated Successfully');

        }

    }

    public function deleteroutine($id)
    {
        
        $data = Routines::find($id);

        $data->delete();

        return back()->with('success','Data Deleted Successfully');
        
    }

    Public function examroutineselect()
    {
        $data = Routines::where('routinetype','Exam Routine')->get();
        
        return view('admin.pages.examroutineselect',compact('data'));
    
    }

    Public function departments()
    {
        $data = Departments::all();
        
        return view('admin.pages.departments',compact('data'));
    
    }

    public function adddepartment(Request $request)
    {  
        
        $data = new Departments;

        $data->dptname = $request->name;
        $data->dptcode = $request->code;
        $data->totalstudents = '0';
        $data->totalteachers = '0';
        
        $data->save();

        $data = Departments::all();

        return back()->with('success','Department Added successfully',compact('data') );

    }

    public function students()
    {
        $data = Students::all();

        return view('admin.pages.students',compact('data'));
    }


    Public function deletestudents($id)
    {
        $data = Students::where('id',$id)->first();
        $data->delete();

        $pdata = Parents::where('studentid',$id)->first();
        $pdata->delete();

        return back()->with('success','Student Deleted successfully');
    
    }


    Public function promotestudents()
    {
        $data = Students::where('sem','8th')->get();
        foreach($data as $data){ 
            $data->sem = 'Passed Out';
            $data->save();
        }
        $data = Students::where('sem','7th')->get();
        foreach($data as $data){ 
            $data->sem = '8th';
            $data->save();
        }
        $data = Students::where('sem','6th')->get();
        foreach($data as $data){ 
            $data->sem = '7th';
            $data->save();
        }
        $data = Students::where('sem','5th')->get();
        foreach($data as $data){ 
            $data->sem = '6th';
            $data->save();
        }
        $data = Students::where('sem','4th')->get();
        foreach($data as $data){ 
            $data->sem = '5th';
            $data->save();
        }
        $data = Students::where('sem','3rd')->get();
        foreach($data as $data){ 
            $data->sem = '4th';
            $data->save();
        }
        $data = Students::where('sem','2nd')->get();
        foreach($data as $data){ 
            $data->sem = '3rd';
            $data->save();
        }
        $data = Students::where('sem','1st')->get();
        foreach($data as $data){ 
            $data->sem = '2nd';
            $data->save();
        }

        $gets = Admissions::where('semester','1st')->get();
        
        foreach($gets as $gets){ 

            $data = new Students;

            $data->studentid = $gets->studentid;
            $data->studentname = $gets->firstname.' '.$gets->lastname;
            $data->sem = '1st';
            $data->dept = $gets->dept;
            $data->category = $gets->category;
            $data->status = '';
            $data->permission = '';
            $data->cgpa = '';

            $totalfees = (int)$gets->semfees + (int)$gets->examfees;
            $data->attendance = '';
            $data->payable = $totalfees;
            $data->paid = '';
            $data->due = $totalfees;
            $data->remarks = 'Excelent';

            $data->save();

            $gets->semester = 'promoted';
            $gets->save();
        }
        
        return back()->with('success','All Students have been promoted to next Semester successfully');
    
    }

    public function uploadnotice(Request $request)
    {  
        $request->validate([
        'photo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $name = time().'.'.$image->getClientOriginalExtension();

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(300, 450);
        $image_resize->save('images/notice/'.$name);

        }
    
        $data = new Notices;

        $data->title = $request->title;
        $data->about = $request->about;
        $data->date = $request->date;
        $data->Photo = $name;
        
        $data->save();

        $updata = new User;
    
        return back()->with('success','Notice Published successfully');

    }


    Public function notice()
    {
        $data = Notices::all();
        
        return view('admin.pages.notice',compact('data'));
    
    }

    Public function deletenotice($id)
    {
        $data = Notices::where('id',$id)->first();
        $dimgname = $data->photo;

        if (File::exists(public_path('images/notice'.$dimgname))) {
        File::delete(public_path('images/notice'.$dimgname));
        
        }
        $data->delete();
        
        return back()->with('success','Notice Deleted successfully');
    
    }

    public function parents()
    {
        $data = Parents::all();

        return view('admin.pages.parents',compact('data'));
    }

    public function results()
    {
        $data = Results::where('publish','No')->get();

        return view('admin.pages.results',compact('data'));
    }

    public function publishresults()
    {
        $data = Results::where('publish','No')->get();
        foreach($data as $data)
        {
            $data->publish = 'Yes';
            $data->save();
        }

        return back()->with('success','Result Published successfully');
    }

}
