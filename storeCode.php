
--------------------product/home page---------------- 

@extends('master')
@section('content')

<div class="small-container">
    <div ><i class="fa fa-truck "></i> We Deliver to Mkushi ,Lusaka ,Kitwe and Ndola</h2></div>
    <div class="row">
        @foreach ($products as $item)
            <div class="col-4">
                <a href="detail/{{$item['id']}}"><img src="{{ asset('images/products/'.$item->gallery) }}" alt=""></a>
                <h4>{{$item['name']}}</h4>
                <h4>{{$item['description']}}</h4>
                <div class="rating">
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star-half" ></i>
                    <i class="fa fa-star-o" ></i>
                </div>
                <h4>K {{$item['price']}}</h4>
            </div>
        @endforeach
    </div>
</div>
@endsection


<!-- -------------------Database Passwords-------------------------------- -->
$r1G[QYI