@extends('layouts.admin.admin')

@section('title','Update Product')

@section('content')

<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<form class="form-horizontal" method="POST" action="{{ route('staff.product.update',$product->product_id)}}" enctype="multipart/form-data">
			{{csrf_field()}}
			{{ method_field('PUT') }}

			<!-- Alert -->
			@include('error.flash-message')

			@foreach($errors->all() as $key)
				<li>{{ $key }}</li>
			@endforeach

			<div class="panel panel-primary">
				<div class="panel-heading">Update Product</div>
				<div class="panel-body">
						<div class="form-group">
							<label class="col-md-4 control-label">Product ID</label>
							<div class="col-md-6">
								<input type="text" name="product_id" class="form-control" readonly value="{{$product->product_id}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
					   		<div class="col-md-6">
								<input type="text" class="form-control" name="product_name" value="{{$product->product_name}}">
					   		</div>
					   	</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Price</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="product_price" min="0" step="0.1" value="{{$product->product_price}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Category</label>
							<div class="col-md-6">
								<select class="form-control" name="category_id" required>
									<option value="" selected> -- Select Category -- </option>
									@foreach($category as $cat)
									  <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					
						<div class="form-group">
					<label class="col-md-4 control-label">Product Image</label>
					<div class="col-md-6">
						<input type="file" name="product_img" class="form-control" value="{{$product->product_img}}">
					</div>
				</div>
					
						<div class="form-group">
						 <label class="col-md-4 control-label">Rating</label>
							<div class="col-md-6">
								<input type="number" class="form-control" value="0.0" name="product_rating" readonly="">
							</div>
						</div>

						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">Update Product</button>
						</div>
					</div>
			</div>
		</form>
	</div>
</div>
@endsection