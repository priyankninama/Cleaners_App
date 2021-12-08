@extends('admin.layout') 

@section('content')

<div class="container mt-3">


    <div class="w-100 d-flex align-items-center justify-content-center d-inline-block text-center" style="height: 100px; background-color: rgb(234,236,239)">
        <h1 class="">Cities</h1>
    </div> 
    
    @include('messages')

    @include('errors')

    <div>
        <form class="mt-4" id="city_form" method="POST">
            @csrf
                <div class="col-md-10 mt-2 child_div row">
                    <label class="col-md-3">City Name</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control city" id="city" name="name" placeholder="City name" value="{{ old('city', '') }}">
                        <input type="hidden" id="city_id" name="city_id">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" id="submit_city" >Add City</button>
                    </div>

            </div>

        </form>
    </div>

    <div class="mt-3">
    <table class="table table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>City</th>
            <th>Action</th>
        </tr>
        @foreach($cities as $city)
        <tr class="text-center">
            <td>{{ ++$i }}</td>
            <td>{{ $city->name }}</td>
            <td>
            <button class="btn btn-primary" onclick="getCity('{{ $city->id }}')">Edit</button>
            <button type="button" class="btn btn-danger delete_city" data-id="{{ $city->id }}">Delete</button>
        </td>
        </tr>
        @endforeach
    </table>
</div>

</div>
@endsection