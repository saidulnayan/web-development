@extends('admin.layouts.master')

@section('main-container')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title"> Frontend Pages</h3>
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

        <br>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000" style="text-decoration: none;">http://127.0.0.1:8000</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pages</li>
          </ol>
        </nav>
      </div>

      <div class="row">
   
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Chefs Cards</h4>
              <p class="card-description">/ Images<code></code></p>
              
              <div class="table-responsive" style="overflow: auto; max-height: 90vh;">
                <table class=" table-striped">
                  <thead>
                    <tr>
                      <th> Image </th>
                      <th style="text-align: center; max-width: 200px;"> Name </th>
                      <th style="text-align: center;"> Skill </th>
                      <th style="text-align: center;"> Accounts </th>
                      
                      <th style="text-align: center;"> Edit </th>
                      <th style="text-align: center;"> Delete </th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($chefs as $key=>$data)
                    <tr> 
                      <td  style="width: 15%; height: 20%; ">
                        <img src="{{asset('frontend/images/'.$data->image)}}" alt="image" style="width: 70%; height: 40%; "/>
                      </td>
                      <td style="text-align: center;">{{$data->name}}</td>
                      <td style="text-align: center;">{{$data->skill}}</td>
                      <td style="text-align: center;">{{$data->facebook}} <br> {{$data->twitter}} <br> {{$data->instagram}}</td>
                      <td style="text-align: center;"><a href="/pages/chefs/{{$data->id}}/edit" style="text-decoration: none; color: white;"><button class="badge badge-success">&nbsp; Edit &nbsp;</button></a></td>
                      <td style="text-align: center;"><a href="/pages/chefs/{{$data->id}}/delete" style="text-decoration: none; color: white;" onclick="return confirm('Are You Sure You Want To Delete?');"><button class="badge badge-danger">Delete</button></a></td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>              

            </div>
            
          </div>
        </div>

        
        </div>

        <div class="row">
   
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Chefs</h4>
                  <p class="card-description">/ Upload</p>

                  <div class="form-group">
                  <form action="/pages/chefs/add" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Chef Name</label>
                        <input type="text" class="form-control" name="name" style="color: white;">
                      </div>
                      <div class="form-group">
                        <label for="name">Chef Skill</label>
                        <input type="text" class="form-control" name="skill" style="color: white;">
                      </div>
                      <div class="form-group">
                        <label for="name">Facebook</label>
                        <input type="text" class="form-control" name="facebook" style="color: white;">
                      </div>
                      <div class="form-group">
                        <label for="name">Twitter</label>
                        <input type="text" class="form-control" name="twitter" style="color: white;">
                      </div>
                      <div class="form-group">
                        <label for="name">Instagram</label>
                        <input type="text" class="form-control" name="instagram" style="color: white;">
                      </div>

                    <label for="image">Upload Image</label>
                    <input type="file" name="image" class="form-control" style="height: 50px;" required><br>  
                    <input type="submit" class="btn btn-primary btn-lg btn-block" style="" value="Add Chef">
    
                  </form>
                </div>

                    
                </div>
              </div>
            </div>  
        </div>
    </div>
   
    <!-- content-wrapper ends -->
@endsection
