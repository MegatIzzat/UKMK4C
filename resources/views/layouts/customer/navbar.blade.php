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

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                KIOSK4COMMUNITY
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">

                <li><a href=" {{route('cust.home')}} "><span class="glyphicon glyphicon-home"> Home</span></a></li>

                @auth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-envelope"> Notification</span></a>
                    <ul class="dropdown-menu">
                     @foreach($notify as $n)
                     @if($n->is_seen == 0)
                     <li>                        
                        <form class="form-horizontal" method="POST" action="{{ route('cust.isNotified',$n->order_id)}}">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            <button  class="btn btn-info" type="submit">Your Order {{$n->order_id}} has been completed.<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                        </form>
                    </li>
                    
                    @else
                    <li>
                        <button  class="btn btn-default" disabled>Your Order {{$n->order_id}} has been completed.<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                    </li>
                    @endif
                </li>               
                @endforeach  
            </ul>
        @endauth

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

        <li><a href="{{ route('login') }}">Login</a></li>
        @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
               {{ Auth::user()->user_name }} <span class="caret"></span>
           </a>

           <ul class="dropdown-menu">
            <li><a href="{{route('cust.profile.edit',['user' => Auth::user()->user_id])}}">Manage Profile</a></li>
            <li><a href="/orderhistory">Your Order History</a></li>

            <li role="separator" class="divider"></li>
            <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
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