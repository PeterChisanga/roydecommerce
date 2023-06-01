@extends('master')
@section("content")
<div class="container custom-login">
    <div class="col-sm-4 col-sm-offset-4">
        @if ($errors != null)
            @foreach ($errors as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
            @endforeach
        @endif
        <form action="/register/order" method="POST">
                @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <p>If you do not have an email address just enter your phone number.</p>
                <input type="email" class="" id="email" name="email" 
                    value="{{ isset($user) ? $user->email : (isset($email) ? $email : '') }}" 
                    placeholder="Email Address">
            </div>
            <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="text" class="form-control" id="number" name="number" 
                    value="{{ isset($user) ? $user->number : (isset($email) ? $number : '') }}" 
                    placeholder="Phone Number">
            </div>
            <button type="submit" class="btn btn-success">Continue</button>
        </form>
    </div>
</div>
@endsection
