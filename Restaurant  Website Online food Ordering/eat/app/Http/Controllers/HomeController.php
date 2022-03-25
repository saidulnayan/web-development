<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Abouts;
use App\Models\Reservations;
use App\Models\CartCounts;
use App\Models\Orders;
use App\Models\Menus;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use View;

class HomeController extends Controller
{
    Public function index()
    {
        return view('frontend.pages.index');
    
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
            else
            {
                $cartDatacheck = CartCounts::where('userid', Auth::id())->exists();
                if($cartDatacheck === null)
                {
                    $adduserto = new CartCounts;
                    $adduserto->userid = Auth::id();
                    $adduserto->cartcount = "0";
                    $adduserto->ordercount = "0";
                    $adduserto->save();
                }
                return view('frontend.pages.home');

            }
            
        }

    }

    public function addreservation(Request $request)
    {   
        $pop ="check";
        $pup ="Accept";
        $sup = " ";

        $data = new Reservations;
        $data->mark = $pop;
        $data->mrks = $pop;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guests = $request->guests;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->accept = $pup;
        $data->disable = $sup;

        
        $data->save();
        if (!Auth::check())
        {
            return redirect('/#reservation')->with('success','Reservation Request Successful');
        }
        else{
            return redirect('/home#reservation')->with('success','Reservation Request Successful');
        }

    }

    Public function cartpage()
    {   
        $data = DB::table('orders')
        ->join('menuses', 'orders.foodid', '=', 'menuses.id')
        ->select('orders.id as id','orders.qnty as qnty','menuses.name as name','menuses.description as description','menuses.image as image','menuses.price as price')
        ->where('orders.userid','=',Auth::id())
        ->get();

        $sumprice = Orders::where('userid',Auth::id())->sum('tprice');

        return view('frontend.pages.cart',compact('data','sumprice'));
        
    }
}
