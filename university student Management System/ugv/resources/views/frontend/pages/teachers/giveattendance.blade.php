@extends('frontend.layouts.teacher_master')

@section('main-container')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title">Give Attendance</h3>
        
        <br>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/teachers" style="text-decoration: none;">Teachers</a></li>
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
              <h4 class="card-title" style="color: blue;"><a href="/teachers/attendance">Go Back</a></h4>
                
              <h4 class="card-title" >Select Students</h4>
              
            </div>
          </div>
 
        </div>
      </div>

        
        <div class="table-responsive" style="overflow: auto; max-height: 70vh; text-align:center;">
        <table class=" table-striped table-bordered" style="width: 90%; margin: 0 auto; ">
            <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th> Details </th>
                  <th> Attendance </th>
                </tr>
            </thead>
          <tbody>
            <form action="/teachers/attendance/daily/upload" method="POST">
              {{csrf_field()}}
            @foreach($spotds as $key=>$data)
            <tr style="width: 100%; "> 
              <td style="text-align: center; padding: 4px 0;">{{$data->studentid}} <input type="hidden" name="{{$data->studentid}}" value="{{$data->studentid}}"></td>
              <td style="text-align: center; padding: 4px 0;">{{$data->studentname}} <input type="hidden" name="subcode" value="{{$data->subcode}}"></td>
              <td style="text-align: center; padding: 4px 0;">{{$data->dept}} - {{$data->semester}} sem {{$data->category}} <input type="hidden" name="sem" value="{{$data->semester}}"><input type="hidden" name="dept" value="{{$data->dept}}"><input type="hidden" name="cate" value="{{$data->category}}"></td>
              <td style="text-align: center; padding: 4px 0;"><input type="number" id="atten" name="{{'att'.++$key}}" style="background-color: white; color:black;" min="0" max="1"></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div> <br>

      <div class="row" >
        <div class="col-md-6" style="margin: 0 auto; text-align:center;">
          <div class="form-group row" >
            
            <div class="col-sm-8" >
              <input type="submit" class="btn btn-primary btn-lg btn-block"  value="Upload Attendance">
            </div>
          </div>
        </div>
      </div>

  </form>
    </div>

    
   
    <!-- content-wrapper ends -->
@endsection
