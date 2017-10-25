@extends('layouts.app')

@section('title','Checkout')

@section('content')

	@if(Session::has('cart'))
		<strong>RM {{ number_format($totalPrice, 2) }}</strong>

	

	{{$customer->cust_balance}}

		@if($customer->cust_balance < $totalPrice)
			NOT ENOUGH 
		@else
			ENOUGH
		@endif
	

	{{$balance}}

	<hr>
	<div class="container-fluid">
		<div class="col-md-10 col-md-offset-1">
			<div class="col-md-3">
				<div class="row">
					<div class="panel panel-default">
						<div class="panel-heading">
							ORDER
						</div>

						<div class="panel-body">
							<div class="form-group">
								<label>Order ID : </label>
							</div>
						
							<div class="form-group">
								<label>Date : </label>
							</div>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="panel panel-default">
						<div class="panel-heading">
							CUSTOMER
						</div>

					</div>	
				</div>
			</div>
			<div class="col-md-8 col-md-offset-1">
				<div class="row">
					<table class="table">
						<tr>
							<th></th>
							<th class="text-center">Name</th>
							<th class="text-center">Quantity</th>
							<th class="text-center">Price</th>
						</tr>

						@foreach($products as $product)
						<tr>
							<td width="150">
								<img class="img-responsive" src="{{asset('img/'.$product['item']['product_id'].'.jpg')}}">
							</td>
							<td>
								{{ $product['item']['product_name'] }}
							</td>
							<td class="text-center">
								{{ $product['qty'] }}
							</td>
							<td class="text-center">
								RM {{ number_format($product['price'], 2) }}
							</td>
						</tr>
					@endforeach
					</table>
				</div>
			</div>
			
		</div>
	</div>
	@endif


@endsection