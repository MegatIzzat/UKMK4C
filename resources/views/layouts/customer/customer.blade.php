<!DOCTYPE html>
<html>
<head>
	<title>K4C | @yield('title') </title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/lumen/theme/bootstrap.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('css/lumen/theme/usebootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/customize.css')}}">
    <link href="{{asset('css/star-rating.css')}}" media="all" rel="stylesheet" type="text/css" />

</head>
<body>


	@include('layouts.customer.navbar')

	@yield('content')

	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="{{asset('js/star-rating.js')}}"></script>
    <script src="{{asset('css/lumen/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{asset('css/lumen/bootstrap/usebootstrap.js')}}"></script>
</body>
</html>