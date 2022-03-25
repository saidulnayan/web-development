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
              <h4 class="card-title">Home Slider</h4>
              <p class="card-description">/ Images<code></code></p>
              
              <div class="table-responsive">
                <table class=" table-striped">
                  <thead>
                    <tr>
                      <th> Image </th>
                      <th style="text-align: center;"> Id </th>
                      <th style="text-align: center;"> Edit </th>
                      <th style="text-align: center;"> Delete </th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($photos as $key=>$data)
                    <tr> 
                      <td  style="width: 25%; height: 25%; ">
                        <img src="{{asset('frontend/images/'.$data->image)}}" alt="image" style="width: 65%; height: 70%; "/>
                      </td>
                      <td style="text-align: center;">{{$data->id}}</td>
                      <td style="text-align: center;"><a href="" style="text-decoration: none; color: white;" onclick="return confirm('Why to Edit? Delete Directly!');"><button class="badge badge-success">&nbsp; Edit &nbsp;</button></a></td>
                      <td style="text-align: center;"><a href="/pages/slider/image/delete/{{$data->id}}" style="text-decoration: none; color: white;" onclick="return confirm('Are You Sure You Want To Delete?');"><button class="badge badge-danger">Delete</button></a></td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <br>
              <div class="form-group">
                <label>Image upload</label>
              <form action="/pages/slider/image/upload" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
              
                <input type="file" name="image" class="form-control" style="height: 50px;" required><br>  
                <input type="submit" class="btn btn-primary btn-lg btn-block" style="" value="Add Image">

              </form>
            </div>

            </div>
            
          </div>
        </div>

        
        </div>
    </div>
   
    <!-- content-wrapper ends -->
@endsection
