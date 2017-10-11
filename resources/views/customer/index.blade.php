@extends('app')

@section('title','Main')

@section('content')

<!-- Page Content -->
	<div class="container">
	  <!-- Content Row -->
		<div class="row">

			<div class="col-md-3">
				
			</div>	
			<div class="col-md-9">
				<!-- Content Column -->
				@foreach($errors->all() as $key)
					<li>{{ $key }}</li>

				@endforeach

				@foreach($product as $p)
			  		<div class="col-md-4 col-xs-12 ">
						<div class="thumbnail">
							<a href="#"><img src="{{asset('img/P0001.jpg')}}" alt="Product-img"></a>
								<div class="caption">
									<h4><a href="#">{{$p->product_name}}</a></h4>
									<h5>RM {{$p->product_price}}</h5>
								</div>
								<div class="footer">
								
									<a href="{{route('product.addToCart',['product_id' => $p->product_id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
								
									
								</div>
								
						</div>
					</div>
				@endforeach
			</div>
		</div>		
	</div>
	<!-- /.container -->

	<br><center>{{$product->links()}}</center><br><br>
@endsection
