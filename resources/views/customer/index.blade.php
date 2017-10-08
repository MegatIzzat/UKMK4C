<!DOCTYPE html>
<html lang="en">

  <head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>K4C</title>

	<!-- Bootstrap core CSS -->
	<link href="{{asset('user/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="{{asset('css/modern-business.css')}}" rel="stylesheet">
	<link href="{{asset('font/css/font-awesome.min.css')}}" rel="stylesheet">

  </head>

  <body>

	<!-- Navigation -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
	  <div class="container">
		<a class="navbar-brand" href="index.html">KIOSK4COMMUNITY</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
		  <ul class="navbar-nav ml-auto">

			<li class="nav-item">
			  <a class="nav-link" href="about.html">About</a>
			</li>

			<li class="nav-item">
			  <a class="nav-link" href="services.html">Services</a>
			</li>

			<li class="nav-item">
			  <a class="nav-link" href="contact.html">Contact</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
				</a>
			</li>

			@guest
				<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
			@else
				<li class="dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<ul class="dropdown-menu" role="menu">
						<li>
							<a class="dropdown-item" href=""> Manage Profile</a>
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</li>
			@endguest
		  </ul>
		</div>
	  </div>
	</nav>

	

		<header>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<!-- Slide One - Set the background image for this slide in the line below -->
					<div class="carousel-item active" style="background-image: url('{{asset('img/h1.jpg')}}')"></div>

					<!-- Slide Two - Set the background image for this slide in the line below -->
					<div class="carousel-item" style="background-image: url('{{asset('img/h2.jpg')}}')"></div>

					<!-- Slide Three - Set the background image for this slide in the line below -->
					<div class="carousel-item" style="background-image: url('{{asset('img/h3.jpg')}}')"></div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</header>

		<!-- Page Content -->
	<div class="container">

		<br><br>

	  <!-- Content Row -->
	  <div class="row">
		<!-- Sidebar Column -->



		<div class="col-lg-3 mb-4">
		  <div class="list-group">
			<a href="index.html" class="list-group-item">Home</a>
			<a href="about.html" class="list-group-item">About</a>
			<a href="services.html" class="list-group-item">Services</a>
			<a href="contact.html" class="list-group-item">Contact</a>
		  </div>
		</div>
		<!-- Content Column -->

		<!-- @foreach($product as $p) -->
			<div class="col-lg-9 mb-4">
		  		<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="{{asset('img/.jpg')}}" alt="Product-img"></a>
							<div class="card-body">
								<h4 class="card-title">
									<a href="#">Product Name<!-- {{$p->product_name}} --></a>
								</h4>
								<h5>RM <!-- {{$p->product_price}} --></h5>
							</div>
							<div class="card-footer">
								<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
								<button style="float: right;" class="btn btn-default">Add to cart</button>
							</div>
					</div>
				</div>
			</div>
		<!-- @endforeach -->

		
	  </div>
	  <!-- /.row -->

	</div>
	<!-- /.container -->

	<!-- Footer -->
	<footer class="py-5 bg-dark">
	  <div class="container">
		<p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
	  </div>
	  <!-- /.container -->
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="{{asset('user/js/jquery.min.js')}}"></script>
	<script src="{{asset('user/popper/popper.min.js')}}"></script>
	<script src="{{asset('user/js/bootstrap.min.js')}}"></script>

  </body>

</html>
