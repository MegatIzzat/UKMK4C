<!DOCTYPE html>
<html>
<head>
	<title>Order Status</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
	@foreach($product as $p)
					<div class="col-md-4 col-xs-12 ">
						<div class="thumbnail">
								<a href="#"><img src="{{asset('img/'.$p->product_id.'.jpg')}}" alt="product-img"></a>
								<div class="caption">
									<h4><a href="#">{{$p->product_name}}</a></h4>
									<h4><strong>RM {{ number_format($p->product_price, 2)}}</strong></h4>
								</div>
								<div class="ratings">
									<input class="rating" id="product_rating" name="rating" data-min=0 data-max=5 data-step=0.5 data-size="xs">
									<p>Rated {{$p->Rating()->count()}} times</p>
								</div>
								<div class="footer">
								
									<a href="{{route('product.sendRating',['product_id' => $p->product_id])}}" class="btn btn-success" role="button">Rate It!</a>
								
									
								</div>
						</div>
					</div>
				@endforeach

    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/star-rating.js')}}"></script>
</body>
</html>