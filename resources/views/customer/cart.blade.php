@extends('layouts.customer.customer')

@section('title','Cart')

@section('content')
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-md-8 col-md-offset-2 ">
				<table class="table table-responsive table-hover table-condensed">
					
						<tr>
							<th></th>
							<th class="text-center">Name</th>
							<th class="text-center">Quantity</th>
							<th class="text-center">Price</th>
							<th></th>
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
							
							<td width="50">
								<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="#">Reduce by 1</a></li>
									<li><a href="#">Reduce All</a></li>
								</ul>
							</div>
							</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="3" class="text-center">Grand Total</td>
						<td class="text-center"><strong>RM {{ number_format($totalPrice, 2) }}</strong></td>

						@guest
                        	<td><a role="button" class="btn btn-success" href="{{route('login')}}">Checkout</a></td>
                    	@else
							<td><a role="button" class="btn btn-success" href="{{route('cust.checkout',['user' => Auth::user()->user_id] )}}">Checkout</a></td>
						@endguest
					</tr>
				</table>
				
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-md-8 col-md-offset-2 ">
				<h2>No Items in Cart!</h2>
			</div>
		</div>
	@endif
@endsection