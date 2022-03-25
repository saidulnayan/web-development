@extends('admin.layouts.master')

@section('main-container')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title">Teachers </h3>
        
        
        <br>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin" style="text-decoration: none;">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pages</li>
          </ol>
        </nav>
      </div>

      <div class="page-header">
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
      </div>

      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="color: blue;">Add Teachers</h4>

              <form class="form-sample" action="/admin/teachers/add" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">  
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Teacher Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="teachername" required style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="email" required style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                          <input type="text" name="phone" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                          <input type="text" name="address" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Country</label>
                      <div class="col-sm-9" >
                        <input type="text" class="form-control" name="country" required style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Department</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="dept" required id="deptid" style="background-color: white; color:black;">
                          <option selected="true" disabled="disabled"></option>
                          @foreach($data as $key=>$data)
                          <option value="{{$data->dptcode}}">{{$data->dptcode}}</option>
                          
                          @endforeach
                          
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Post</label>
                        <div class="col-sm-9">
                          <input type="text" name="post" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Starting Salary</label>
                        <div class="col-sm-9">
                          <input type="text" name="strsalary" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Teacher ID</label>
                        <div class="col-sm-9">
                          <input type="text" id="tid" name="teacherid" required readonly class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Joining Date</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="joiningdate" required placeholder="dd/mm/yyyy" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                          <input type="file" name="photo" class="form-control" style="height: 50px;" required>  
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NID</label>
                        <div class="col-sm-9" >
                          <input type="text" class="form-control" name="nid" required style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Graduation</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="graduation" rows="4" style="background-color: white; color:black;"></textarea>                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Especiality</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="especiality" rows="4" style="background-color: white; color:black;"></textarea>                        </div>
                        </div>
                      </div>
                  </div>
                  
                  <br/>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      
                      <div class="col-sm-12">
                        <input type="submit" class="btn btn-primary btn-lg btn-block"  value="Submit">
                      </div>
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
 
      </div>
    </div>
    
    <script>

        var ttemps = Math.floor(Math.random()*899999+100000);
        document.getElementById("tid").value=ttemps;

    </script>
   
    <!-- content-wrapper ends -->
@endsection
