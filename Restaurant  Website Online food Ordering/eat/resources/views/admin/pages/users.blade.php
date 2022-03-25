@extends('admin.layouts.master')

@section('main-container')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Details</h4>
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
                          <th> User ID </th>
                          <th> User Name </th>
                          <th> Email Address </th>
                          <th> Connect To</th>
                          <th> Action Mode </th>
                        
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($data as $data)
                            
                            <tr>
                            <td>
                                <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="INPUT">
                                </label>
                                </div>
                            </td>
                            
                            <td> {{$data->id}} </td>
                            <td> {{$data->name}} </td>
                            <td> {{$data->email}} </td>
                            <td>
                              <a href="/users/email/{{$data->id}}" style="text-decoration: none; color: green"><div class="badge badge-outline-success">Send Email</div></a>
                            </td>
                            <td>
                              <a href="/users/delete/{{$data->id}}" style="text-decoration: none; color: red" onclick="return confirm('Are You Sure You Want To Delete?');"><div class="badge badge-outline-danger">Delete User</div></a>
                            </td>
                            </tr>

                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
<script>
    var elements = document.getElementsByTagName("INPUT");
for (var inp of elements) {
    if (inp.type === "checkbox")
        inp.checked = false;
}
    
</script>
@endsection