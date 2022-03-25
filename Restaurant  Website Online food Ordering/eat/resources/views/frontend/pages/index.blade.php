@extends('frontend.layouts.master')

@section('main-container')
    
    <!-- ***** Main Banner Area Start ***** -->
    @include("frontend.pages.slider")
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    @include("frontend.pages.about")
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
    @include("frontend.pages.menu")
    <!-- ***** Menu Area Ends ***** -->

    <!-- ***** Chefs Area Starts ***** -->
    @include("frontend.pages.chefs")
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Reservation Us Area Starts ***** -->
    @include("frontend.pages.reservation")
    <!-- ***** Reservation Area Ends ***** -->

    <!-- ***** Offer Area Starts ***** -->
    @include("frontend.pages.offers")
    <!-- ***** Offer Area Ends ***** --> 
    
@endsection