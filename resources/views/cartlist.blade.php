@extends('master')
@section("content")
<div class="small-container cart-page">
  <table>
    <tr>
      <th>Product</th>
      <th>Quantity</th>
      <th>Subtotal</th>
    </tr>
    @foreach($products as $item)
      <tr>
        <td>
          <div class="cart-infor">
            <img src="{{ asset('images/products/'.$item['product']->gallery) }}" alt="" />
            <div>
              <p>{{$item['product']->name}}</p>
              <small>Price: K {{$item['cart_price']}} </small>
              <a href="/removecart/{{$item['cart_id']}}">Remove</a>
            </div>
          </div>
        </td>
        <td>{{$item['quantity']}}</td>
        <td>K {{$item['cart_price']}} </td>
    </tr>
    @endforeach
     <a href="/products" class="btn">Add Another Product</a>
    <a href="/register/order" class="btn" style="margin-left:40px;">Order Now</a>
  </table>
  <div class="total-price">
    <table>
      <tr>
        <td>Subtotal</td>
        <td>K {{$total}} </td>
      </tr>
      <tr>
        <td>Tax</td>
        <td>K 0.00</td>
      </tr>
      <tr>
        <td>Total</td>
        <td>K {{$total + 0.00}} </td>
      </tr>
    </table>
  </div>
    <a href="/" class="btn" >Add Another Product</a>
    <a href="/register/order" class="btn" style="margin-left:40px;">Order Now</a>
</div>
@endsection