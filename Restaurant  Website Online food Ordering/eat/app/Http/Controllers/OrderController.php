<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\Menus;
use App\Models\User;
use App\Models\CartCounts;
use App\Models\Checkouts;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    Public function addtocart(Request $request)
    {
                if($request->post('itemnom')>0)
                {
                    $checkfid = Orders::where('userid',Auth::id())
                    ->where('foodid',$request->post('foodid'))->first();

                    if(!$checkfid)
                    {
                        $data = new Orders;
                        $data->userid = Auth::id();
                        $data->foodid = $request->post('foodid');

                        $unitpce = Menus::where('id',$request->post('foodid'))->first();

                        $utprice = $unitpce->price;
                        $data->unitprice = $unitpce->price;
                        $cartproductcount = $request->post('itemnom');

                        $calcprice = (int)$utprice * (int)$cartproductcount;
                        $data->qnty = $cartproductcount;
                        $data->tprice = $calcprice;
                        $data->save();
                    }
                    if($checkfid)
                    {
                        
                        $preqnty = $checkfid->qnty;
                        $presentqnty = $request->post('itemnom');
                        $newqnty = (int)$preqnty + (int)$presentqnty;
                        $checkfid->qnty = $newqnty;
                        $unitprc = $checkfid->unitprice;
                        $colprc = (int)$unitprc * (int)$newqnty;
                        $checkfid->tprice = $colprc;

                        $checkfid->save();
                    }
                    


                    // $registeruser = CartCounts::where('userid','=',Auth::id());
                    $cartuser = CartCounts::where('userid',Auth::id())->first();
                     if(!$cartuser)
                     {
                        $adduserto = new CartCounts;
                        $adduserto->userid = Auth::id();
                        $adduserto->cartcount = "0";
                        $adduserto->ordercount = "0";
                        $adduserto->save();
                     }
                     
                    
                    $cartuser = CartCounts::where('userid',Auth::id())->first();
                   
                    $totalcartproduct = $cartuser->cartcount;
                    $cartproductcount = $request->post('itemnom');
                    $finalcount = (int)$totalcartproduct + (int)$cartproductcount;
                    $cartuser->cartcount = $finalcount;
                    $cartuser->save();

                    return response()->json(['success'=>'Successfully added to your cart','database'=> "true",'cartNOs'=>$finalcount]);

                }
                else
                {
                    return response()->json(['error'=>'Ajax request submitted successfully','database'=> "false"]);
                }        
            
  
    }

    Public function cartupdate(Request $request)
    {
        $findrow = Orders::where('id',$request->orderid)->first();
        
        if($request->Min =='Dn')
        {
            $rowqnty = $findrow->qnty;
            if($rowqnty>1){
                $minqnty = (int)$rowqnty - 1;
                $findrow->qnty = $minqnty;

                $rowunitprice = $findrow->unitprice;
                $rownewtotalprice = (float)$rowunitprice * $minqnty;
                $findrow->tprice = $rownewtotalprice;
                $findrow->save();

                $cartuser = CartCounts::where('userid',Auth::id())->first();
                $getcartcount = $cartuser->cartcount;
                $mincartcount = (int)$getcartcount - 1;
                $cartuser->cartcount = $mincartcount;
                $cartuser->save();


                return back()->with('success','Item Deducted Successfully');
    
            }
            else{

                return back()->with('success','Invalid Action!');
            }
        }
        

        if($request->Max =='Up')
        {
            $rowqnty = $findrow->qnty;
            if($rowqnty<30){
                $minqnty = (int)$rowqnty + 1;
                $findrow->qnty = $minqnty;

                $rowunitprice = $findrow->unitprice;
                $rownewtotalprice = (float)$rowunitprice * $minqnty;
                $findrow->tprice = $rownewtotalprice;
                $findrow->save();

                $cartuser = CartCounts::where('userid',Auth::id())->first();
                $getcartcount = $cartuser->cartcount;
                $mincartcount = (int)$getcartcount + 1;
                $cartuser->cartcount = $mincartcount;
                $cartuser->save();

                return back()->with('success','Item Added Successfully');
            }
            else{

                return back()->with('success','Invalid Action!');
            }
        }
    }

    public function destroycart($id)
    {
        $findrow = Orders::where('id',$id)->first();
        $findcount = $findrow->qnty;
        $findrow->delete();

        $findcartrow = CartCounts::where('userid',Auth::id())->first();
        $getcartcout = $findcartrow->cartcount;
        $newcartcount = (int)$getcartcout - $findcount;
        $findcartrow->save();


        return back()->with('success','Item Deleted Successfully');
    }

    public function checkout()
    {
        $cartname = User::where('id',Auth::id())->first();
        $findrow = DB::table('orders')
        ->join('menuses', 'orders.foodid', '=', 'menuses.id')
        ->select('orders.id as id','orders.qnty as qnty','orders.tprice as tprice','menuses.name as name','menuses.description as description','menuses.image as image','menuses.price as price')
        ->where('orders.userid','=',Auth::id())
        ->get();

        $sumprice = Orders::where('userid',Auth::id())->sum('tprice');
        return view('frontend.pages.checkout',compact('cartname','findrow','sumprice'));
    }

    Public function checkoutorder(Request $request)
    {
        $pop ="check";
        $pup ="Accept";
        $sup = " ";

        $username = User::where('id',Auth::id())->first();
        $sumprice = Orders::where('userid',Auth::id())->sum('tprice');
        $findrow = DB::table('orders')
        ->join('menuses', 'orders.foodid', '=', 'menuses.id')
        ->select('orders.id as id','orders.qnty as qnty','orders.tprice as tprice','menuses.name as name','menuses.description as description','menuses.image as image','menuses.price as price')
        ->where('orders.userid','=',Auth::id())
        ->get()->toArray();

        $in = count($findrow);
        $prod = "";
        for($i=0 ; $i<$in; $i++){ 

            $prod .= $findrow[$i]->name . "( ". $findrow[$i]->price . " X ". $findrow[$i]->qnty . " )" . "\r\n";

        }

        $data = new Checkouts;
        $data->mark = $pop;
        $data->mrks = $pop;
        $data->name = $username->name;
        $data->orderid = Auth::id();
        $data->product = $prod;
        $data->cost = $sumprice;
        $data->address = $request->address;
        $data->payment = $request->payment;
        $data->email = $username->email;
        $data->accept = $pup;
        $data->disable = $sup;
        $data->save();
        
        $oldorders = Orders::where('userid',Auth::id())->get();
        $oldorders->each->delete();

        $oldcarts = CartCounts::where('userid',Auth::id())->first();
        $oldcarts->cartcount = '0';
        $oldcarts->save();

        
        return redirect('/home')->with('success','Order Placed Successfully');
    }

}
