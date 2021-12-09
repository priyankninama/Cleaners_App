@extends('admin.layout') 

@section('content')

<div class="container mt-3">
    <div class="w-100 d-flex justify-content-center d-inline-block" style="height: 55px; background-color: rgb(255, 255, 255)">
        <h2>Cities</h2>
    </div>
    
    @include('messages')

    @include('errors')

    <div>
        <form class="mt-4" id="city_form" method="POST">
            @csrf
                <div class="d-flex justify-content-center mt-2 row">
                    <label class="col-md-1 h4">City:</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control city" id="city" name="name" placeholder="City name" value="{{ old('city', '') }}">
                        <input type="hidden" id="city_id" name="city_id">
                    </div>
                    <div class="col-md-1">
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