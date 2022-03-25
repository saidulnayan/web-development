
    <div id="top">
    @if(Session::has('success'))
        <div style="width: 250px; text-align: center; margin: 0 auto;background: green; color: white; border: 1px solid gray; font-weight: bold; padding: 6px;">{{Session::get('success')}}</div>
        @endif

        @if ($errors->any())
        <div style="width: 300px; text-align: center; margin: 0 auto; background: red; color: black; border: 1px solid gray; font-weight: bold; padding: 6px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>KlassyCafe</h4>
                            <h6>THE BEST EXPERIENCE</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="#reservation">Make A Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">

                            @foreach($sliderphoto as $key=>$data)
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="{{asset('frontend/images/'.$data->image)}}" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          @endforeach
                          

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
