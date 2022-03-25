<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Materials;
use App\Models\Courses;
use App\Models\Admissions;
use App\Models\Attendances;
use App\Models\Departments;
use App\Models\Results;
use App\Models\Students;

class TeacherController extends Controller
{
    Public function index()
    {
        return view('frontend.pages.teachers.index');
    
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

            if($usertype =='2')
            {
                return view('frontend.pages.teachers.home');
            }
            else
            {
                return view('auth.login');
                //abort(403);
            } 
        }
    }

    Public function materials()
    {
        //$data = Routines::where('routinetype','Class Routine')->get();
        
        return view('frontend.pages.teachers.materials');
    
    }

    public function uploadmaterials(Request $request)
    {  
        if ($request->hasFile('material')) {
            $name = $request->file('material')->getClientOriginalName();
            $path = $request->file('material')->store('files/studymaterials');
    
            }
    
        $data = new Materials;

        $data->subname = $request->subname;
        $data->subcode = $request->subcode;
        $data->semester = $request->semester;
        $data->dept = $request->dept;
        $data->category = $request->category;
        $data->filename = $name;
        $data->filepath = $path;
        $data->teacherid = $request->teacherid;
        
        $data->save();
        
    
        return back()->with('success','File Uploaded successfully');

    }

    Public function attendance()
    {
        $teacherid = '287664';

        $data = Courses::where('teacherid',$teacherid)->get();
        
        return view('frontend.pages.teachers.selectattendance',compact('data'));
    
    }

    Public function dailyattendance($id)
    {
        //$teacherid = '287664';

        $data = Courses::where('id',$id)->first();

            $stds = Attendances::where('semester',$data->semester)
                    ->where('dept',$data->dept)
                    ->where('category',$data->category)
                    ->where('subcode',$data->coursecode)->first();
           
            if(empty($stds->semester)){

                $sptds = Students::where('dept',$data->dept)
                    ->where('sem',$data->semester)
                    ->where('category',$data->category)->get();

                    foreach ($sptds as $sptds){
                        $adata = new Attendances;

                        $adata->studentid = $sptds->studentid;
                        $adata->studentname = $sptds->studentname;
                        $adata->subcode = $data->coursecode;
                        $adata->semester = $sptds->sem;
                        $adata->dept = $sptds->dept;
                        $adata->category = $sptds->category;
                        $adata->dailyattd = '0';
                        $adata->totalclass = '0';
                        $adata->dailyattprcnt = '0 %';
                        $adata->dailyattmarks = '0';
                        $adata->totalattprcnt = '0 %';
                        $adata->totalattmarks = '0';
                        $adata->teacherid = $data->teacherid;
                        
                        $adata->save();

                        $rest = Results::where('studentid',$sptds->studentid)
                                ->where('subcode',$data->coursecode)->first();

                        if(empty($rest->sem)){
                            
                            $padata = new Results;

                            $padata->studentid = $sptds->studentid;
                            $padata->studentname = $sptds->studentname;
                            $padata->subcode = $data->coursecode;
                            $padata->subname = $data->coursename;
                            $padata->credit = $data->credit;
                            $padata->sem = $sptds->sem;
                            $padata->dept = $sptds->dept;
                            $padata->category = $sptds->category;
                            $padata->examtype = 'Mid';
                            $padata->attenmarks = '0';
                            $padata->assignment = '0';
                            $padata->quizmarks = '0';
                            $padata->written = '0';
                            $padata->gpa = '0';
                            $padata->cgpa = '0';
                            $padata->letter = '';
                            $padata->teacherid = $data->teacherid;
                            $padata->publish = 'No';
                            
                            $padata->save();

                        }


                    }
            }

        
        $spotds = Attendances::where('dept',$data->dept)
                    ->where('semester',$data->semester)
                    ->where('subcode',$data->coursecode)
                    ->where('category',$data->category)->get();
        
        return view('frontend.pages.teachers.giveattendance',compact('spotds'));
    
    }

    public function uploadattendance(Request $request)
    {  
        $sptds = Attendances::where('dept',$request->dept)
                ->where('semester',$request->sem)
                ->where('subcode',$request->subcode)
                ->where('category',$request->cate)->get();

                $i = 1;
                $att = 'att';
        foreach ($sptds as $sptds){
            // $newsptds = Attendance::where('studentid',$sptds->studentid)
            //             ->where('studentid',$request->name)->get();

            $olddaily = $sptds->dailyattd;
            $oldtolclass = $sptds->totalclass;

            if(is_null($request->{$att.$i})){
                $inputatt = 0;
            }
            else{ $inputatt = $request->{$att.$i}; }

            $newdailyatt = (int)$olddaily + (int)$inputatt;
            $newdailttot = (int)$oldtolclass + 1;
            $i++;
            
            $totalattmarks = '15';
            $totalpercent = '100 %';

            $dailyprcnt = (float)(((int)$newdailyatt * 100)/(int)$newdailttot);
            $dailymarks = (int)(((int)$newdailyatt * (int)$totalattmarks )/(int)$newdailttot);

            $sptds->dailyattd = $newdailyatt;
            $sptds->totalclass = $newdailttot;
            $sptds->dailyattprcnt = round($dailyprcnt, 2);
            $sptds->dailyattmarks = $dailymarks;
            $sptds->totalattprcnt = $totalpercent;
            $sptds->totalattmarks = $totalattmarks;

            $sptds->save();

            $rest = Results::where('studentid',$sptds->studentid)
                    ->where('subcode',$request->subcode)->first();

            $rest->attenmarks = $dailymarks;
            $rest->save();
        
        }
  
        return back()->with('success','Attendance Uploaded successfully');

    }

    Public function results()
    {
        $teacherid = '287664';

        $data = Courses::where('teacherid',$teacherid)->get();
        
        return view('frontend.pages.teachers.results',compact('data'));
    
    }

    Public function selectmidresults($id)
    {
        //$teacherid = '287664';

        $data = Courses::where('id',$id)->first();

            $stds = Results::where('sem',$data->semester)
                    ->where('dept',$data->dept)
                    ->where('examtype','Mid')
                    ->where('category',$data->category)
                    ->where('subcode',$data->coursecode)->first();
           
            if(empty($stds->sem)){

                $sptds = Students::where('dept',$data->dept)
                    ->where('sem',$data->semester)
                    ->where('category',$data->category)->get();

                    foreach ($sptds as $sptds){
                        $adata = new Results;

                        $adata->studentid = $sptds->studentid;
                        $adata->studentname = $sptds->studentname;
                        $adata->subcode = $data->coursecode;
                        $adata->subname = $data->coursename;
                        $adata->credit = $data->credit;
                        $adata->sem = $sptds->sem;
                        $adata->dept = $sptds->dept;
                        $adata->category = $sptds->category;
                        $adata->examtype = 'Mid';
                        $adata->attenmarks = '0';
                        $adata->assignment = '0';
                        $adata->quizmarks = '0';
                        $adata->written = '0';
                        $adata->gpa = '0';
                        $adata->cgpa = '0';
                        $adata->letter = '';
                        $adata->teacherid = $data->teacherid;
                        $adata->publish = 'No';
                        
                        $adata->save();

                        $atten = Attendances::where('studentid',$sptds->studentid)
                                ->where('subcode',$data->coursecode)->first();
                        $adata = Results::where('studentid',$sptds->studentid)
                                ->where('examtype','Mid')
                                ->where('subcode',$data->coursecode)->first();

                        $adata->attenmarks = $atten->dailyattmarks;
                                             
                        $adata->save();


                    }
            }
        
        $spotds = Results::where('dept',$data->dept)
                    ->where('sem',$data->semester)
                    ->where('examtype','Mid')
                    ->where('category',$data->category)
                    ->where('subcode',$data->coursecode)->get();
        
        return view('frontend.pages.teachers.uploadmidresults',compact('spotds'));
    
    }

    Public function selectfinalresults($id)
    {
        //$teacherid = '287664';

        $data = Courses::where('id',$id)->first();

            $stds = Results::where('sem',$data->semester)
                    ->where('dept',$data->dept)
                    ->where('examtype','Final')
                    ->where('category',$data->category)
                    ->where('subcode',$data->coursecode)->first();
           
            if(empty($stds->sem)){

                $sptds = Students::where('dept',$data->dept)
                    ->where('sem',$data->semester)
                    ->where('category',$data->category)->get();

                    foreach ($sptds as $sptds){
                        $adata = new Results;

                        $adata->studentid = $sptds->studentid;
                        $adata->studentname = $sptds->studentname;
                        $adata->subcode = $data->coursecode;
                        $adata->subname = $data->coursename;
                        $adata->credit = $data->credit;
                        $adata->sem = $sptds->sem;
                        $adata->dept = $sptds->dept;
                        $adata->category = $sptds->category;
                        $adata->examtype = 'Final';
                        $adata->attenmarks = '0';
                        $adata->assignment = '0';
                        $adata->quizmarks = '0';
                        $adata->gpa = '0';
                        $adata->cgpa = '0';
                        $adata->teacherid = $data->teacherid;
                        $adata->publish = 'No';
                        $adata->letter = '';
                        $adata->written = '';
                        
                        $adata->save();
                    }
            }
        
        $spotds = Results::where('dept',$data->dept)
                    ->where('sem',$data->semester)
                    ->where('examtype','Final')
                    ->where('subcode',$data->coursecode)
                    ->where('category',$data->category)->get();
        
        return view('frontend.pages.teachers.uploadfinalresults',compact('spotds'));
    
    }

    public function uploadmidresult(Request $request)
    {  
        $sptds = Results::where('dept',$request->dept)
                ->where('sem',$request->sem)
                ->where('examtype','Mid')
                ->where('subcode',$request->subcode)
                ->where('category',$request->cate)->get();

                $i = 1;
                $att = 'att';
                $quiz = 'quiz';
                $ass = 'ass';
                $wri = 'wri';

        foreach ($sptds as $sptds){

            $attmrks = $request->{$att.$i};
            $assmrks = $request->{$ass.$i};
            $quizmrks = $request->{$quiz.$i};
            $wrimrks = $request->{$wri.$i};
            $i++;

            $credit = $sptds->credit;

            $sptds->examtype = 'Mid';
            $sptds->attenmarks = $attmrks;
            $sptds->assignment = $assmrks;
            $sptds->quizmarks = $quizmrks;
            $sptds->written = $wrimrks;

            $totalmarks = (int)((int)$attmrks + (int)$assmrks + (int)$quizmrks +(int)$wrimrks);

            if($totalmarks >= 80 and $totalmarks <= 90){
                $sptds->gpa = '4.00';
                $sptds->letter = 'A+';
                $cgpa = (float)((float)$credit * 4.00);
                $sptds->cgpa = round($cgpa, 2);

            }

            elseif($totalmarks >= 75 and $totalmarks < 80){
                $sptds->gpa = '3.75';
                $sptds->letter = 'A';
                $cgpa = (float)((float)$credit * 3.75);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 70 and $totalmarks < 75){
                $sptds->gpa = '3.50';
                $sptds->letter = 'A-';
                $cgpa = (float)((float)$credit * 3.50);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 65 and $totalmarks < 70){
                $sptds->gpa = '3.25';
                $sptds->letter = 'B+';
                $cgpa = (float)((float)$credit * 3.25);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 60 and $totalmarks < 65){
                $sptds->gpa = '3.00';
                $sptds->letter = 'B';
                $cgpa = (float)((float)$credit * 3.00);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 55 and $totalmarks < 60){
                $sptds->gpa = '2.75';
                $sptds->letter = 'B-';
                $cgpa = (float)((float)$credit * 2.75);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 50 and $totalmarks < 55){
                $sptds->gpa = '2.50';
                $sptds->letter = 'C+';
                $cgpa = (float)((float)$credit * 2.50);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 45 and $totalmarks < 50){
                $sptds->gpa = '2.25';
                $sptds->letter = 'C';
                $cgpa = (float)((float)$credit * 2.25);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 40 and $totalmarks < 45){
                $sptds->gpa = '2.00';
                $sptds->letter = 'D';
                $cgpa = (float)((float)$credit * 2.00);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 0 and $totalmarks < 40){
                $sptds->gpa = '0.0';
                $sptds->letter = 'F';
                $cgpa = (float)((float)$credit * 0.0);
                $sptds->cgpa = round($cgpa, 2);

            }
            else{
                $sptds->gpa = 'N/A';
                $sptds->letter = 'I';
                $sptds->cgpa = '0.0';
            }

            
            $sptds->save();
        
        }
  
        return back()->with('success','Result Uploaded successfully');

    }

    public function uploadfinalresult(Request $request)
    {  
        $sptds = Results::where('dept',$request->dept)
                ->where('sem',$request->sem)
                ->where('subcode',$request->subcode)
                ->where('examtype','Final')
                ->where('category',$request->cate)->get();

                $i = 1;
                $att = 'att';
                $quiz = 'quiz';
                $ass = 'ass';
                $wri = 'wri';

        foreach ($sptds as $sptds){

            $attmrks = $request->{$att.$i};
            $assmrks = $request->{$ass.$i};
            $quizmrks = $request->{$quiz.$i};
            $wrimrks = $request->{$wri.$i};
            $i++;

            $credit = $sptds->credit;

            $sptds->examtype = 'Final';
            $sptds->attenmarks = $attmrks;
            $sptds->assignment = $assmrks;
            $sptds->quizmarks = $quizmrks;
            $sptds->written = $wrimrks;

            $totalmarks = (int)((int)$attmrks + (int)$assmrks + (int)$quizmrks +(int)$wrimrks);

            if($totalmarks >= 80 and $totalmarks <= 110){
                $sptds->gpa = '4.00';
                $sptds->letter = 'A+';
                $cgpa = (float)((float)$credit * 4.00);
                $sptds->cgpa = round($cgpa, 2);

            }

            elseif($totalmarks >= 75 and $totalmarks < 80){
                $sptds->gpa = '3.75';
                $sptds->letter = 'A';
                $cgpa = (float)((float)$credit * 3.75);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 70 and $totalmarks < 75){
                $sptds->gpa = '3.50';
                $sptds->letter = 'A-';
                $cgpa = (float)((float)$credit * 3.50);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 65 and $totalmarks < 70){
                $sptds->gpa = '3.25';
                $sptds->letter = 'B+';
                $cgpa = (float)((float)$credit * 3.25);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 60 and $totalmarks < 65){
                $sptds->gpa = '3.00';
                $sptds->letter = 'B';
                $cgpa = (float)((float)$credit * 3.00);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 55 and $totalmarks < 60){
                $sptds->gpa = '2.75';
                $sptds->letter = 'B-';
                $cgpa = (float)((float)$credit * 2.75);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 50 and $totalmarks < 55){
                $sptds->gpa = '2.50';
                $sptds->letter = 'C+';
                $cgpa = (float)((float)$credit * 2.50);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 45 and $totalmarks < 50){
                $sptds->gpa = '2.25';
                $sptds->letter = 'C';
                $cgpa = (float)((float)$credit * 2.25);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 40 and $totalmarks < 45){
                $sptds->gpa = '2.00';
                $sptds->letter = 'D';
                $cgpa = (float)((float)$credit * 2.00);
                $sptds->cgpa = round($cgpa, 2);

            }
            elseif($totalmarks >= 0 and $totalmarks < 40){
                $sptds->gpa = '0.0';
                $sptds->letter = 'F';
                $cgpa = (float)((float)$credit * 0.0);
                $sptds->cgpa = round($cgpa, 2);

            }
            else{
                $sptds->gpa = 'N/A';
                $sptds->letter = 'I';
                $sptds->cgpa = '0.0';
            }

            
            $sptds->save();
        
        }
  
        return back()->with('success','Result Uploaded successfully');

    }

}
