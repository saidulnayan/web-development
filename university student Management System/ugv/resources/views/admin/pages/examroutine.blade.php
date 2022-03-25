@extends('admin.layouts.master')

@section('main-container')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title">Class Routine </h3>
        
        
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
              <h4 class="card-title" style="color: blue;">Select Audience</h4>

              <form class="form-sample" action="/admin/routine/students/add" method="POST">
                {{csrf_field()}}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Department</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="dept" required id="deptid" style="background-color: white; color:black;">
                              <option selected="true" disabled="disabled"></option>
                              <option value="CSE">CSE</option>
                              <option value="EEE">EEE</option>
                              <option value="Civil">Civil</option>
                              <option value="ME">ME</option>
                              <option value="English">English</option>
                              <option value="BBA">BBA</option>
                              <option value="MBA">MBA</option>
                              
                            </select>
                          </div>
                        </div>
                      </div>
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
                  
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="category" required style="background-color: white; color:black;">
                              <option selected="true" disabled="disabled"></option>
                              <option value="Regular">Regular</option>
                              <option value="Evening">Evening</option>
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Routine Type</label>
                          <div class="col-sm-9" >
                            <input type="text" class="form-control" name="routinetype" required style="background-color: white; color:black;" value="Class Routine" readonly/>
                          </div>
                        </div>
                      </div>
                </div><br>
                <h4 class="card-title" style="color: blue;">Add Routine</h4>

                <div class="row">  
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Day</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="day" required style="background-color: white; color:black;">
                                <option selected="true" disabled="disabled"></option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
      
                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="location" required style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Starting Time</label>
                        <div class="col-sm-9">
                          <input type="text" name="strtime" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">End Time</label>
                        <div class="col-sm-9">
                          <input type="text" name="endtime" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Teacher ID</label>
                        <div class="col-sm-9">
                          <input type="text" name="teacherid" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Teacher Name</label>
                        <div class="col-sm-9">
                          <input type="text" name="teachername" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Subject Code</label>
                        <div class="col-sm-9">
                          <input type="text" name="subcode" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Subject Name</label>
                        <div class="col-sm-9">
                          <input type="text" name="subname" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                  </div>
                    <br>
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
    
   
    <!-- content-wrapper ends -->
@endsection
