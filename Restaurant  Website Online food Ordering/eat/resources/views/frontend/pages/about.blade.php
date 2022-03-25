<section class="section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="left-text-content">

                    @if($abouttext)
                    <div class="section-heading">
                        <h6>About Us</h6>
                        <h2>{{$abouttext->about_title}}</h2>
                    </div>
                    <p>{{$abouttext->about_text}}</p>
                    @endif
                    <div class="row">

                        @foreach($aboutphoto as $key=>$data)
                        <div class="col-4">
                            <img src="{{asset('frontend/images/'.$data->image)}}" alt="">
                        </div>
                        @endforeach

                        
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="right-content">
                    <div class="thumb">
                        <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                        <img src="{{asset('frontend/images/about-video-bg.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>