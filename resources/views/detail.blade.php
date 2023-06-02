@extends('master')
@section("content")

<div class="small-container single-product">
  <div class="row">
    <div class="col-2">
      <img src="{{ asset('images/products/'.$product->gallery) }}" width="100%" id="productImg" />
    </div>
    <div class="col-2">
      <p>Home / {{$product['name']}}</p>
      <h1>{{$product['name']}}</h1>
      <!-- <h4>K {{$product['price']}}</h4> -->
      <h4 id="price-display"></h4>
      <form action="/add_to_cart" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{$product['id']}}" />
        <label for="">Size</label><br>
        <select name="size" id="size" class="form-control">
          <option value="{{$product['size']}}">{{$product['size']}}</option>
          <option value="S">Small</option>
          <option value="M">Medium</option>
          <option value="L">Large</option>
          <option value="XL">XL</option>
          <option value="XXL">XXL</option>
        </select>
        <label for="">Color</label><br>
        <select name="color" id="color" class="form-control">
          <option value="{{$product['color']}}">{{$product['color']}}</option>
          <option value="Red">Red</option>
          <option value="Blue">Blue</option>
          <option value="Green">Green</option>
          <option value="Black">Black</option>
          <option value="White">White</option>
        </select>
        <label for="">Quantity</label><br>
        <input type="number" name="quantity" id="quantity" value="1" onchange="calculatePrice()" />
        <input type="hidden" name="price" id="price" value="{{$product['price']}}" />
        <button type="submit" class="btn">Add to Cart</button>
        <button type="submit" class="btn">Buy Now</button>
      </form>
      <h3>Product Details <i class="fa fa-indent"></i></h3>
      <br />
      <p>
        {{$product['description']}}
      </p>
    </div>
  </div>
</div>

<h2 >Similar Products</h2>
<!-- <div class="small-container">
  <div class="row">
    @foreach ($products as $item)
    <div class="col-4">
      <a href="/detail/{{$item['id']}}"
        ><img src="{{ asset('images/products/'.$item->gallery) }}" alt=""
      /></a>
      <h4>{{$item['name']}}</h4>
      <h4>{{$item['description']}}</h4>
      <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half"></i>
        <i class="fa fa-star-o"></i>
      </div>
      <h4>K {{$item['price']}}</h4>
    </div>
    @endforeach
  </div>
</div> -->

<div class="small-container">
  <div class="row custom-row">
      @foreach ($products as $item)
          <div class="col-4">
              <a class="col-4-a" href="/detail/{{$item['id']}}">
                  <div class="img-div">
                    <img src="{{ asset('images/products/'.$item->gallery) }}" alt="">
                  </div>
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



<script>
  function calculatePrice() {
      var quantity = document.getElementById("quantity").value;
      var price = parseFloat({{$product['price']}});
      
      var totalPrice = price * quantity;
      document.getElementById("price-display").innerHTML = "K " + totalPrice;
      document.getElementById("price").value = totalPrice;
  }
  calculatePrice();
</script>

@endsection

