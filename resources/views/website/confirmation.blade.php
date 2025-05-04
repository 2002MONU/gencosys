<!-- filepath: d:\xampp\htdocs\gencosys\resources\views\website\confirmation.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmation | Register</title>
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
                <h4 class="mb-4">Confirmation Details</h4>
                @if(isset($student) && isset($course))
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Student Details</h5>
                        <p class="card-text"><strong>Name:</strong> {{ $student['first_name'] }}{{$student['last_name']}}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $student['email'] }}</p>
                        <p class="card-text"><strong>Mobile:</strong> {{ $student['mobile'] }}</p>
                        <hr>
                        <h5 class="card-title">Selected Course</h5>
                        <p class="card-text"><strong>Course Name:</strong> {{ $course['name'] }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $course['brief'] }}</p>
                        <p class="card-text"><strong>Fees:</strong> ${{ $course['fees'] }}</p>
                        <div class="d-grid gap-2 mt-4">
                            <form action="{{ route('register.submit') }}" method="POST">
                                @csrf
                                {{-- <input type="hidden" name="student_id" value="{{ $student['id'] }}"> --}}
                                <input type="hidden" name="course_id" value="{{ $course['id'] }}">
                                <button type="submit" class="btn btn-success">✅ Confirm & Submit</button>
                            </form>
                            <a href="{{ route('register.step2', $course->id) }}" class="btn btn-secondary">🔄 Change Course</a>
                        </div>
                    </div>
                </div>
                @else
                <p class="text-danger">No student or course details found. Please go back and complete the previous steps.</p>
                <a href="{{ route('register.step1') }}" class="btn btn-secondary">🔄 Start Over</a>
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
</html>