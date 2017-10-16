@extends('app')

@section('title','Cart')

@section('content')
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-md-6 col-md-offset-3 ">
				<ul class="list-group">
					@foreach($products as $product)
						<li class="list-group-item">
							<span class="badge">{{ $product['qty'] }}</span>
							<div class="col-md-5 col-sm-4 col-xs-4">
								<strong>{{ $product['item']['product_name'] }}</strong>
							</div>
							<div class="col-md-2 col-xs-2 col-sm-2">
								<span class="label label-success">RM {{ number_format($product['price'], 2) }}</span>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="#">Reduce by 1</a></li>
									<li><a href="#">Reduce All</a></li>
								</ul>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<strong>Total : RM {{ number_format($totalPrice, 2) }}</strong>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<button type="button" class="btn btn-success">Checkout</button>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-md-6">
				<h2>No Items in Cart!</h2>
			</div>
		</div>
	@endif
@endsection