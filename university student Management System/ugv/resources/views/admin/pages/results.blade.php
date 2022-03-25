@extends('admin.layouts.master')

@section('main-container')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title">Results</h3>
        
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
                
              <h4 class="card-title" >All Results</h4><br>
    
            </div>
          </div>
 
        </div>
      </div>

        
        <div class="table-responsive" style="overflow: auto; max-height: 70vh; text-align:center;">
        <table class=" table-striped table-bordered" style="width: 90%; margin: 0 auto; ">
            <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Student Details</th>
                  <th> Subject </th>
                  <th> Exam Type </th>
                  <th> GPA </th>
                  <th> Letter </th>
                </tr>
            </thead>
          <tbody>

            @foreach($data as $key=>$data)
            <tr style="width: 100%; "> 
              <td style="text-align: center; padding: 4px 0;">{{$data->studentid}}<br>{{$data->studentname}}</td>
              <td style="text-align: center; padding: 4px 0;">{{$data->dept}} - {{$data->sem}} sem {{$data->category}} </td>
              <td style="text-align: center; padding: 4px 0;">{{$data->subname}}<br>{{$data->subcode}}</td>
              <td style="text-align: center; padding: 4px 0;">{{$data->examtype}}</td>
              <td style="text-align: center; padding: 4px 0;">{{$data->gpa}}</td>
              <td style="text-align: center; padding: 4px 0;">{{$data->letter}}</td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div> <br>

      <div class="row" >
        <div class="col-md-6" style="margin: 0 auto; text-align:center;">
          <div class="form-group row" >
            
            <div class="col-sm-8" >
                <a href="/admin/results/publish" style="text-decoration: none;" onclick="return confirm('All Results will be Published.');"><button type="submit" class="btn btn-primary btn-lg btn-block">Publish Results</button></a>
            </div>
          </div>
        </div>
      </div>

    </div>

    
   
    <!-- content-wrapper ends -->
@endsection
