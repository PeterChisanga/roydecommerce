@extends('master')
@section('content')

<div class="container custom-login" style="width: 510px;>
    <div class="col-sm-4 col-sm-offset-4">
      @if ($errors != null)
            @foreach ($errors as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
            @endforeach
        @endif
        <h3>Login with your email or phone number</h3>
        <form action="/login" method="POST">
            @csrf
            <label>
                <input type="radio" name="loginType" value="phone" checked>
                <span> Phone number</span>
            </label>
            <label>
                <input type="radio" name="loginType" value="email">
                <span>  Email</span>
            </label>
            <div class="form-group" id="emailInput" style="display: none; margin-top:30px;">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
            </div>
            <div class="form-group" id="phoneInput" style="margin-top:30px;">
                <label for="number">Phone number</label>
                <input type="text" class="form-control" id="number" name="number" placeholder="Phone number">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            
            <button type="submit" class="btn btn-success">Login</button>
        </form>
        <br>
        <p id="forgotPassword" style="display: none;"> <a href="/password/reset">Forgot password?</a></p>

        <script>
            $(document).ready(function(){
                $('input[type="radio"]').click(function(){
                    if($(this).attr("value")=="phone"){
                        $("#emailInput").hide();
                        $("#phoneInput").show();
                        $("#forgotPassword").hide();
                    }
                    if($(this).attr("value")=="email"){
                        $("#emailInput").show();
                        $("#phoneInput").hide();
                        $("#forgotPassword").show();
                    }   
                });
            });
        </script>
    </div>
</div>
@endsection
