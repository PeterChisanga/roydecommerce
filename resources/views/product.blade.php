@extends('master')
@section('content')

<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-pause="null">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/header1.jpg" class="d-block img-responsive" alt="...">
    </div>
    <div class="item">
      <img src="images/header2.jpg" class="d-block img-responsive" alt="...">
    </div>
    <div class="item">
      <img src="images/header3.jpg" class="d-block img-responsive" alt="...">
    </div>
    <div class="item">
      <img src="images/header4.jpg" class="d-block img-responsive" alt="...">
    </div>
    <div class="item">
      <img src="images/header5.jpg" class="d-block img-responsive" alt="...">
    </div>
    <div class="item">
      <img src="images/header6.jpg" class="d-block img-responsive" alt="...">
    </div>
    <div class="item">
      <img src="images/header7.jpg" class="d-block img-responsive" alt="...">
    </div>
    <div class="item">
      <img src="images/header8.jpg" class="d-block img-responsive" alt="...">
    </div>
    <div class="item">
      <img src="images/header9.jpg" class="d-block img-responsive" alt="...">
    </div>
  </div>

  <a class="left carousel-control" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->
<div class="category">
  <ul>
    <li><a href="/products/women">Women</a></li>
    <li><a href="/products/kids">Kids</a></li>
    <li><a href="/products/men">Men</a></li>
    <li><a href="/products/shoes">Shoes</a></li>
    <li><a href="/products/t-shirt">T-shirts</a></li>
  </ul>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-pause="null">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
  </ol>

  <div class="carousel-inner" role="listbox">
    <div class="item active" style="background-image:url('images/header1.jpg')">
    </div>
    <div class="item" style="background-image:url('images/header4.jpg')">
    </div>
    <div class="item" style="background-image:url('images/header10.jpg')">
    </div>
    <div class="item" style="background-image:url('images/header7.jpg')">
    </div>
    <div class="item" style="background-image:url('images/header9.jpg')">
    </div>
  </div>

  <a class="left carousel-control" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<h2>All Products</h2>
<div class="small-container">
  <div class="row custom-row">
      @foreach ($products as $item)
          <div class="col-4">
              <a href="detail/{{$item['id']}}">
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