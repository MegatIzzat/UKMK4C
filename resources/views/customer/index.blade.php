@extends('layouts.customer.customer')

@section('title','Main')

@section('content')

<!-- Page Content -->
	<div class="container">
		

	  <!-- Content Row -->
		<div class="row">

			<div class="col-md-3">
				<div class="list-group">
					<a href="#" class="list-group-item"><strong>Category</strong></a>
					@foreach($category as $c)
						<a href=" # " class="list-group-item">
							{{$c->category_name}} 
							<span class="badge badge-success pull-right">  
								{{ $productcat->where('category_id', $c->category_id)->count() }}
							</span>
						</a>
					@endforeach
		  </div>
			</div>	
			<div class="col-md-9">
				<!-- Alert -->
				@include('error.flash-message')
				
				<!-- Content Column -->
				@foreach($errors->all() as $key)
					<li>{{ $key }}</li>

				@endforeach

				<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
	  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	  <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
	  <div class="item active">
		<img src="{{asset('img/h1.jpg')}}" alt="Los Angeles" style="width:100%;">
	  </div>

	  <div class="item">
		<img src="{{asset('img/h2.jpg')}}" alt="Chicago" style="width:100%;">
	  </div>
	
	  <div class="item">
		<img src="{{asset('img/h4.jpg')}}" alt="New york" style="width:100%;">
	  </div>
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
	  <span class="glyphicon glyphicon-chevron-left"></span>
	  <span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
	  <span class="glyphicon glyphicon-chevron-right"></span>
	  <span class="sr-only">Next</span>
	</a>
  </div><br><br>

				@foreach($product as $p)
					<div class="col-md-4 col-xs-12 ">
						<div class="thumbnail">
								<a href="#"><img src="{{asset('img/'.$p->product_id.'.jpg')}}" alt="product-img"></a>
								<div class="caption">
									<h4><a href="#">{{$p->product_name}}</a></h4>
									<h4><strong>RM {{ number_format($p->product_price, 2)}}</strong></h4>
								</div>
								<div class="ratings">
									<p>
										<input id="input-3" name="input-3" value="{{$p->product_rating}}" class="rating" data-size="xs" data-show-clear="false" data-show-caption="true" readonly>
									</p>
								</div>
								<div class="footer">
									<p class="pull-left">Rated {{$p->Rating()->count()}} times</p>
									<a href="{{route('cust.addcart',['product_id' => $p->product_id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
								
									
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
