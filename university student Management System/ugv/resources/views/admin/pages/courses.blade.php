@extends('admin.layouts.master')

@section('main-container')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title">Courses </h3>
        
        
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
              <h4 class="card-title" style="color: blue;">Add Courses</h4>

              <form class="form-sample" action="/admin/courses/add" method="POST">
                {{csrf_field()}}

                <div class="row">  
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Course Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="coursename" required style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Course Code</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="coursecode" required style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Semester</label>
                      <div class="col-sm-9" >
                        <select class="form-control" name="semester" required style="background-color: white; color:black;">
                          <option selected="true" disabled="disabled"></option>
                          <option value="1st">1st</option>
                          <option value="2nd">2nd</option>
                          <option value="3rd">3rd</option>
                          <option value="4th">4th</option>
                          <option value="5th">5th</option>
                          <option value="6th">6th</option>
                          <option value="7th">7th</option>
                          <option value="8th">8th</option>

                        </select>
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
                      <label class="col-sm-3 col-form-label">Credit</label>
                      <div class="col-sm-9">
                        <input type="text" name="credit" required class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Teacher ID</label>
                      <div class="col-sm-9">
                        <input type="text" name="teacherid" required class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <br/>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Category</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="category" required id="" style="background-color: white; color:black;">
                          <option selected="true" disabled="disabled"></option>
                          <option value="Regular">Regular</option>
                          <option value="Evening">Evening</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Click</label>
                      <div class="col-sm-9">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" style="" value="Submit">
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
    
   
    <!-- content-wrapper ends -->
@endsection
