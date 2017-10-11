@extends('app')

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
					<a href="#" class="list-group-item">{{$c->category_name}}</a>
					@endforeach
          </div>
			</div>	
			<div class="col-md-9">
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
									<h5>RM {{$p->product_price}}</h5>
								</div>
								<div class="footer">
								
									<a href="{{route('product.addToCart',['product_id' => $p->product_id])}}" class="btn btn-success" role="button">Add to Cart</a>
								
									
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
