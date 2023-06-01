@extends('master')
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Product</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('admin.products') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if(session()->has('error'))
				<div class="callout callout-danger">
					<p>{{ session('error') }}</p>
				</div>
			@endif

			<form class="form-horizontal" action="/admin/products/update/{{ $product->id }}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{ $product->id }}">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Product Name</label>
							<div class="col-sm-4">
								<input type="text" name="name" class="form-control" value="{{ $product->name }}">
							</div>
							<!-- <div class="col-sm-4">
								<input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Enter updated product name">
							</div> -->
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Current Price</label>
							<div class="col-sm-4">
								<input type="text" name="price" class="form-control" value="{{ $product->price }}">
							</div>
							<!-- <div class="col-sm-4">
								<input type="text" name="price" class="form-control" value="{{ $product->price }}" placeholder="Enter updated product price">
							</div> -->
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Color<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="color" class="form-control" value="{{ $product->color }}">
							</div>
						</div>
						<div class="form-group">
							<label for="size" class="col-sm-3 control-label">Size<span>*</span></label>
							<div class="col-sm-4">
								<select name="size" id="size" class="form-control">
									<option value="{{ $product->size }}">{{ $product->size }}</option>
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
									<option value="{{ $product->category }}">{{ $product->category }}</option>
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
							<label for="" class="col-sm-3 control-label">Image</label>
							<div class="col-sm-4">
								<img id="product-img" src="{{ asset('images/products/'.$product->gallery) }}" alt="" style="width: 100px;">
							</div>
							<div class="col-sm-4">
								<input type="file" id="image-input" name="image" class="form-control" onchange="loadFile(event)">
							</div>
						</div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-8">
                                <textarea name="description" class="form-control" cols="30" rows="10" id="editor1">{{ $product->description }}</textarea>
                            </div>
                        </div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Update Product</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<script>
    function loadFile(event) {
        var output = document.getElementById('product-img');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection
