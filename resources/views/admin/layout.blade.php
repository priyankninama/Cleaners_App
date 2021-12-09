<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <title>{{ $title ?? '' }} Bookcleaner  </title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="pl-2">
        <a class="navbar-brand" href="#">Admin Panel</a>
            <a class="navbar-link pl-3 text-light" href="/">Booking Panel</a>
            <a class="navbar-link pl-3 text-light" href="/admin/cleaner">Cleaner</a>
            <a class="navbar-link pl-3 text-light" href="/admin/city">City</a>
        </div>
        <div class="d-flex align-item-right">
            <h5 class="text-light">{{ Auth::user()->name }}</h5>
            <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link  :href="route('logout')" class="btn btn-outline-danger ml-3 text-light text-center"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
        </div>
    </div>
    </nav>
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="/js/index.js"></script>

</body>
</html>