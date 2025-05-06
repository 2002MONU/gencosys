<!DOCTYPE html>
<html lang="en">
      <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Student | Register</title>
      <!-- Meta -->
      <meta name="description" content="aditya-engineers ">
      <meta property="og:title" content="aditya-engineers">
      <meta property="og:description" content="aditya-engineers">
      <meta property="og:type" content="aditya-engineers">
      <link rel="shortcut icon" href="">
      <!-- *************
         ************ CSS Files *************
         ************* -->
      <link rel="stylesheet" href="{{asset('dash_assets/fonts/remix/remixicon.css')}}">
      <link rel="stylesheet" href="{{asset('dash_assets/css/main.min.css')}}">
   </head>
   <style>
       .auth-logo img {
    max-width: 191px;
    max-height: 90px;
}
   </style>
   <body class="login-bg">
      <!-- Container starts -->
      <div class="container">
         <!-- Auth wrapper starts -->
         <div class="auth-wrapper">
            <!-- Form starts -->
          
            <div class="auth-box">
                <h4 class="mb-4">Course Details</h4>
                @if(isset($course))
                <div class="card">
                    <img src="{{ asset('images/courses/' . $course->thumbnail) }}" class="card-img-top" alt="{{ $course->name }}" style="max-height: 100px;width:100px; object-fit: cover;">
                    <div class="card-body">
                        
                        <h5 class="card-title">Course Name :{{ $course->name }}</h5>
                        <p class="card-text">Description: {{ $course->brief }}</p>
                        <p class="card-text"><strong>Fees:</strong> ${{ $course->fees }}</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('register.confirmation', $course->id) }}" class="btn btn-success">✅ Buy Now</a>
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">🔄 Change Course</button>
                        </div>
                    </div>
                </div>
                @else
                <p class="text-danger">No course selected. Please go back and select a course.</p>
                <button class="btn btn-secondary" >🔄 Change Course</a>
                @endif
            </div>
         </div>
         <!-- Auth wrapper ends -->
      </div>
      <!-- Container ends -->
   </body>
   <script src="{{asset('dash_assets/js/jquery.min.js')}}"></script>
   <script src="{{asset('dash_assets/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('dash_assets/js/moment.min.js')}}"></script>

 
 
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title fs-5" id="exampleModalLabel">Change Course</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form action="{{route('register.storeStep2')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
               <label for="currentCourse">Current Course</label>
               <input type="text" id="currentCourse" class="form-control" value="{{ $course->name ?? 'No course selected' }}" readonly>
            </div>

            <div class="form-group mt-3">
               <label for="course_id">Select New Course</label>
               <select name="course_id" id="course_id" class="form-control">
                  @foreach ($courses as $index)
                  <option value="{{$index->id}}" {{$index->id == $course->id ? 'selected' : ''}}>{{$index->name}}</option>
                  @endforeach
               </select>
            </div>
            
            <div class="modal-footer mt-3">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save changes</button>
             </div>
         </form>
       </div>
     </div>
   </div>
 </div>
</html>