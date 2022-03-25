@extends('frontend.layouts.student_master')

@section('main-container')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

      <div class="page-header">
        <h3 class="page-title">Notice Board</h3>
        
        <br>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/students" style="text-decoration: none;">Students</a></li>
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
                    </tr>
                </thead>
              <tbody>
    
                @foreach($data as $key=>$data)
                <tr style="width: 100%; "> 
                  <td style="text-align: center; padding: 10px 0; max-width: 15%;"><img src="{{asset('images/notice/'.$data->photo)}}" alt="image" style="width: 12%; height: 15%; margin: 0 auto;" onclick="window.open(this.src, '_blank');"/></td>
                  <td style="text-align: center; padding: 10px 0;">{{$data->title}}</td>
                  <td style="text-align: center; padding: 10px 0;">{{$data->date}}</td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>


    </div>
    
   
    <!-- content-wrapper ends -->
@endsection
