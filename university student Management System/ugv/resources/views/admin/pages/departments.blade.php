@extends('admin.layouts.master')

@section('main-container')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title">Departments</h3>
        
        
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
                
              <h4 class="card-title" >All Departmenrts</h4>
              
          </div>
        </div>
 
      </div>

      
      <div class="table-responsive" style="overflow: auto; max-height: 70vh; text-align:center;">
        <table class=" table-striped table-bordered" style="width: 90%; margin: 0 auto; ">
            <thead>
                <tr>
                  <th>Department Code</th>
                  <th>Department Name</th>
                  <th> Total Students </th>
                  <th> Total Teachers </th>
                </tr>
            </thead>
          <tbody>
            @foreach($data as $key=>$data)
            <tr style="width: 100%; "> 
              <td style="text-align: center; padding: 4px 0;">{{$data->dptcode}}</td>
              <td style="text-align: center; padding: 4px 0;">{{$data->dptname}}</td>
              <td style="text-align: center; padding: 4px 0;">{{$data->totalstudents}}</td>
              <td style="text-align: center; padding: 4px 0;">{{$data->totalteachers}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div> 

      </div><br>

      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="color: blue;">Add Departments</h4>
              
              <form class="form-sample" action="/admin/departments/add" method="POST">
                {{csrf_field()}}
               
                 <div class="row">  
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Department Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" required style="background-color: white; color:black;" />

                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Department Code</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="code" required style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                  </div>
    
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            
                            <div class="col-sm-12">
                              <input type="submit" class="btn btn-primary btn-lg btn-block"  value="Add Department">
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
