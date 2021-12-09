@extends('bookings.layout')

@section('content')

<div class="mt-4 container">
    
    <div class="w-100 d-flex justify-content-center d-inline-block" style="height: 60px; background-color: rgb(255, 255, 255)">
        <h2>Booking System</h2>
    </div>

    @include('messages')

    @include('errors')

    <form class="mt-4" method="POST">
        @csrf
        <div class="form-group row">
            <div class="form-group col row">
                <label class="col-md-3">First Name</label>
                <div class="col">
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}" placeholder="First Name">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-md-3">Last Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}" placeholder="Last Name">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col row">
                <label class="col-md-3">Phone Number</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{old('phone_no')}}" placeholder="Phone Number">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-md-3">City Name</label>
                <div class="col-md-9">
                    <select class="form-control col" id="city_name" name ='city' value="{{old('city->id')}}" >
                        <option value="">Select City</option>
                        @foreach($cities as $city)
                        <option value="{{$city->id}}" {{(old('city')==$city->id)? 'selected':''}} >{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col row">
                <label class="col-md-3">Date</label>
                <div class="col-md-9">
                    <input type="date" class="form-control datepicker col-md-10" id="datepicker" placeholder="Select Date" name="date" value="{{old('date')}}" min="2021-12-01" max="2021-12-31">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-md-3">Time</label>
                <div class="col-md-9">
                    <input type="time" class="form-control timepicker col-md-10"  min = "08:00:00"  max="20:00:00" id="timepicker" value="{{old('time')}}" name="time">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-md-4">No.of Hours</label>
                <div class="col-md-8">
                    <input type="number" class="form-control col-md-20" id="no_of_hour" min="1" max="8" value="{{old('no_of_hours')}}" name="no_of_hours" >
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Book</button>
        </div>
    </form>
</div>
@endsection