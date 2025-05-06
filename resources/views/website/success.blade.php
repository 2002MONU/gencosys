<!-- filepath: d:\xampp\htdocs\gencosys\resources\views\website\success.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Success</title>
    <link rel="stylesheet" href="{{ asset('dash_assets/fonts/remix/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('dash_assets/css/main.min.css') }}">
</head>
<style>
    .auth-logo img {
        max-width: 191px;
        max-height: 90px;
    }
    .success-message {
        text-align: center;
        margin-top: 50px;
    }
</style>
<body class="login-bg">
    <!-- Container starts -->
    <div class="container">
        <!-- Auth wrapper starts -->
        <div class="auth-wrapper">
            <!-- Success message starts -->
            <div class="auth-box">
                <div class="success-message">
                    <h2>Your enrollment No: {{$studentId}}</h2>
                    <h1 class="text-success">🎉 Registration Successful!</h1>
                    <p>Thank you message with brief enrollment confirmation.</p>
                    <div class="d-grid gap-2 mt-4">
                        {{-- <a href="{{ route('register.step1') }}" class="btn btn-primary">🏠 Go to Homepage</a> --}}
                        <a href="{{ route('register.step1') }}" class="btn btn-secondary">🔄 Register Another Student</a>
                    </div>
                </div>
            </div>
            <!-- Success message ends -->
        </div>
        <!-- Auth wrapper ends -->
    </div>
    <!-- Container ends -->
</body>
<script src="{{ asset('dash_assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('dash_assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dash_assets/js/moment.min.js') }}"></script>
</html>