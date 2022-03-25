<section class="section" id="menu">

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12 col-md-6">
            <div class="owl-menu-item owl-carousel">

                @foreach($menuitem as $key=>$data)
                
                <div class="item">
                    <div class='card' style="background-image: url('{{asset('frontend/images/'.$data->image)}}');">
                        <div class="price"><h6>${{$data->price}}</h6></div>
                        <div class="cart-icon">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-rounded btn-icon">
                                <i class="mdi mdi-cart md-4" style="font-size: 30px; cursor: pointer;"></i>
                            </a>   
                        </div>
                    
                        <div class='info'>
                          <h1 class='title' style="padding-top: 19px; padding-bottom: 16px;">{{$data->name}}</h1>
                          <p class='description' style="padding-top: 5px;">{{$data->description}}</p>
                          <div class="main-text-button" style="margin-top: 10px; margin-bottom: 10px; padding-bottom: 30px;">
                            <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            
                          </div>
                        </div>
                    
                    </div>
                </div>
                
                @endforeach
              
            </div>
        </div>
    </div>
    
</section>
