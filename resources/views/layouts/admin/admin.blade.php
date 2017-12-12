<!DOCTYPE html>
<html>
<head>
	<title>Admin | @yield('title') </title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('css/flatly/theme/bootstrap.css')}}" media="screen">
	<link rel="stylesheet" href="{{asset('css/flatly/theme/usebootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('css/customize.css')}}">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="{{asset('css/flatly/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{asset('css/flatly/bootstrap/usebootstrap.js')}}"></script>
	<script src="{{asset('js/star-rating.js')}}"></script>
	
</head>
<body>

	@include('layouts.admin.navbarstaff')

	@yield('content')

	
</body>
</html>