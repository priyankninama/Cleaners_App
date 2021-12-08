@if ($message = Session::get('success'))
    <div class="mt-2 alert alert-success">
        <p id="message">{{ $message }}</p>
    </div>
@endif

@if($message = Session::get('reject'))
<div class="mt-2 alert alert-danger">
        <p id="message">{{ $message }}</p>
</div>
@endif