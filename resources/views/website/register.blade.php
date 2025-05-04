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
            <form action="{{route('register.storeStep1')}}" method="POST">
               @csrf
               <div class="auth-box">
                 
                  <h4 class="mb-4">Student Register</h4>
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
                  <div class="mb-3">
                     <label class="form-label" for="email">First Name <span class="text-danger">*</span></label>
                     <input type="text" id="email" class="form-control" name="first_name" value="{{old('first_name')}}" placeholder="Enter your first_name">
                     @if ($errors->has('first_name'))
                     <span class="text-danger" role="alert">
                     <strong>{{ $errors->first('first_name') }}.</strong>
                     </span>
                     @endif
                  </div>
                  <div class="mb-3">
                     <label class="form-label" for="email">Last Name <span class="text-danger">*</span></label>
                     <input type="text" id="last_name" class="form-control" name="last_name" value="{{old('last_name')}}" placeholder="Enter your last_name">
                     @if ($errors->has('last_name'))
                     <span class="text-danger" role="alert">
                     <strong>{{ $errors->first('last_name') }}.</strong>
                     </span>
                     @endif
                  </div>
                  <div class="mb-3">
                     <label class="form-label" for="email">Your email <span class="text-danger">*</span></label>
                     <input type="text" id="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter your email">
                     @if ($errors->has('email'))
                     <span class="text-danger" role="alert">
                     <strong>{{ $errors->first('email') }}.</strong>
                     </span>
                     @endif
                  </div>
                  <div class="mb-3">
                     <label class="form-label" for="email">Mobile  <span class="text-danger">*</span></label>
                     <input type="number" id="email" class="form-control" name="mobile" value="{{old('mobile')}}" placeholder="Enter your mobile">
                     @if ($errors->has('mobile'))
                     <span class="text-danger" role="alert">
                     <strong>{{ $errors->first('mobile') }}.</strong>
                     </span>
                     @endif
                  </div>
                  <div class="mb-2">
                     <label class="form-label" for="pwd">Select Course <span class="text-danger">*</span></label>
                    <select name="course_id" id="" class="form-control">
                     <option >Select Course</option>
                     @foreach ($courses as $index)
                      <option value="{{$index->id}}">{{$index->name}}</option>
                     @endforeach
                    </select>
                     @if ($errors->has('course_id'))
                     <span class="text-danger" role="alert">
                     <strong>{{ $errors->first('course_id') }}.</strong>
                     </span>
                     @endif
                  </div>
                  <div class="mb-3 d-grid gap-2">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </div>
            </form>
            <!-- Form ends -->
         </div>
         <!-- Auth wrapper ends -->
      </div>
      <!-- Container ends -->
   </body>
   <script src="{{asset('dash_assets/js/jquery.min.js')}}"></script>
   <script src="{{asset('dash_assets/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('dash_assets/js/moment.min.js')}}"></script>
</html>