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
					<a href="{{route('cust.index')}}" class="list-group-item">
						All Menu
						<span class="badge badge-success pull-right">
						{{ $productcat->count()}}
						</span>
					</a>
					@foreach($category as $c)
						<a href="{{route('cust.category',['id' => $c->category_id])}} " class="list-group-item">
							{{$c->category_name}} 
							<span class="badge badge-success pull-right">  
								{{ $productcat->where('category_id', $c->category_id)->count() }}
							</span>
						</a>
					@endforeach
		  		</div>

		  		<div class="list-group">
					<a href="#" class="list-group-item"><strong>Sort</strong></a>
					<a href="{{ route('cust.pricelow') }}" class="list-group-item">Price : Low to High</a>
					<a href="{{ route('cust.pricehigh') }}" class="list-group-item">Price : High to Low</a>
					<a href="{{ route('cust.ratinghigh') }}" class="list-group-item">Rating : Low to High</a>
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
			@foreach ($adv as $key => $ad)
			  	<li data-target="#myCarousel" data-slide-to="$i" class="{{ $key == 0 ? ' active' : '' }}" ></li>
			@endforeach
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			@foreach ($adv as $key => $ad)
    			<div class="item{{ $key == 0 ? ' active' : '' }}">
        			<img src="{{asset('img/'.$ad->advertisement_img)}}">
    			</div>
			@endforeach
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
								<a href="#"><img src="{{asset('img/'.$p->product_img)}}" alt="Image not available"></a>
								<div class="caption">
									<h4><a href="#">{{$p->product_name}}</a></h4>
									<h4><strong>RM {{ number_format($p->product_price, 2)}}</strong></h4>
								</div>
								<div class="ratings">
									<p>
										<input id="input-3" name="input-3" value="{{$p->product_rating}}" class="rating" data-size="xs" data-show-clear="false" data-show-caption="false" readonly>
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
