@extends('layouts.admin.admin')

@section('title','Edit Category')

@section('content')
	<div class="container">
		@include('error.flash-message')
		<ul>
			@foreach($errors->all() as $key)
				<li>
					{{ $key }}
				</li>
			@endforeach
		</ul>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
			<div class="panel-heading">Category
				<div class="pull-right">
					<a role="button" href="{{route('staff.category.create')}}" class="btn btn-success">Add New Category</a>
				</div>
				
			</div>
			<div class="panel-body">
				<table class="table" style="table-layout: fixed;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($category as $c)
							<tr id="category{{$c->category_id}}">
								<td>{{$c->category_id}}</td>
								<td>{{$c->category_name}}</td>
								<td>
									<a role="button" class="btn btn-warning pull-left" href="{{ route('staff.category.edit', $c->category_id)}}">Edit</a>

									<form method="POST" action="{{route('staff.category.delete', $c->category_id)}}">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<input type="submit" class="btn btn-danger pull-right" onclick="return confirm('Are you sure to delete?')" value="Delete">
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<center> {{$category->links()}} </center>
		</div>
		

	</div>

@endsection