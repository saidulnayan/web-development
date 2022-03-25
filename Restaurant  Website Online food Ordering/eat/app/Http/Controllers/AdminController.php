<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sliders;
use App\Models\Abouts;
use App\Models\Abouttext;
use App\Models\Menus;
use App\Models\Chefs;
use App\Models\Contactss;
use App\Models\Reservations;
use App\Models\Checkouts;


use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use File;

class AdminController extends Controller
{
    Public function index(){

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



    /** Admin sidebar -> users **/

    Public function users()
    {   
        $data =user::all()->where('usertype', '==', 0);
        return view('admin.pages.users',compact('data'));
    }

    
    public function destroyuser($id)
    {
        
        $data = user::find($id);
        
        $data->delete();

        return back()->with('success','User Deleted Successfully');
        
    }

    /** Admin sidebar -> Orders **/

    Public function orderpage()
    {   
        $rdata = Checkouts::all();
        
        return view('admin.pages.orders',compact('rdata'));
        
    }

    public function destroyorders($id)
    {
        
        $data = Checkouts::find($id);
        
        $data->delete();

        return back()->with('success','Order Deleted Successfully');
        
    }

    /** Admin sidebar -> Reservations **/

    Public function reservationpage()
    {   
        $rdata = Reservations::all();
        
        return view('admin.pages.reservations',compact('rdata'));
        
    }

    public function destroyreservations($id)
    {
        
        $data = Reservations::find($id);
        
        $data->delete();

        return back()->with('success','Reservation Deleted Successfully');
        
    }

    public function reservationupdate(Request $request)
    {
        
        $mark = "mark";
        $acc = "Accept";
        $cid = "cid";
       
        $ena = "pointer-events: none;";
        $mrks = "disabled";
        
        $rows = Reservations::count();

        
        for($i=1 ; $i<=$rows; $i++){ 

            $id = $request->{$cid.$i};

            $data = Reservations::find($id);

            $data->mark = $request->{$mark.$i};
            $data->accept = $request->{$acc.$i};
            
            if($request->{$acc.$i} == 'Accepted'){
                $data->disable = $ena;
            }

            if($request->{$mark.$i} == 'checked'){
                $data->mrks = $ena;
            }

            $data->save();
        }     
        
        return back()->with('success','Changes Saved Successfully');
    }

    /** admin sidebar -> user pages -> Home Slider **/

    Public function homepage()
    {   
        $photos=Sliders::all();
        return view('admin.parts.home',compact('photos'));
        
    }

   
    public function homestore(Request $request)
    {
        $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        

        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(1500, 800);
        $image_resize->save('frontend/images/'.$name);

    }

    $data = new Sliders;
    $data->image=$name;
    $data->save();


    return back()->with('success','Image Uploaded successfully');

    }

    public function destroyslider($id)
    {
        
        $data = Sliders::find($id);

        $dimgname = $data->image;

        if (File::exists(public_path('frontend/images/'.$dimgname))) {
        File::delete(public_path('frontend/images/'.$dimgname));
        
        }
        $data->delete();

        return back()->with('success','Image Deleted Successfully');
        
    }

    /** Admin sidebar -> user pages -> About Page **/

    Public function aboutpage()
    {   
        $photos = Abouts::all();
        $contents = Abouttext::find(1);
        return view('admin.parts.about',compact('photos','contents'));
        
    }

    public function aboutstore(Request $request)
    {
        $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        

        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(170, 170);
        $image_resize->save('frontend/images/'.$name);

        }

    $data = new Abouts;
    $data->image=$name;
    $data->save();


