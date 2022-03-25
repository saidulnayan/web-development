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
                  <h4 class="card-title">Reservations</h4>
                  <div class="table-responsive" style="overflow: auto; max-height: 90vh;">
                    <table class="table">
                      <thead style="position: sticky; top: 0; background-color: white; z-index: 1;">
                        <tr >
                          <th>
                            <div class="form-check form-check-muted m-0">
                              <label class="form-check-label">
                                <p class="form-check-input">Mark</p>
                              </label>
                            </div>
                          </th>
                          <th> Name </th>
                          <th> Phone </th>
                          <th> Email Address </th>
                          <th> Guests </th>
                          <th> Date </th>
                          <th> Time </th>
                          <th> Message </th>
                          <th> Feedback </th>
                          <th> Accept </th>
                          <th> Cancel </th>
                        
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($data as $data)
                            
                            <tr>
                            <td>
                                <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                </label>
                                </div>
                            </td>
                            
                            <td> {{$data->name}} </td>
                            <td> {{$data->phone}} </td>
                            <td> {{$data->email}} </td>
                            <td> {{$data->guests}} </td>
                            <td> {{$data->date}} </td>
                            <td> {{$data->time}} </td>
                            <td style="max-width: 100px; max-height: 70px; white-space: nowrap;
                            overflow: hidden; text-overflow: ellipsis;" onclick="isEllipsisActive(this);" onmouseover="pointer(this);"> {{$data->message}} </td>
                          
                            <td>
                                <div class="badge badge-outline-success"><a href="" style="text-decoration: none; color: green; pointer-events: none;">Email</a></div>
                            </td>
                            <td>
                                <div class="badge badge-outline-success"><a href="" style="text-decoration: none; color: green; pointer-events: none;">Accept</a></div>
                            </td>
                            <td>
                                <div class="badge badge-outline-danger"><a href="" style="text-decoration: none; color: red; pointer-events: none;" onclick="return confirm('Are You Sure You Want To Delete?');">Delete</a></div>
                            </td>
                            </tr>

                        @endforeach

                      </tbody>
                    </table>
                  </div><br>
                  <input type="submit" class="btn btn-primary btn-lg btn-block" style="pointer-events: none;" value="Save Changes">
                </div>
              </div>
            </div>
        </div>
    </div>

    @if(($mdata)!= 0)

<div class="form-popup" id="myForm">
  <form action="/reservations/email/{{$mdata}}/send" class="form-container" method="POST">
    {{csrf_field()}}

    <label for="subject"><b style="color: blue;">Email Subject</b></label>
    <input type="text" placeholder="Enter Subject" name="subject" required>

    <label for="title"><b style="color: blue;">Email Title</b></label>
    <input type="text" placeholder="Enter Title" name="title" required>

    <label for="email"><b style="color: blue;">Email Body</b></label>
    <textarea rows="8" cols="30" placeholder="Enter Your Text" name="e_body" required></textarea>

    <input type="submit" class="btn" value="Send">
    <a href="/reservations" style="text-decoration: none; color: white;"><button type="button" class="btn cancel">Close</button></a>
  </form>
</div>
@endif



<script>
    
function isEllipsisActive(e) {
     if (e.offsetWidth < e.scrollWidth){
        var msg = e.innerHTML;
        alert(msg);
     }
}

</script>
    

@endsection