@extends('layouts.admin.admin')

@section('title','Order')

@section('content')
{{-- <meta http-equiv="refresh" content="10" > --}}
  <div class="container">
	<div class="panel panel-primary">
	 <div class="panel-heading">Order In Progress
	 </div>
	 <div class="panel-body"> 
	  <ul>
		@foreach($errors->all() as $key)
		<li>{{ $key }}</li>
		@endforeach
	  </ul>

	  <table class="table" id="tableOrder">
		<thead>
		  <tr>
			<th>Order ID</th>
			<th>Order Status</th>
			<th>Product Name</th>
			<th>Product Quantity</th>

		  </tr>
		</thead>

		@foreach($order as $key => $p)
			<tr>
			  <td>{{$p->order_id}}</td>
			  
			  <td><a  href="{{route('staff.order.update',[$p->order_id,$p->cust_id]) }}" class="btn btn-success btn-sm" role="button"> Complete </a></td>


			@foreach($orderline as $key => $q)
				@if($p->order_id == $q->order_id)
					@foreach($product as $key => $r)
						@if($q->product_id == $r->product_id)
							<td>{{$r->product_name}}</td>
						@endif
					@endforeach
					<td>{{$q->quantity}}</td>
					<tr><td></td><td></td>
				@endif
			@endforeach

			</tr>
		@endforeach
		</table>

	  </div>
	</div>
  </div>
@endsection