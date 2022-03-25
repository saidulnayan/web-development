<?php

namespace App\Providers;
use App\Models\Sliders;
use App\Models\Abouts;
use App\Models\Abouttext;
use App\Models\Menus;
use App\Models\Chefs;
use App\Models\Contactss;
use App\Models\CartCounts;
use App\Models\User;

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
       
    view()->composer('frontend.layouts.userheader', function ($view) 
    {
        $cartDatacheck = CartCounts::where('userid',Auth::id())->first();
        if(!$cartDatacheck)
        {
            $adduserto = new CartCounts;
            $adduserto->userid = Auth::id();
            $adduserto->cartcount = "0";
            $adduserto->ordercount = "0";
            $adduserto->save();
        }
        $cartdatas = CartCounts::where('userid', Auth::id())->first();
        
        //...with this variable
        $view->with('cart', $cartdatas );    
    });

    view()->composer('frontend.layouts.carts.navbar', function ($view) 
    {
        $cartname = User::where('id',Auth::id())->first();
        //$cartname = $cartDatacheck->name;

        

        //...with this variable
        $view->with('uname', $cartname );
 
    });

    view()->composer('frontend.layouts.carts.navbar', function ($view) 
    {
        $cartcnts = CartCounts::where('userid', Auth::id())->first();
        //$cartcnts = $cartdatas->cartcount;
        

        //...with this variable
        $view->with('cartcnts', $cartcnts );
 
    });

        $photos = Sliders::all();
        $aphotos = Abouts::all();
        $atext = Abouttext::find(1);
        $menus = Menus::all();
        $chefs = Chefs::all();
        $ctext = Contactss::find(1);

        

        View::share(['sliderphoto' => $photos, 'aboutphoto' => $aphotos, 'abouttext' => $atext, 'menuitem' => $menus, 'chefs' => $chefs, 'contacts' => $ctext]);
    }
}
