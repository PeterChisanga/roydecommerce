@extends('master')
@section("content")
</style>
<div class="container custom-cartlist-container">
    <div class="col-sm-10">
        <table class="table">
            <tbody>
                <tr>
                    <td>Amount</td>
                    <td>K {{$total}}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>K 0.00</td>
                </tr>
                <tr>
                    <td>Delivery Fee</td>
                    <td>K 35</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>K {{$total + 35}}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <form action="/orderplace" method="POST">
                @if ($errors != null)
                    @foreach ($errors as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endforeach
                @endif
                @csrf
                <div class="form-group">
                    <select name="city">
                        <option value="">Select Town</option>
                        <option value="Lusaka">Lusaka</option>
                        <option value="Kabwe">Kabwe</option>
                        <option value="Kitwe">Kitwe</option>
                        <option value="Ndola">Ndola</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea type="text" name="address" placeholder="Enter your address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Delivery Date</label>
                    <input type="date" name="delivery_date">
                </div>
                <div class="form-group">
                    <!-- <label for="payment">Payment Method</label><br>
                    <input type="radio" value="online" name="payment" id="online">
                    <label for="online">Online Payment</label><br>
                    <input type="radio" value="emi" name="payment" id="emi">
                    <label for="emi">EMI Payment</label><br> -->
                    <input type="hidden" value="on delivery" name="payment" id="cod">
                    <label for="cod">Payment for this product will be made upon delivery.</label><br>
                </div>
                <button type="submit" class="btn btn-success">Order Now</button><br>
                <p>Once you have submitted the order, you will receive an email and a text message on your phone number.</p>
            </form>
        </div>
    </div>
</div>

@endsection 
