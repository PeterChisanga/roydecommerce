
@extends('master')
@section('content')
<?php

    // if (session()->get('user')) {
    //     $previousPage = url()->previous();
    //     if (strpos($previousPage, '/cartlist') !== false){
    //             return redirect('/');
    //     }
    // }

 ?>
<div class="container custom-login">
    <div class="col-sm-4 col-sm-offset-4">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="/register" method="POST">
                @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', session('user') ? session('user')->name : '') }}" 
                    placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="text">Phone Number</label>
                <input type="text" class="form-control" id="number" name="number"
                    value="{{ old('number', session('user') ? session('user')->number : (session('number') ? session('number') : '')) }}" 
                    placeholder="Phone Number">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" 
                    value="{{ old('email', session('user') ? session('user')->email : (session('email') ? session('email') : '')) }}" 
                    placeholder="Email Address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            @if(!session('user'))
                <div class="form-group">
                    <label for="">Repeat Password</label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Repeat Password">
                </div>
            @endif

            <button type="submit" class="btn btn-success">Continue</button>
        </form>
        <p> <a href="/password/reset">Forgot password?</a></p>
    </div>
</div>

@endsection
