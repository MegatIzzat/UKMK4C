@extends('layouts.admin.admin')

@section('title','Edit Category')

@section('content')
	<div class="container">
			<div class="col-md-8 col-md-offset-2">
				@include('error.flash-message')
				<ul>
					@foreach($errors->all() as $key)
						<li>
							{{ $key }}
						</li>
					@endforeach
				</ul>
				<div class="panel panel-primary">
					<div class="panel-heading">
						Add New Category
					</div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="{{route('staff.category.update',$category->category_id)}}" >
						{{csrf_field()}}
						{{ method_field('PUT') }}
						<div class="form-group">
							<label class="col-md-4 control-label">Category ID</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="category_id" placeholder="Enter Category ID" value="{{$category->category_id}}" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Category Name</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="category_name" placeholder="Enter Category Name" value="{{$category->category_name}}">
							</div>
						</div>

						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">Update Category</button>
						</div>
						</form>	
					</div>
				</div>
			</div>
		
	</div>
@endsection