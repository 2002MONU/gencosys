@extends('admin.layout.main')
@section('title') Course Details  @endsection
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
                <a href="{{route('courses.create')}}" class="btn btn-primary ms-auto">Add Course</a>
              </div>
          <div class="card-body">

            <!-- Table starts -->
            <div class="table-responsive">
              <table id="basicExample" class="table m-0 align-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th> Course Name </th>
                    <th>Course Thumbnail (Image)  </th>
                    <th>Brief Introduction </th>
                    <th>Course Fees</th>
                    <th>Status</th>
                    <th>Updated</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($courses as $index)
                       <tr>
                        <td>{{ $loop->iteration }}</td>
                            <td>{{ $index->name }}</td>
                            <td>
                              <a href="{{ asset('images/courses/' . $index->thumbnail) }}" target="_blank">
                                  <img src="{{ asset('images/courses/' . $index->thumbnail) }}" style="width:80px; height:80px; margin-right: 5px;">
                              </a>
                              </td>
                            <td> {{ $index->brief }}</td>
                            <td> {{ $index->fees }}</td>
                            <td> @if ($index->status == 1)
                              <span class="badge bg-success">Active</span>
                              @else
                              <span class="badge bg-danger">Inactive</span>
                            @endif</td>
                            <td>{{ $index->updated_at->format('d M Y h:i a') }}</td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('courses.edit', ['course' => $index->id]) }}" class="btn btn-outline-success btn-sm">
                                        <i class="ri-edit-box-line"></i>
                                    </a>
                                    <form id="delete-course-{{ $index->id }}" action="{{ route('courses.destroy', ['course' => $index->id]) }}" method="POST" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                                  </form>

                                  <!-- Delete Button -->
                                  <a href="{{ route('courses.destroy', ['course' => $index->id]) }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure? You want to Delete this row.')) { document.getElementById('delete-course-{{ $index->id }}').submit(); }">
                                      <i class="ri-delete-bin-line"></i>
                                  </a>
                                </div>
                            </td>
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