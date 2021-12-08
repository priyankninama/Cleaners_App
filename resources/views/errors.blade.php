@if ($errors->Any())
    <div class="mt-2 alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input. <br><br>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <br><br>
    </div>
@endif