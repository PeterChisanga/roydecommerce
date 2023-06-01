@extends('master')
@section('content')

@if ($category === 'men')
<h2>Men's Category</h2>
@elseif ($category === 'women')
<h2 style="background-color:pink;">Women's Category</h2>
@elseif ($category === 'kids')
<h2>Kids Category</h2>
@elseif ($category === 'shoes')
<h2>Shoes</h2>
@elseif ($category === 't-shirt')
<h2>T-shirts</h2>
@else
<h2>Our Products</h2>
@endif

<div class="small-container">
    <div class="row custom-row">
        @foreach ($products as $item)
            <div class="col-4">
                <a href="/detail/{{$item['id']}}">
                    <img src="{{ asset('images/products/'.$item->gallery) }}" alt="">
                    <h4>{{$item['name']}}</h4>
                    <div class="rating">
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star-half" ></i>
                        <i class="fa fa-star-o" ></i>
                    </div>
                    <h4 >K {{$item['price']}}</h4>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection