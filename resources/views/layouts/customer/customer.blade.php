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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="{{asset('css/flatly/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{asset('css/flatly/bootstrap/usebootstrap.js')}}"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="{{asset('js/star-rating.js')}}"></script>

</head>
<body>


	@include('layouts.customer.navbar')

	@yield('content')

</body>
</html>