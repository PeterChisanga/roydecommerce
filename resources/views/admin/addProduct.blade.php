@extends('master')
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Product</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('admin.products') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">

			@if(($errors) > 0)
			<div class="callout callout-danger">
				<h4>Validation errors occurred:</h4>
				<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>
			@endif

			@if(session('success'))
			<div class="callout callout-success">
				<p>{{ session('success') }}</p>
			</div>
			@endif

			<form class="form-horizontal" action="/admin/products/add" method="post" enctype="multipart/form-data">
				 @csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="name" class="form-control">
							</div>
						</div>	
						<!-- <div class="form-group">
							<label for="" class="col-sm-3 control-label">Old Price</label>
							<div class="col-sm-4">
								<input type="text" name="p_old_price" class="form-control">
							</div>
						</div> -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Current Price <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="price" class="form-control">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Color<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="color" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="size" class="col-sm-3 control-label">Size<span>*</span></label>
							<div class="col-sm-4">
								<select name="size" id="size" class="form-control">
									<option value="">Select size</option>
									<option value="S">Small</option>
									<option value="M">Medium</option>
									<option value="L">Large</option>
									<option value="XL">XL</option>
									<option value="XXL">XXL</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="category" class="col-sm-3 control-label">Category<span>*</span></label>
							<div class="col-sm-4">
								<select name="category" id="category" class="form-control">
									<option value="">Select Category</option>
									<option value="Men">Men</option>
									<option value="Women">Women</option>
									<option value="gender-neutral">gender-neutral</option>
									<option value="Kids">Kids</option>
									<option value="t-shirt">T-shirts</option>
									<option value="Accessories">Accessories</option>
									<option value="Sportswear">Sportswear</option>
									<option value="Formal">Formal</option>
									<option value="Casual">Casual</option>
									<option value="Footwear">Footwear</option>
									<option value="Outerwear">Outerwear</option>
									<option value="Underwear">Underwear</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Featured Photo <span>*</span></label>
							<div class="col-sm-4" style="padding-top:4px;">
								<input type="file" name="image">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-8">
								<textarea name="description" class="form-control" cols="30" rows="10" id="editor1"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Add Product</button>
							</div>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
</section>
@endsection
