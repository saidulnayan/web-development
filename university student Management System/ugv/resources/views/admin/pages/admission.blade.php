@extends('admin.layouts.master')

@section('main-container')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title"> Student Admission</h3>
        
        
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
              <h4 class="card-title" style="color: blue;">Add Students</h4>

              <form class="form-sample" action="/admin/admission/students/add" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">  
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">First Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="firstname" required style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Last Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="lastname" required style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gender</label>
                      <div class="col-sm-9" >
                        <select class="form-control" name="gender" required style="background-color: white; color:black;">
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date of Birth</label>
                      <div class="col-sm-9">
                        <input class="form-control" name="birth" required placeholder="dd/mm/yyyy" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Depertment</label>
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
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Section</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="section"  id="sec1" value="A" checked> Section  A </label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="section" id="sec2" value="B"> Section  B </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Session</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="session" required style="background-color: white; color:black;">
                          <option selected="true" disabled="disabled"></option>
                          <option value="Summer">Summer</option>
                          <option value="Winter">Winter</option>
                          
                        </select>
                        <input type="text" name="year" id="year" hidden/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Category</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="category" id="category1" value="Regular" checked>Regular</label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="category" id="category2" value="Evening">Evening</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" name="address" required class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" name="studentphone" required class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" name="studentemail" required class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NID Number </label>
                      <div class="col-sm-9">
                        <input type="text" name="nid" required class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gurdian Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="parentname" required class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gurdian Phone</label>
                      <div class="col-sm-9">
                        <input type="text" name="parrentphone" required class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gurdian Relation</label>
                      <div class="col-sm-9">
                        <input type="text" name="relation" required class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gurdian Email</label>
                      <div class="col-sm-9">
                        <input type="text" name="parentemail" class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gurdian Address</label>
                      <div class="col-sm-9">
                        <input type="text" name="parentaddress" class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gurdian Occupation</label>
                      <div class="col-sm-9">
                        <input type="text" name="occupation" class="form-control" style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Semester Fee</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="semfees" required style="background-color: white; color:black;">
                          <option selected="true" disabled="disabled"></option> 
                          <option value="3000">3000 tk  &nbsp;(90%)</option>
                          <option value="6000">6000 tk  &nbsp;(80%)</option>
                          <option value="9000">9000 tk  &nbsp;(70%)</option>
                          <option value="12000">12000 tk  &nbsp;(60%)</option>
                          <option value="15000">15000 tk  &nbsp;(50%)</option>
                          <option value="18000">18000 tk  &nbsp;(40%)</option>
                          <option value="21000">21000 tk  &nbsp;(30%)</option>
                          <option value="24000">24000 tk  &nbsp;(20%)</option>
                          <option value="27000">27000 tk  &nbsp;(10%)</option>
                          <option value="30000">30000 tk  &nbsp;(0%)</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Exam Fee</label>
                      <div class="col-sm-9">
                        <input type="text" name="examfees" required class="form-control" value="3000" readonly style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Student Id</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" required id="sid" name="studentid" style="background-color: white; color:black;" readonly/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Registration No</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="rid" name="regno" required style="background-color: white; color:black;" readonly/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gurdian Id</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="gid" name="parrentid" required style="background-color: white; color:black;" readonly/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Country</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="country"  style="background-color: white; color:black;"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Student Image</label>
                      <div class="col-sm-9">

                        <input type="file" name="photo" class="form-control" style="height: 50px;" required>  

                        {{-- <input type="text" class="form-control" style="background-color: white; color:black;"/> --}}
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
<script>
  var temps = Math.floor(Math.random()*899999+100000);
  var tempr = Math.floor(Math.random()*89999999999+10000000000);
  var tempg = Math.floor(Math.random()*899999+100000);

  let date =  new Date().getFullYear();

  document.getElementById("sid").value=temps;
  document.getElementById("rid").value=tempr;
  document.getElementById("gid").value=tempg;
  document.getElementById("year").value=date;

  </script>

    {{-- <script>

      const CSE = 1;
      const EEE = 2;
      const Civil = 3;
      const ME = 4;
      const English = 5;
      const BBA = 6;
      const MBA = 7;

      const CSEid = 001;
      const EEEid = 001;
      const Civilid = 001;
      const MEid = 001;
      const Englishid = 001;
      const BBAid = 001;
      const MBAid = 001;

      const d = new Date();
      let year = d.getFullYear();
      const last2Str = String(year).slice(-2);

      var sel = document.getElementById('deptid');
      var el = sel.concat("id");
      var pl = el

      let mainid = sel.concat(last2Str, el);



      
    </script> --}}
   
    <!-- content-wrapper ends -->
@endsection