    return back()->with('success','Image Uploaded successfully');

    }

    public function aboutcontentstore(Request $request)
    {  

        $data = Abouttext::find(1);
        
        $data->about_title = $request->about_title;
        $data->about_text = $request->about_text;
    
        $data->save();

        
        return back()->with('success','Content Updated successfully');

    }

    public function destroyabout($id)
    {
        
        $data = Abouts::find($id);

        $dimgname = $data->image;

        if (File::exists(public_path('frontend/images/'.$dimgname))) {
        File::delete(public_path('frontend/images/'.$dimgname));
        
        }
        $data->delete();

        return back()->with('success','Image Deleted Successfully');
        
    }

    /** Admin sidebar -> user pages -> Menu Page **/

    Public function menupage()
    {   
        $photos = Menus::all();
        
        return view('admin.parts.menus',compact('photos'));
        
    }

    public function destroymenu($id)
    {
        
        $data = Menus::find($id);

        $dimgname = $data->image;

        if (File::exists(public_path('frontend/images/'.$dimgname))) {
        File::delete(public_path('frontend/images/'.$dimgname));
        
        }
        $data->delete();

        return back()->with('success','Image Deleted Successfully');
        
    }

    public function menustore(Request $request)
    {  

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            
    
            if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
    
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(284, 400);
            $image_resize->save('frontend/images/'.$name);
    
            }
    
        $data = new Menus;

        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->image = $name;
        $data->save();
    
    
        return back()->with('success','Image Uploaded successfully');

    }

    public function editmenu($id)
    {
        $data = Menus::find($id);
        
        return view('admin.parts.editmenu',compact('data'));
    }

    public function updatemenu(Request $request, $id)
    {
        $data = Menus::find($id);
        $dimgname = $data->image;


        if (File::exists(public_path('frontend/images/'.$dimgname))) {
        File::delete(public_path('frontend/images/'.$dimgname));
        
        }

        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(284, 400);
        $image_resize->save('frontend/images/'.$name);
        $data->image=$name;
        }

        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->save();


        return redirect('/pages/menu')->with('success','Data Updated Successfully');
    }

    /** Admin sidebar -> user pages -> Chefs Page **/

    Public function chefspage()
    {   
        $chefs = Chefs::all();
        
        return view('admin.parts.chefs',compact('chefs'));
        
    }

    public function chefstore(Request $request)
    {
        $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(360, 341);
        $image_resize->save('frontend/images/'.$name);

        }

    $data = new Chefs;
    $data->name = $request->name;
    $data->skill = $request->skill;
    $data->facebook = $request->facebook;
    $data->twitter = $request->twitter;
    $data->instagram = $request->instagram;
    $data->image=$name;

    $data->save();

    return back()->with('success','Data Uploaded successfully');

    }

    public function editchefs($id)
    {
        $data = Chefs::find($id);
        
        return view('admin.parts.editchefs',compact('data'));
    }

    public function deletechefs($id)
    {
        
        $data = Chefs::find($id);

        $dimgname = $data->image;

        if (File::exists(public_path('frontend/images/'.$dimgname))) {
        File::delete(public_path('frontend/images/'.$dimgname));
        
        }
        $data->delete();

        return back()->with('success','Data Deleted Successfully');
        
    }

    public function updatechefs(Request $request, $id)
    {
        $data = Chefs::find($id);
        $dimgname = $data->image;


        if (File::exists(public_path('frontend/images/'.$dimgname))) {
        File::delete(public_path('frontend/images/'.$dimgname));
        
        }

        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(360, 341);
        $image_resize->save('frontend/images/'.$name);
        $data->image=$name;
        }

        $data->name = $request->name;
        $data->skill = $request->skill;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->instagram = $request->instagram;

        $data->save();


        return redirect('/pages/chefs')->with('success','Data Updated Successfully');
    }

    /** Admin sidebar -> user pages -> Contact Page **/

    Public function contactpage()
    {   
        $cdata = Contactss::find(1);
        
        return view('admin.parts.contacts',compact('cdata'));
        
    }

    public function contactupdate(Request $request)
    {  

        $data = Contactss::find(1);
        
        $data->title = $request->title;
        $data->phone1 = $request->phone1;
        $data->phone2 = $request->phone2;
        $data->email1 = $request->email1;
        $data->email2 = $request->email2;
        $data->phone1 = $request->phone1;
        $data->title = $request->title;
        $data->phone1 = $request->phone1;
    
        $data->save();

        
        return back()->with('success','Content Updated successfully');

    }

    

}
