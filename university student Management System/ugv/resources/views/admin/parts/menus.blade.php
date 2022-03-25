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
              <h4 class="card-title">Menu Items</h4>
              <p class="card-description">/ Images<code></code></p>
              
              <div class="table-responsive" style="overflow: auto; max-height: 90vh;">
                <table class=" table-striped">
                  <thead>
                    <tr>
                      <th> Image </th>
                      <th style="text-align: left; max-width: 200px;"> Name </th>
                      <th style="text-align: left;"> Description </th>
                      <th style="text-align: center;"> Price </th>
                      <th style="text-align: center;"> Edit </th>
                      <th style="text-align: center;"> Delete </th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($photos as $key=>$data)
                    <tr> 
                      <td  style="width: 20%; height: 20%; ">
                        <img src="{{asset('frontend/images/'.$data->image)}}" alt="image" style="width: 60%; height: 30%; "/>
                      </td>
                      <td style="text-align: left;">{{$data->name}}</td>
                      <td style="text-align: left; max-width: 220px; max-height: 160px; white-space: nowrap;
                      overflow: hidden; text-overflow: ellipsis;">{{$data->description}}</td>
                      <td style="text-align: center;">{{$data->price}}</td>
                      <td style="text-align: center;"><a href="/pages/menu/{{$data->id}}/edit" style="text-decoration: none; color: white;"><button class="badge badge-success">&nbsp; Edit &nbsp;</button></a></td>
                      <td style="text-align: center;"><a href="/pages/menu/{{$data->id}}/delete" style="text-decoration: none; color: white;" onclick="return confirm('Are You Sure You Want To Delete?');"><button class="badge badge-danger">Delete</button></a></td>
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
                  <h4 class="card-title">Add Menu</h4>
                  <p class="card-description">/ Upload</p>

                  <div class="form-group">
                  <form action="/pages/menu/add" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Food Name</label>
                        <input type="text" class="form-control" name="name" style="color: white;">
                      </div>
                      
                      
    
    
                      <div class="form-group">
                        <label for="name">Food Price</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">$</span>
                          </div>
                          <input type="number" class="form-control" min="0" max="1200" step="any" name="price" style="color: white;">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </div>
    
                    
    
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" rows="4" style="color: white;"></textarea>
                      </div>

                    <label for="image">Upload Image</label>
                    <input type="file" name="image" class="form-control" style="height: 50px;" required><br>  
                    <input type="submit" class="btn btn-primary btn-lg btn-block" style="" value="Add Menu">
    
                  </form>
                </div>

                    
                </div>
              </div>
            </div>  
        </div>
    </div>
   
    <!-- content-wrapper ends -->
@endsection
