<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href={{asset("backend/images/favicon.png")}} />
    <title>Sosa Santa Restaurant</title>
<!--
    
TemplateMo 558 Klassy Cafe

-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href={{asset("backend/vendors/mdi/css/materialdesignicons.min.css")}}>

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/templatemo-klassy-cafe.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/lightbox.css')}}">
    
    </head>
    
    <body>
        
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#top" class="logo">
                            <img src="{{asset('frontend/images/klassy-logo.png')}}">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav ">
                            {{-- <li class="scroll-to-section"><a href="#top" class="active">Home</a></li> --}}
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>
                            <li class="scroll-to-section"><a href="#offers">Offers</a></li>
                            <li style="position: relative;">
                                
                                <a href= "{{url('/home/cart')}}">
                                    <i class="mdi mdi-cart md-4" style="font-size: 30px"></i>
                                    @if($cart)<span class="count bg-danger" id="cartno" style="width: auto; ">{{$cart->cartcount}}</span>@endif
                                </a>
                                
                            </li> 
                            {{-- <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li> --}}
                            <li>
                                @if (Route::has('login'))
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <li>
                                            <x-app-layout>

                                            </x-app-layout> 
                                            
                                        </li>
                                @else
                                        <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                        @endif
                                    @endauth
                                    </div>
                                @endif
            
                            </li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span></span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div id="dbox" style="width: 250px; height: 50px; text-align:center; padding-top: 10px; z-index:99; background-color: rgb(243, 114, 114); border: 1px solid rgba(245, 17, 245, 0); color: black; position: fixed; top: 15%; left: 40%; font-weight:bold; display: none;">
    
    </div>
    <!-- ***** Header Area End ***** -->