<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
use Symfony\Component\HttpFoundation\Response;

use App\Models\User;
use App\Models\Reservations;
use App\Models\Checkouts;


class MailController extends Controller {

    /** Admin sidebar -> Users **/
    public function sendEmail(Request $request, $id) {

        $data = user::find($id);

        $email = $data->email;
   
        $mailData = [
            'subject' => $request->subject,
            'title' => $request->title,
            'body' => $request->e_body,
            'url' => 'http://127.0.0.1:8000/'
            
        ];
  
        Mail::to($email)->send(new EmailDemo($mailData));
   
        return back()->with('success','Email send Successfully');
    }

    public function getmail($id)
    {
        $cdata = user::find($id);
        $mdata = $cdata->id;

        $data =user::all()->where('usertype', '==', 0);
        return view('admin.pages.email',compact('data','mdata'));       
        
    }

    /** Admin sidebar -> Orders **/
    public function ordermail($id)
    {
        $cdata = Checkouts::find($id);
        $odata = $cdata->id;

        $data = Checkouts::all();
        return view('admin.pages.ordermail',compact('data','odata'));       
        
    }

    public function ordersendEmail(Request $request, $id) {

        $data = Checkouts::find($id);

        $email = $data->email;
   
        $mailData = [
            'subject' => $request->subject,
            'title' => $request->title,
            'body' => $request->e_body,
            'url' => 'http://127.0.0.1:8000/'
            
        ];
  
        Mail::to($email)->send(new EmailDemo($mailData));

        return back()->with('success','Email send Successfully');
    }

    /** Admin sidebar -> Reservations **/
    public function reservationmail($id)
    {
        $cdata = Reservations::find($id);
        $mdata = $cdata->id;

        $data = Reservations::all();
        return view('admin.pages.reservationmail',compact('data','mdata'));       
        
    }

    public function reservationsendEmail(Request $request, $id) {

        $data = Reservations::find($id);

        $email = $data->email;
   
        $mailData = [
            'subject' => $request->subject,
            'title' => $request->title,
            'body' => $request->e_body,
            'url' => 'http://127.0.0.1:8000/'
            
        ];
  
        Mail::to($email)->send(new EmailDemo($mailData));

        return back()->with('success','Email send Successfully');
    }

}