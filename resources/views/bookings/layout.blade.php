<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="{{asset('js/index.js')}}"></script>

    <title>Book Cleaner</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark d-flex justify-content-between">
@if (Route::has('login'))

        <div class="hidden fixed top-0 right-0 px-3 py-2 sm:block">
            <a href="/" class="navbar-brand" href="#">Cleaner Booking</a> 
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-light">Dashboard</a>
        @else
        </div>

        <div>
            <a type="button" href="{{ route('login') }}" class="navbar-link btn btn-outline-success text-light">Admin Login</a> 
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-outline-primary text-light">Register</a> 
        @endif 
        </div>
        @endauth 
        @endif

</nav>

    @yield('content')
</body>
</html>