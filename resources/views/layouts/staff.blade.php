<!DOCTYPE html>
<html lang="en">

  <head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>K4C | @yield('title')</title>

	<!-- Bootstrap core CSS -->
	<link href="{{asset('user/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="{{asset('css/modern-business.css')}}" rel="stylesheet">

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
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Portfolio
			  </a>
			  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
				<a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
				<a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
				<a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
				<a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
				<a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
			  </div>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Blog
			  </a>
			  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
				<a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
				<a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
				<a class="dropdown-item" href="blog-post.html">Blog Post</a>
			  </div>
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
	<br> 

  	@yield('content');



	<!-- Bootstrap core JavaScript -->
	<script src="{{asset('user/js/jquery.min.js')}}"></script>
	<script src="{{asset('user/popper/popper.min.js')}}"></script>
	<script src="{{asset('user/js/bootstrap.min.js')}}"></script>

  </body>
  </html>