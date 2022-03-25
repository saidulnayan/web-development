<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    Public function index()
    {
        return view('frontend.pages.parents.index');
    
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

            if($usertype =='3')
            {
                return view('frontend.pages.parents.home');
            }
            else
            {
                return view('auth.login');
                //abort(403);
            } 
        }
    }
}
