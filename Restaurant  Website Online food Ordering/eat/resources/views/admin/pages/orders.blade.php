@extends('admin.layouts.master')

@section('main-container')

<div class="main-panel">
    <div class="content-wrapper">
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
        <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Orders</h4>
                  <div class="table-responsive" style="overflow: auto; max-height: 90vh;">
                    <table class="table">
                      <thead style="position: sticky; top: 0; background-color: white; z-index: 1;">
                        <tr style="height: auto;">
                          <th>
                            <div class="form-check form-check-muted m-0">
                              <label class="form-check-label">
                                <p class="form-check-input">Mark</p>
                              </label>
                            </div>
                          </th>
                          <th> Name </th>
                          <th>Order ID</th>
                          <th> Products </th>
                          <th> Cost </th>
                          <th> Address </th>
                          <th> Payment </th>
                          <th> Email </th>
                          <th style="text-align: center;"> Accept </th>
                          <th> Cancel </th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        <form action="/orders/status/update" class="form-container" method="POST">
                            {{csrf_field()}}
                        @foreach($rdata as $key=>$data)
                            
                            <tr style="height: auto;">
                            <td>
                                <div class="form-check form-check-muted m-0" style="{{$data->mrks}}" >
                                <label class="form-check-label">
                                    <input id="{{++$key}}" type="checkbox"  class="form-check-input"  onclick="setck(this);" value="{{$data->mark}}"  {{$data->mark}} name="{{'mark'.$key}}">
                                </label>
                                </div>
                            </td>
                            <script>var Io = {{$key}};</script>
                            <td> {{$data->name}} </td>
                            <td>0{{$data->orderid}}</td>
                            <td style="max-width: 250px; max-height: auto; white-space: nowrap;
                            overflow: hidden; text-overflow: ellipsis;" onclick="isEllipsisActive(this);"> {{$data->product}} </td>
                            <td> {{$data->cost}} </td>
                            <td style="max-width: 170px; max-height: auto; white-space: nowrap;
                            overflow: hidden; text-overflow: ellipsis;" onclick="isEllipsisActive(this);"> {{$data->address}} </td>
                            <td> {{$data->payment}} </td>                          
                            <td>
                                <a href="/orders/email/{{$data->id}}" style="text-decoration: none; color: green"><div class="badge badge-outline-primary">Email</div></a>
                            </td>
                            <td>
                                <div class="badge badge-outline-success" style=" color: green; border: none; {{$data->disable}}"><input type="text" readonly class="btn btn-success btn-sm" style="color: green; background-color: #191C24; width: 75px; padding: 7.5px;" onclick="setrole(this);" value="{{$data->accept}}" name="{{"Accept".$key}}"></div>
                            </td>
                            <td>
                                <a href="/orders/delete/{{$data->id}}" style="text-decoration: none; color: red" onclick="return confirm('Are You Sure You Want To Delete?');"><div class="badge badge-outline-danger">Delete</div></a>
                            </td>
                            </tr>
                            <input type="hidden" value="{{$data->id}}" name="{{"cid".$key}}">

                        @endforeach
                        
                      </tbody>
                    </table>
                  </div><br>
                  <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="setmark();" style="" value="Save Changes">
                </form>
                </div>
              </div>
            </div>
        </div>
    </div>
<script>
    
function isEllipsisActive(e) {
     if (e.offsetWidth < e.scrollWidth){
        var msg = e.innerHTML;
        alert(msg);
     }
}

function setrole(e) {
    
    if(e.value == "Accepted"){
        e.value = "Accept";
        e.classList.add('btn');
        e.classList.add('btn-sm');
        e.classList.add('btn-success');
        e.style.border = "1px solid green";
    }
    else{
    e.value = "Accepted";
    e.classList.remove('btn');
    e.classList.remove('btn-sm');
    e.classList.remove('btn-success');
    e.style.border = "none";
    }
         
}

function setck(e) {
 
    if(e.checked){
      e.value = "checked"
    }
    else{
      e.value = "check";
    }
         
}

function setmark(){
  for (let i = 1; i <= Io; i++) { 
    if(document.getElementById('i').checked){
      document.getElementById('i').value="checked"
  }
}
}

</script>
    

@endsection