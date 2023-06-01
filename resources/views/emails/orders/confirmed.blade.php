<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <h2>Order Details from kamalasuppliers.com</h2>
            <p class="mb-0">For any queries, call +26 966 111 222</p>
        </div>
        <div class="card-body">
            <?php $totalAmount = 35; ?>
            @foreach($orders as $item)
                <?php $totalAmount += $item->cart_price; ?>
                <div class="card my-3">
                    <div class="card-body">
                        <h4 class="card-title">{{$item->name}}</h4>
                        <p class="card-text">Price : K {{$item->cart_price}}</p>
                        <p class="card-text">Quantity {{$item->quantity}}</p>
                        <p class="card-text">Description : {{$item->description}}</p>
                        <p class="card-text">Payment Status : {{$item->payment_status}}</p>
                        <p class="card-text">Payment Method : {{$item->payment_method}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer text-right">
            <h3>Total Price : K {{$totalAmount}} </h3>
        </div>
    </div>
</div>
