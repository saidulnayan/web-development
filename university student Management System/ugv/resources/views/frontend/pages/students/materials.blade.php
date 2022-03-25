@extends('frontend.layouts.student_master')

@section('main-container')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title">Study Materials</h3>
        
        <br>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/students" style="text-decoration: none;">Students</a></li>
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
              <h4 class="card-title" style="color: blue;">Search Materials</h4>
              
              

              <form class="form-sample" action="/students/materials/search" method="POST" >
                {{csrf_field()}}
                 <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Semester</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="semester" required id="sems" style="background-color: white; color:black;" onchange="this.form.submit()">
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
                    <div class="col-md-5">
                     <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Subject</label>
                      <div class="col-sm-9" >
                        <select class="form-control" name="subcode" id="subcodes" style="background-color: white; color:black;">
                          <option selected="true" disabled="disabled"></option> 
                         
                          @foreach($sdata as $key=>$data)
                          <option value="{{$data->coursecode}}">{{$data->coursecode.' - '}}{{$data->coursename}} </option>
                            <script>var semid = "{{$data->semester}}";</script>
                          @endforeach
                        </select>
                        
                      </div>
                     </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group row">
                          <div class="col-sm-12">
                             
                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Search">
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

    {{-- <script>

        $( "form" ).on( "change", function( event ) {
            event.preventDefault();
            console.log( $(this).serialize() );
    
            var datas = $(this).serialize();
            
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            jQuery.ajax({
            type: "POST",
            url: "/students/materials/search",
            data: datas,
            error: (error) => {
                         console.log(JSON.stringify(error));
            },
            dataType: 'json',
            success: function (response){
                console.log(response);            
               
                }
    
            });
    
        });
          
        document.getElementById("sbtn").onclick = function() {
            var sems = document.getElementById('sems').value;
            var subcodes = document.getElementById('subcodes').value;
        
            var hrfs = '/students/materials/'+sems+'/'+subcodes+'/download';
        
            document.getElementById("sbtn").href=hrfs; 
        return false;
        };

        
    </script> --}}

    <script>
       // var semid = document.getElementById("semid");
        var x = document.getElementById('sems');
        
        if(x[0].value == semid){  $('#sems option[value="1st"]').attr("selected", "selected");}
        if(x[1].value == semid){  $('#sems option[value="2nd"]').attr("selected", "selected");}
        if(x[2].value == semid){  $('#sems option[value="3rd"]').attr("selected", "selected");}
        if(x[3].value == semid){  $('#sems option[value="4th"]').attr("selected", "selected");}
        if(x[4].value == semid){  $('#sems option[value="5th"]').attr("selected", "selected");}
        if(x[5].value == semid){  $('#sems option[value="6th"]').attr("selected", "selected");}
        if(x[6].value == semid){  $('#sems option[value="7th"]').attr("selected", "selected");}
        if(x[7].value == semid){  $('#sems option[value="8th"]').attr("selected", "selected");}
    </script>
    
   
    <!-- content-wrapper ends -->
@endsection
