<!-- ***** Footer Start ***** -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <div class="right-text-content">
                        <ul class="social-icons">
                            @if($contacts)
                            <li><a href="https://www.{{$contacts->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.{{$contacts->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.{{$contacts->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.{{$contacts->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            @endif
                        </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="logo">
                    <a href="http://127.0.0.1:8000/home"><img src="{{asset('frontend/images/white-logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-12">
                <div class="left-text-content">
                    <p>© Copyright Klassy Cafe Co.
                    
                    <br>Design: TemplateMo</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="{{asset('frontend/js/jquery-2.1.0.min.js')}}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
<!-- Bootstrap -->
<script src="{{asset('frontend/js/popper.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

<!-- Plugins -->
<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
<script src="{{asset('frontend/js/accordions.js')}}"></script>
<script src="{{asset('frontend/js/datepicker.js')}}"></script>
<script src="{{asset('frontend/js/scrollreveal.min.js')}}"></script>
<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('frontend/js/imgfix.min.js')}}"></script> 
<script src="{{asset('frontend/js/slick.js')}}"></script> 
<script src="{{asset('frontend/js/lightbox.js')}}"></script> 
<script src="{{asset('frontend/js/isotope.js')}}"></script> 

<!-- Global Init -->
<script src="{{asset('frontend/js/custom.js')}}"></script>
<script>

    $(function() {
        var selectedClass = "";
        $("p").click(function(){
        selectedClass = $(this).attr("data-rel");
        $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut();
        setTimeout(function() {
          $("."+selectedClass).fadeIn();
          $("#portfolio").fadeTo(50, 1);
        }, 500);
            
        });
    });


</script>
</body>
</html>