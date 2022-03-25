@extends('frontend.layouts.carts.master')

@section('cart-container')

<!-- partial -->
<div class="main-panel" >
    <div class="content-wrapper" style="background-color: white; color:black;">

      <div class="page-header">
        <h3 class="page-title" style="color:black;"> My Cart</h3>
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

        <br>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home" style="text-decoration: none;">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
          </ol>
        </nav>
      </div>

      <div class="row" >
   
        <div class="col-lg-12 grid-margin stretch-card"  >
          <div class="card" style="background-color: white;">
            <div class="card-body" >
              <h4 class="card-title" style="color:black;">Cart Items</h4>
              <p class="card-description"><code></code></p>
              
              <div class="table-responsive">
                <table class=" table">
                  <thead>
                    <tr >
                      <th style="width: 90px;font-size: 18px; color:black;">Mark</th>
   
                      <th style="font-size: 18px; color:black;"> Image </th>
                      
                      <th style="text-align: left;font-size: 18px; color:black;"> Description </th>
                      <th style="text-align: center;font-size: 18px; color:black;"> Price </th>
                      <th style="text-align: center;font-size: 18px; color:black;"> Quantity </th>
                      <th style="text-align: center;font-size: 18px; color:black;"> Action </th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($data as $key=>$data)
                    <form action="/cart/update" method="POST">
                      {{csrf_field()}}
                    <tr> 
                      <td >
                        <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"  name="ckbox" value="{{$data->id}}">
                        </label>
                        </div>
                    </td>
                      <td  style="width: 20%; height: 20%; ">
                        <img src="{{asset('frontend/images/'.$data->image)}}" alt="image" style="width: 60%; height: 30%; border-radius: 0;"/>
                        <input type="hidden" name="orderid" value="{{$data->id}}">
                       
                      </td>
                      
                      <td style="text-align: left; max-width: 200px; white-space: nowrap; height:auto;
                      overflow: hidden;"><h4 style="color:cyan;">{{$data->name}}{{$data->id}}</h4><br><p style="">{!!$data->description!!}<p></td>
                      <td style="text-align: center; font-size:18px; color:white;">{{$data->price}}</td>
                      <td style="text-align: center; vertical-align:middle;">
                        
                        <input type="submit"  value="Dn" name="Min"/>
                        {{-- <label for="Min" style=" padding: 1px; display: inline-block; position: relative; margin: 1px; cursor: pointer;" onclick="document.getElementById('action').value = $(this).attr('for');"><img src="{{asset('frontend/images/minus.png')}}" style="height: 20px; width: 20px;" id="submit"/></label> --}}
                            <input id="{{$data->id}}" name="qntyc"  style="width: 45px; height: 25px; font-weight:bold;" type="number" min="1" max="30" value="{{$data->qnty}}" readonly>
                        <input type="submit" value="Up" name="Max"/>
                        {{-- <label for="Max" style="padding: 1px; display: inline-block; position: relative; margin: 1px; cursor: pointer;" onclick="document.getElementById('action').value = $(this).attr('for');"><img src="{{asset('frontend/images/plus.png')}}" style="height: 20px; width: 20px;" id="submit"/></label> --}}
                        
                      </td>
                      <td style="text-align: center;"><a href="/cart/{{$data->id}}/delete" style="text-decoration: none; color: white;" onclick="return confirm('Are You Sure You Want To Delete?');"><i class="mdi mdi-delete" style="font-size: 30px; color:crimson;"></i></a></td>
                    </tr>
                    </form>
                    @endforeach
                    
                  </tbody>
                </table>
              </div> 
              <br><hr style="background-color: white; height:0.8px;"><br>             
              @if($sumprice)<h3 style="padding-left: 50px;">Order Details<span style="padding-left: 35%; font-size:18px;">Total Amount: &nbsp;&nbsp;&nbsp; <span id="totalpric" style="color: crimson; font-weight:bold;"> {{ $sumprice}} </span> $ </span></h3>@endif
              <a href="/cart/checkout" id="toi"><button type="button"  style="margin-left: 75%; position:relative; bottom: 43px; " class="btn btn-social-icon-text btn-dribbble"><i class="mdi mdi-amazon"></i><b>Check Out</b></button></a>
            </div>
            
          </div>
        </div>        
        </div>
    </div>
   
    <!-- content-wrapper ends -->
@endsection


<script>
window.onload = function(){
if(document.getElementById('ctno').innerText <= 0){
    
    document.getElementById('toi').style.display = 'none';
  }
};
</script> 
    {{-- $('#form').on( "submit", function( event ) {
    
      event.preventDefault();
      console.log( $(this).serialize());
      var cotNO = this.qntyc.value;
      var inid = this.orderid.value;

      var datas = $(this).serialize();

      $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      jQuery.ajax({
      type: "POST",
      url: "/cart/update",
      data: datas,
      error: (error) => {console.log(JSON.stringify(error));},
      // dataType: 'json',
      success: function (response){
          console.log(response);
          if(cotNO>0 && response.database =="true"){

              document.getElementById('totalpric').innerText = response.sumprice;
              document.getElementById('usercartno').innerText = response.cartcnt;
              document.getElementById(inid).value = response.minqnty;
                      
              }      
          }

      });

  }); --}}