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
   
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Menu</h4>
                  <p class="card-description">/ Update</p>

                  <div class="form-group">
                      @if($data)
                  <form action="/pages/menu/{{$data->id}}/update" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Food Name</label>
                        <input type="text" class="form-control" name="name" style="color: white;" value="{{$data->name}}">
                      </div>
                      
                      
    
    
                      <div class="form-group">
                        <label for="name">Food Price</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">$</span>
                          </div>
                          <input type="number" class="form-control" min="0" max="1200" step="any" name="price" style="color: white;" value="{{$data->price}}">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </div>
    
                    
    
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" rows="4" style="color: white;">{{$data->description}}</textarea>
                      </div>

                    <label for="image">Upload Image</label>
                    <input type="file" name="image" class="form-control" style="height: 50px;" required onchange="return viewImg(event)"><br>  
                    <img id="preview" src="{{asset('frontend/images/'.$data->image)}}" width="150"><br><br>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" style="" value="Add Menu">
    
                  </form>
                  @endif
                </div>

                    
                </div>
              </div>
            </div>  
        </div>
    </div>

    <script type="text/javascript">
        function viewImg(event){
          var output = document.getElementById('preview');
          output.src = URL.createObjectURL(event.target.files[0]);
        }
      </script>
   
    <!-- content-wrapper ends -->
@endsection
