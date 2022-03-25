<section class="section" id="menu">
    <audio id="audio" src="{{asset('frontend/images/message-tone.mp3')}}" autoplay="false" ></audio>
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
                <form>
                    <div class='card' style="background-image: url('{{asset('frontend/images/'.$data->image)}}');">
                        <div class="price"><h6>${{$data->price}}</h6></div>
                        <div class="cart-icon">
                            <button type="submit" class="btn btn-primary btn-rounded btn-icon">
                                <i class="mdi mdi-cart md-4" style="font-size: 30px; cursor: pointer;"></i>
                            </button>   
                        </div>
                    
                        <div class='info'>
                          <h1 class='title'>{{$data->name}}</h1>
                          <p class='description'>{{$data->description}}</p>
                          <div class="main-text-button">
                            <input type="hidden" name="foodid" value="{{$data->id}}" >
                            <input type="number" name="itemnom" style="width: 105px; height: 33px;" min="1" max="30" placeholder="Quantity" required >
                            <input type="submit" class="btn btn-primary btn-rounded" value=" Add To Cart" style="font-size:13px;">
                               
                            
                          </div>
                        </div>
                    
                    </div>
                </form>
                </div>
                
                @endforeach
              
            </div>
        </div>
    </div>
    
</section>


<script>

    $( "form" ).on( "submit", function( event ) {
        event.preventDefault();
        console.log( $(this).serialize() );
        var cotNO = this.itemnom.value;
        console.log( cotNO);

        var datas = $(this).serialize();
        

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
        type: "POST",
        url: "/menu/order",
        data: datas,
        error: (error) => {
                     console.log(JSON.stringify(error));
   },
        dataType: 'json',
        success: function (response){
            console.log(response);
            if(cotNO>0 && response.database =="true"){
                
                document.getElementById('dbox').innerText = response.success;
                document.getElementById('dbox').style.display = "block";

                document.getElementById('cartno').innerText = response.cartNOs;
                var sound = document.getElementById("audio");
                sound.play();
                document.getElementById('cartno').style.color = "white";
                
                $('[name="itemnom"]').val('');
                $("#dbox").delay(3200).fadeOut(300);
               

                }
            
           
            }

        });

    });

    // if(document.getElementById('cartno').innerText<=0){
        
    //     document.getElementById('cartno').style.color = "#fb5849";
    // }
    // if(document.getElementById('cartno').innerText > 0){
    //     document.getElementById('cartno').style.color = "white";
    // }

    


</script>