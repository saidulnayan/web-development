<?php

namespace App\Providers;
use App\Models\Admissions;
use App\Models\Parents;
use App\Models\Teachers;
use App\Models\User;
use App\Models\Courses;
use App\Models\Routines;
use App\Models\Departments;
use App\Models\Students;
use App\Models\Notices;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('admin.pages.routineselect', function ($view) 
        // {
        //     $cartname = User::where('id',Auth::id())->first();
        //     //$cartname = $cartDatacheck->name;
    
            
    
        //     //...with this variable
        //     $view->with('uname', $cartname );
     
        // });
        
        $ddata = Departments::all();
        $stid = '139032';
        $stata = Students::where('studentid',$stid)->first();
        $rnts = Routines::where('semester',$stata->sem)
                ->where('dept',$stata->dept)
                ->where('category',$stata->category)
                ->where('routinetype','Exam Routine')->get();
        $cnts = Routines::where('semester',$stata->sem)
                ->where('dept',$stata->dept)
                ->where('category',$stata->category)
                ->where('routinetype','Class Routine')->get();
        $stdt = Admissions::where('studentid',$stid)->first();

        View::share(['dpts' => $ddata, 'exdata' => $rnts, 'clrtn' => $cnts, 'sdetail' =>$stdt]);
    
    }
}
