
@extends('admin.layout')

@section('content')

<div class="container mt-4">
<table class="table table-bordered">
    <tr class="text-center">
        <th>Customer Name</th>
        <th>Phone Number</th>
        <th>City</th>
        <th>Date-Time</th>
        <th>Work Hours</th>
        <th>Cleaner Name</th>
    </tr>
    @foreach ($bookingDetails as $bookingDetail) 
    <tr class="text-center" >
        <td>{{ $bookingDetail->customer->first_name . " " . $bookingDetail->customer->last_name }}</td>
        <td>{{ $bookingDetail->customer->phone_no }}</td>
        <td>{{ $bookingDetail->city->name }}</td>
        <td>{{ $bookingDetail->date_time }}</td>
        <td>{{ $bookingDetail->no_of_hours }}</td>
        <td>{{ $bookingDetail->cleaner->first_name . " " . $bookingDetail->cleaner->last_name }}</td>
    </tr>

    @endforeach
</table>
</div>

@endsection