@extends('admin.layout.main')
@section('title') EDit Course  @endsection
@section('maindashboard')
 <!-- App container starts -->
    <!-- App hero header starts -->
    <div class="app-hero-header d-flex align-items-center">

      <!-- Breadcrumb starts -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
          <a href="{{route('admin.dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
            <a href="javascript:history.back()"> Back</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
         @yield('title')
        </li>
       
      </ol>
     
    </div>
    <!-- App Hero header ends -->

    <!-- App body starts -->
    <div class="app-body">
       
      <!-- Row starts -->
      <div class="row gx-3">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">@yield('title')</h5>
            </div>
            <div class="card-body">
            <form action="{{route('courses.update',$course->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
              @method('PUT')
              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-lg-6 col-sm-12">
                  <div class="mb-3">
                    <label class="form-label" for="a2">Course Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control"  name="course_name" placeholder="Enter name " value="{{ $course->name }}">
                    @error('course_name')
                    <div class="error text-danger">{{ $message }}</div>
                    @enderror 
                </div>
              </div>
              <div class="col-xxl-6 col-lg-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="a2">Fee <span class="text-danger">*</span></label>
                  <input type="number" class="form-control"  name="fee" placeholder="Enter Fee " value="{{ $course->fees }}">
                  @error('fee')
                  <div class="error text-danger">{{ $message }}</div>
                  @enderror 
              </div>
            </div>
              <div class="col-xxl-6 col-lg-6 col-sm-12">
                <div class="mb-3">
                  <label class="form-label" for="a2">Brief <span class="text-danger">*</span></label>
                  <textarea type="number" class="form-control"  name="brief" placeholder="Enter brief " >{{$course->brief}}</textarea>
                  @error('brief')
                  <div class="error text-danger">{{ $message }}</div>
                  @enderror 
              </div>
            </div>
              <div class="col-xxl-6 col-lg-6 col-sm-12">
                <div class="mb-3">
                    <label class="form-label" for="image">Thumbmail Images <span
                            class="text-danger">*</span></label>
                    ( <span>Note:IMG TYPE:- JPEG,PNG,JPG</span>)
                    <input type="file" id="fileInput1" class="form-control file-input"
                        name="thumbnail" >
                    <span id="messagefileInput1" class="text-danger"></span>
                   <a href="{{ asset('images/courses/' . $course->thumbnail) }}" target="_blank"><img src="{{ asset('images/courses/' . $course->thumbnail) }}" style="width:70px;height:70px"></a>
                    @if ($errors->has('thumbnail'))
                        <div class="error text-danger">{{ $errors->first('thumbnail') }}</div>
                    @endif
                    
                </div>
            </div>
              
            <div class="col-xxl-6 col-lg-6 col-sm-12">
              <div class="mb-3">
                <label class="form-label" for="a2">Status <span class="text-danger">*</span></label>
                <select name="status" id="" class="form-control">
                  <option default >Status</option>
                  <option value="1" {{ $course->status == 1 ? 'selected' : '' }}>Active</option>

                  <option value="0" {{$course->status == 0 ?  'selected' : ''}}>Inactive</option>
                </select>
                @error('status')
                <div class="error text-danger">{{ $message }}</div>
                @enderror 
            </div>
          </div>
               
                <div class="col-sm-12">
                  <div class="d-flex gap-2 justify-content-end">
                    <button class="btn btn-primary" type="submit">
                      Submit
                    </button>
                  </div>
                </div>
              </div>
              <!-- Row ends -->
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Row ends -->

    </div>
    <!-- App body ends -->
   
   
    
    @endsection