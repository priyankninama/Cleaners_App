@extends('bookings.layout')

@section('content')

<nav class="navbar navbar-dark bg-dark">
    <div class="pl-2">
        <a class="navbar-brand" href="#">Cleaner Booking</a>
        <a class="navbar-link pl-3 text-light" href="#">Home</a>
        <a class="navbar-link pl-3 text-light" href="#">User</a>
        <a class="navbar-link pl-3 text-light" href="#">Demo</a>
    </div>

    <a type="button" href="/admin/login" class="btn btn-outline-success text-light">Admin Login</a>

    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

    </div>
</nav>
<div class="mt-4 container">
    
    <div class="w-100 d-flex align-items-center justify-content-center d-inline-block text-center" style="height: 100px; background-color: rgb(234,236,239)">
        <h1 class="">Booking System</h1>
    </div>

    @include('messages')

    @include('errors')

    <form class="mt-4" method="POST">
        @csrf
        <div class="form-group row">
            <div class="form-group col row">
                <label class="col-md-3">First Name</label>
                <div class="col">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-md-3">Last Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col row">
                <label class="col-md-3">Phone Number</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Phone Number">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-md-3">City Name</label>
                <div class="col-md-9">
                    <select class="form-control col" id="city_name" name = 'city'>
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}" >{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col row">
                <label class="col-md-3">Date</label>
                <div class="col-md-9">
                    <input type="date" class="form-control datepicker col-md-10" id="datepicker" placeholder="Select Date" name="date" min="2021-12-01" max="2021-12-31">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-md-3">Time</label>
                <div class="col-md-9">
                    <input type="time" class="form-control timepicker col-md-10"  min = "08:00:00"  max="20:00:00" id="timepicker" placeholder="" name="time">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-md-4">No.of Hours</label>
                <div class="col-md-8">
                    <input type="number" class="form-control col-md-20" id="no_of_hour" min="1" max="8" placeholder="" name="no_of_hours" >
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Book</button>
        </div>
    </form>
</div>
@endsection