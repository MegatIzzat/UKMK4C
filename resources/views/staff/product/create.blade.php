@extends('layouts.admin.admin')

@section('title','Add New Product')

@section('content')

	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<form class="form-horizontal" method="POST" action="{{route('staff.product.store')}}" enctype="multipart/form-data">
				{{csrf_field()}}
				<!-- Alert -->
				@include('error.flash-message')
				@foreach($errors->all() as $key)
					<li>{{ $key }}</li>
				@endforeach
				<div class="panel panel-default">
					<div class="panel-heading">New Product</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-4 control-label">Product ID</label>
							<div class="col-md-6">
								<input type="text" name="product_id" class="form-control" placeholder="Product ID">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
					   		<div class="col-md-6">
								<input type="text" class="form-control" name="product_name" placeholder="Product Name">
					   		</div>
					   	</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Price</label>
							<div class="col-md-6">
								<input type="number" class="form-control" name="product_price" min="0" step="0.1" placeholder="Product Price">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Product Category</label>
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
								<input type="file" name="product_img" class="form-control">
							</div>
						</div>
					
						<div class="form-group">
						 <label class="col-md-4 control-label">Rating</label>
							<div class="col-md-6">
								<input type="number" class="form-control" value="0.0" name="product_rating" readonly="">
							</div>
						</div>

						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">Add Product</button>
						</div>
					</div>
				</div>
			</form>
	</div>
@endsection