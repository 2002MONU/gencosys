@extends('admin.layout.main')
@section('title') Student Registration details  @endsection
@section('maindashboard')

  <!-- App hero header starts -->
     <div class="app-hero-header d-flex align-items-center">
       
        <!-- Breadcrumb starts -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
            <a href="{{route('admin.dashboard')}}">Home</a>
          </li>
          <li class="breadcrumb-item text-primary" aria-current="page">
          @yield('title')
          </li>
        </ol>
        <!-- Breadcrumb ends -->
       </div>
      <!-- App Hero header ends -->
   <!-- App body starts -->
   <div class="app-body">
    @if(session('success'))
    <div class="alert bg-success text-white alert-dismissible fade show" role="alert">
        {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <!-- Row starts -->
    <div class="row gx-3">
      <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title"> @yield('title')</h5>
              </div>
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th> Student Name </th>
                    <th> Email </th>
                    <th> Mobile </th>
                    <th> Course Name </th>
                    <th>Course Thumbnail (Image)  </th>
                    <th>Brief Introduction </th>
                    <th>Course Fees</th>
                    <th>Created</th>
                   </tr>
                </thead>
                  <tbody>
                    @foreach ($registerStudent as $index)
                       <tr>
                        <td>{{ $loop->iteration }}</td>
                            <td>{{ $index->first_name.' '.$index->last_name }}</td>
                            <td>{{ $index->email }}</td>
                            <td>{{ $index->mobile }}</td>
                            <td>{{ $index->course->name }}</td>
                            <td>
                              <a href="{{ asset('images/courses/' . $index->course->thumbnail) }}" target="_blank">
                                  <img src="{{ asset('images/courses/' . $index->course->thumbnail) }}" style="width:80px; height:80px; margin-right: 5px;">
                              </a>
                              </td>
                            <td> {{ $index->course->brief }}</td>
                            <td> {{ $index->course->fees }}</td>
                            
                            <td>{{ $index->created_at->format('d M Y h:i a') }}</td>
                            
                        </tr>
                        @endforeach
                  </tbody>
              </table>
            </div>
            <!-- Table ends -->

           
          </div>
        </div>
      </div>
    </div>
    <!-- Row ends -->

  </div>
  <!-- App body ends -->
@endsection