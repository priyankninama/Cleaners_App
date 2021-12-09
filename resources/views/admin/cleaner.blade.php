@extends('admin.layout') 

@section('content')

<div class="container mt-3">
    <div class="w-100 d-flex justify-content-center d-inline-block" style="height: 55px; background-color: rgb(255, 255, 255)">
        <h2>Cleaners</h2>
    </div>
    @include('messages')

    @include('errors')

    <form class="mt-4" id="cleaner_form" method="POST">
        @csrf
        <div class="form group row">
            <div class="form-group col row">
                <label class="col-md-4 h5">First Name:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                    <input type="hidden" id="cleaner_id" name="cleaner_id">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-md-3 h5">Last Name:</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" >
                </div>
            </div>
        </div>
        <div class="form-group row">
        <div class="form-group col row">
            <label class="col-md-4 h5">Phone Number:</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Phone Number" value="{{ old('phone_no') }}" >
            </div>
        </div>
            <div class="city mt-2 col row">
                <label class="col-md-3 h5">City Name:</label>
                <div class="col-md-9 select_city">
                    <select class="form-control col" multiple id="city_name" name=cities[]>
                        @foreach($cities as $city)
                        <option value="{{$city->id}}" {{(collect(old('cities'))->contains($city->id))? 'selected':''}} >{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary" id="add_cleaner">Add</button>
        </div>
    </form>

    <table class="mt-3 table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
        @if(!$cleaners)
            <td colspan="5"> No Data Available</td>
        @endif

        @foreach($cleaners as $cleaner)
        <tr class="text-center data">

            <td>{{ ++$i }}</td>
            <td>{{ $cleaner->first_name }}</td>
            <td>{{ $cleaner->last_name }}</td>
            <td>{{ $cleaner->phone_no }}</td>
            <td>
            <button class="btn btn-primary" onclick="getCleaner('{{ $cleaner->id }}')">Edit</button>

            <button type="button" class="btn btn-danger delete_cleaner" data-id="{{ $cleaner->id }}">Delete</button>
            </td>
        </tr>
        @endforeach

</div>
@endsection('content')