@extends('frontend.layouts.teacher_master')

@section('main-container')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title">Student Results</h3>
        
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
              <h4 class="card-title" style="color: blue;"><a href="/teachers/home">Go Back</a></h4>
                
              <h4 class="card-title" >Select Classes</h4>
              
          </div>
        </div>
 
      </div>
      </div>
      
      <div class="table-responsive" style="overflow: auto; max-height: 70vh; text-align:center;">
        <table class=" table-striped table-bordered" style="width: 90%; margin: 0 auto; border-spacing: 10px 0;">
            <thead>
                <tr>
                  <th>Subject Name</th>
                  <th>semester</th>
                  <th>Category </th>
                  <th>Mid Marks</th>
                  <th>Final Marks</th>
                </tr>
            </thead>
          <tbody>

            @foreach($data as $key=>$data)
            <tr style="width: 100%; "> 
              <td style="text-align: center; padding: 10px 0;">{{$data->coursename}} - {{$data->coursecode}}</td>
              <td style="text-align: center; padding: 10px 0;">{{$data->dept}} - {{$data->semester}}</td>
              <td style="text-align: center; padding: 10px 0;">{{$data->category}}</td>
              <td style="text-align: center; padding: 10px 0;"><a href="/teachers/results/mid/{{$data->id}}/upload" style="text-decoration: none; color: white;" ><button class="badge badge-primary">Upload</button></a></td>
              <td style="text-align: center; padding: 10px 0;"><a href="/teachers/results/final/{{$data->id}}/upload" style="text-decoration: none; color: white;" ><button class="badge badge-primary">Upload</button></a></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div> 

    </div>

    
   
    <!-- content-wrapper ends -->
@endsection
