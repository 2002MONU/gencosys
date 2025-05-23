@extends('admin.layout.main') 
@section('title') Admin  @endsection
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
         Dashboard
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
      <div class="col-xl-3 col-sm-6 col-12">
         <a href="{{route('registerStudent')}}">
            <div class="card mb-3">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div class="p-2 border border-success rounded-circle me-3">
                        <div class="icon-box md bg-success-subtle rounded-5">
                           <i class="ri-home-4-fill fs-4 text-success"></i>
                        </div>
                     </div>
                     <div class="d-flex flex-column">
                        <h2 class="lh-1">{{$student}}</h2>
                        <p class="m-0">Student Form </p>
                     </div>
                  </div>
               </div>
            </div>
         </a>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
         <a href="{{route('courses.index')}}">
            <div class="card mb-3">
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <div class="p-2 border border-primary rounded-circle me-3">
                        <div class="icon-box md bg-primary-subtle rounded-5">
                           
                           <i class="ri-building-line fs-4 text-primary"></i>
                        </div>
                     </div>
                     <div class="d-flex flex-column">
                        <h2 class="lh-1">{{$course}}</h2>
                        <p class="m-0">Courses</p>
                     </div>
                  </div>
               </div>
            </div>
         </a>
      </div>
     
      
      
     
   </div>
   <!-- Row ends -->
</div>
<!-- App body ends -->
@endsection