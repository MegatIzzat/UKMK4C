<head>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
</head>

<div id="gigi">
 <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->            <a class="navbar-brand" href="{{ url('/') }}">
               <img src="{{asset('img/kiosk4community.jpg')}}"> KIOSK4COMMUNITY
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">

                <li><a href=" {{route('cust.home')}} "><span class="glyphicon glyphicon-home"> Home</span></a></li>
           
              

    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="{{route('cust.getcart')}}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart 
                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty: ''}}</span>
            </a>
        </li>

        <!-- Authentication Links -->
        @guest
        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"> Login</a></li>

        @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
               <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->user_name }} <span class="caret"></span>
           </a>

           <ul class="dropdown-menu">
            <li><a href="{{route('cust.profile.edit',['user' => Auth::user()->user_id])}}"><span class="glyphicon glyphicon-edit"> Manage Profile</a></li>
            <li><a href="/orderhistory"><span class="glyphicon glyphicon-time"> Order History</a></li>

            <li role="separator" class="divider"></li>
            <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off"> 
                Logout
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
</div>

@auth
<script language="javascript" type="text/javascript">
function loadlink(){
    $('#gigi').load('refreshNavbar',function () {
         $(this).unwrap();
    });
}

loadlink(); // This will run on page load
setInterval(function(){
    loadlink() // this will run after every 5 seconds
},10000);
</script>
@endauth