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
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000" style="text-decoration: none;">Sosa Santa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pages</li>
          </ol>
        </nav>
      </div>


        <div class="row">
   
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Contact page</h4>
                <p class="card-description">/ Details</p>
                <br>
                <form class="forms-sample" action="/pages/contact/update" method="POST">
                  {{csrf_field()}}

                  @if($cdata)
                  <div class="form-group">
                    <label for="exampleInputName1">Title</label>
                    <input type="text" class="form-control" name="title" style="color: white;" value="{{$cdata->title}}">
                  </div>

                  <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        
                         <div class="form-group">
                            <label for="exampleInputUsername1">Phone 1</label>
                            <input type="tel" class="form-control" name="phone1" value="{{$cdata->phone1}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Phone 2</label>
                            <input type="tel" class="form-control" name="phone2" value="{{$cdata->phone2}}">
                          </div>
                         
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        
                         <div class="form-group">
                            <label for="exampleInputUsername1">Email 1</label>
                            <input type="email" class="form-control" name="email1" value="{{$cdata->email1}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email 2</label>
                            <input type="email" class="form-control" name="email2" value="{{$cdata->email2}}">
                          </div>
                         
                      </div>
                    </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        
                         <div class="form-group">
                            <label for="exampleInputUsername1">Facebook</label>
                            <input type="url" class="form-control" name="facebook" value="{{$cdata->facebook}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Twitter</label>
                            <input type="url" class="form-control" name="twitter" value="{{$cdata->twitter}}">
                          </div>
                         
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        
                         <div class="form-group">
                            <label for="exampleInputUsername1">Linkedin</label>
                            <input type="url" class="form-control" name="linkedin" value="{{$cdata->linkedin}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Instagram</label>
                            <input type="url" class="form-control" name="instagram" value="{{$cdata->instagram}}">
                          </div>
                         
                      </div>
                    </div>
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" name="description" rows="4" style="color: white;">{{$cdata->description}}</textarea>
                  </div>
                  @endif

                  <input type="submit" class="btn btn-primary mr-2" value="Submit">
                  <input type="reset" class="btn btn-warning mr-2" value=" Reset ">

                </form>
              </div>
            </div>
          </div>
  
          
          </div>

    </div>
   
    <!-- content-wrapper ends -->
@endsection
