@extends('admin.layouts.master')

@section('main-container')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title">Notice Board</h3>
        
        <br>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin" style="text-decoration: none;">Teacher</a></li>
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
              <h4 class="card-title" style="color: blue;">Publish Notice</h4>
              
              

              <form class="form-sample" action="/admin/notice/upload" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                          <input type="text" name="title" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Issue Date</label>
                        <div class="col-sm-9">
                          <input type="text" name="date" placeholder="dd/mm/yyyy" required class="form-control" style="background-color: white; color:black;"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Upload Image</label>
                        <div class="col-sm-9">
  
                          <input type="file" name="photo" class="form-control" style="height: 50px;" required>  
  
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                              <textarea class="form-control" name="about" rows="3" style="background-color: white; color:black;"></textarea>                        </div>
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
      <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
             
            <h4 class="card-title" >All Notice</h4>
            
        </div>
      </div>
    </div>
      </div>
        <div class="table-responsive" style="overflow: auto; max-height: 70vh; text-align:center;">
            <table class=" table-striped table-bordered" style="width: 90%; margin: 0 auto; border-spacing: 10px 0;">
                <thead>
                    <tr>
                      <th>About </th>
                      <th>Title</th> 
                      <th>Published Date</th>
                      <th>Delete</th>
                    </tr>
                </thead>
              <tbody>
    
                @foreach($data as $key=>$data)
                <tr style="width: 100%; "> 
                  <td style="text-align: center; padding: 10px 0; max-width: 15%;"><img src="{{asset('images/notice/'.$data->photo)}}" alt="image" style="width: 12%; height: 15%; margin: 0 auto;" onclick="window.open(this.src, '_blank');"/></td>
                  <td style="text-align: center; padding: 10px 0;">{{$data->title}}</td>
                  <td style="text-align: center; padding: 10px 0;">{{$data->date}}</td>
                  <td style="text-align: center; padding: 10px 0;"><a href="/admin/notice/{{$data->id}}/delete" style="text-decoration: none; color: white;" ><button class="badge badge-danger">Delete</button></a></td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>


    </div>
    
   
    <!-- content-wrapper ends -->
@endsection
