@extends('layouts.admin.admin')

@section('title','Product')

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
		<div class="panel panel-primary">
			<div class="panel-heading">Product Management
				<a role="button" href="{{route('staff.product.create')}}" class="btn btn-success pull-right">Add New Product</a>
			</div>
			<div class="panel-body">
				<table class="table" style="table-layout: fixed;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Price</th>
							<th>Category</th>
							<th>Image</th>
							<th>Rating</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($product as $p)
							<tr id="product{{$p->product_id}}">
								<td>{{$p->product_id}}</td>
								<td>{{$p->product_name}}</td>
								<td>RM {{number_format($p->product_price, 2)}}</td>
								<td>{{$p->category_id}}</td>
								<td style="word-wrap: break-word;"><a href=" {{asset('/img/'.$p->product_img)}} " target="_blank">{{$p->product_img}}</a></td>
							 	<td>{{number_format($p->product_rating, 1)}}</td>
								<td>
									<a role="button" class="btn btn-warning pull-left" href="{{ route('staff.product.edit',$p->product_id)}}">Edit</a>

									<form method="POST" action="{{route('staff.product.delete', $p->product_id)}}">
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
		<center> {{$product->links()}} </center>

	</div>

@endsection