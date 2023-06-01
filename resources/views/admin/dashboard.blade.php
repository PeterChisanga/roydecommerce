@extends('master')
@section('content')
<section class="content">
  <div class="row" style="margin-bottom:138px;">
    <div class="col-lg-3 col-xs-6">
      <a href="/admin/products" style="text-decoration: none;">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?php echo $totalProducts; ?></h3>
                <p>Products</p>
            </div>
            <div class="icon">
                <i class="ionicons ion-android-cart"></i>
            </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-xs-6">
      <a href="/admin/products">
        <div class="small-box bg-maroon">
        <div class="inner">
          <h3><?php echo $totalOrders; ?></h3>
          <p>Pending Orders</p>
        </div>
        <div class="icon">
          <i class="ionicons ion-clipboard"></i>
        </div>
        
      </div>
      </a>
    </div>
    <div class="col-lg-3 col-xs-6">
      <a href="/admin/orders">
        <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $totalOrders; ?></h3>
          <p>Completed Orders</p>
        </div>
        <div class="icon">
          <i class="ionicons ion-android-checkbox-outline"></i>
        </div>
      </div>
      </a>
    </div>
    
    <div class="col-lg-3 col-xs-6">
      <a href="/admin/orders">
        <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo "17"; ?></h3>
          <p>Completed Shipping</p>
        </div>
        <div class="icon">
          <i class="ionicons ion-checkmark-circled"></i>
        </div>
      </div>
      </a>
    </div>

    <div class="col-lg-3 col-xs-6">
      <a href="/admin/orders">
        <div class="small-box bg-orange">
          <div class="inner">
            <h3><?php echo "7"; ?></h3>
            <p>Pending Shippings</p>
          </div>
          <div class="icon">
            <i class="ionicons ion-load-a"></i>
          </div>
      </div>
      </a>
    </div>

    <div class="col-lg-3 col-xs-6">
      <a href="/admin/customers">
        <div class="small-box bg-yellow">
          <div class="inner">
          <h3><?php echo $totalUsers; ?></h3>
          <p>Registered Customers</p>
          </div>
          <div class="icon">
          <i class="ionicons ion-person-add"></i>
        </div>
      </div>
      </a>
    </div>

    <div class="col-lg-3 col-xs-6">
      <a href="/admin/products">
        <div class="small-box bg-olive">
          <div class="inner">
          <h3><?php echo "12"; ?></h3>
          <p>Categories</p>
          </div>
          <div class="icon">
          <i class="ionicons ion-arrow-up-b"></i>
          </div>
        </div>
      </a>
    </div>
  </div>
</section>
@endsection
