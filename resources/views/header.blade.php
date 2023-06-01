<?php
  use Illuminate\Support\Facades\Request;
  $cur_page = Request::path();

  $cart = Session::get('cart');
  $total = 0;
  if($cart){
      $total = count($cart);
  }

  $currentHour = Carbon\Carbon::now()->format('H');
    $greeting = '';

    if($currentHour >= 5 && $currentHour < 12) {
        $greeting = 'Good morning';
    } else if($currentHour >= 12 && $currentHour < 17) {
        $greeting = 'Good afternoon';
    } else {
        $greeting = 'Good evening';
  }
?>

@if(!Session::has('adminUser'))
<div class="nav" id="nav">
  <div class="navbar">
    <div class="logo">
      <a href="/"
        ><img src="{{ asset('images/logo.jpg') }}" alt="Logo Here" width="125px" />
      </a>
    </div>
    <nav>
      <ul id="MenuItems">
        <li><a href="/">Home</a></li>
        <li><a href="/products">Products</a></li>
        <li><a href="/myorders">My Orders</a></li>
        <li><a href="/cartlist">Cart({{$total}})</a></li>
        @if(!Session::has('user'))
        <li><a href="/login">Login</a></li>
        @endif
      </ul>
    </nav>
    @if(Session::has('user'))
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown"
          >{{Session::get('user')['name']}} <span class="caret"></span
        ></a>
        <ul class="dropdown-menu">
          <li><a href="/logout">logout</a></li>
        </ul>
      </li>
    @endif
    <img src="{{ asset('images/menu.png' )}}" class="menu-icon" onclick="menutoggle()" />
  </div>
</div>
@else
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<a href="" class="logo">
				<span class="logo-lg">SAMALA SUPPLIERS LIMITED</span>
			</a>
		<nav class="navbar navbar-static-top">
      <span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin Panel</span>
      <!-- Top Bar ... User Inforamtion .. Login/Log out Area -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <span class="hidden-xs" style="font-size: 18px; color: #fff; margin-left: 500px;">{{ $greeting }}, {{Session::get('adminUser')['name']}}!</span>
        </ul>
      </div>
    </nav>
		</header>

    <aside class="main-sidebar">
      <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="treeview <?php if($cur_page == 'admin/dashboard') {echo 'active';} ?>">
              <a href="/admin/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="treeview <?php if( ($cur_page == 'admin/products') || ($cur_page == 'admin/products/add') || ($cur_page == 'admin/products/update') ) {echo 'active';} ?>">
                <a href="/admin/products">
                    <i class="fa fa-shopping-bag"></i> <span>Product Management</span>
                </a>
            </li>

            <li class="treeview <?php if($cur_page == 'admin/orders') {echo 'active';} ?>">
                <a href="/admin/orders">
                    <i class="fa fa-sticky-note"></i> <span>Order Management</span>
                </a>
            </li>

            <li class="treeview <?php if($cur_page == 'admin/customers') {echo 'active';} ?>">
              <a href="/admin/customers">
                <i class="fa fa-user-plus"></i> <span>Registered Customers</span>
              </a>
            </li>

            <li class="treeview ">
              <a href="/logout">Logout  </a>
            </li>
          </ul>
      </section>
    </aside>
  	<div class="content-wrapper">
 @endif  
   