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

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
               <img src="{{asset('img/kiosk4community.jpg')}}"> KIOSK4COMMUNITY
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
            	@guest
                <li><a href=" {{route('cust.home')}} "><span class="glyphicon glyphicon-home"></span> &nbsp;Home</a></li>
                @else
                	@if(Auth::user()->isAdmin())
                		<li><a href=" {{route('staff.index')}} "><span class="glyphicon glyphicon-home"></span> &nbsp;Home</a></li>
                	@else
                		<li><a href=" {{route('cust.home')}} "><span class="glyphicon glyphicon-home"></span> &nbsp;Home</a></li>
                	@endif
                @endguest
           
                @auth
                	@if(Auth::user()->isAdmin())

                	@else
		                <?php $unseen=0 ?><!-- Count unseen notification -->
		                 @foreach($notify as $n)
		                     @if(Auth::user()->user_id==$n->user_id && $n->is_seen == 0)
		                        <?php ++$unseen ?>
		                    @endif
		                @endforeach

                <li class="dropdown">
                    <a href="notification#" class="dropdown-toggle" data-toggle="dropdown">
                    @if($unseen==0)
                        <span class="glyphicon glyphicon-envelope"></span> &nbsp;Notification
                    @else
                        <span style="color:blue" class="glyphicon glyphicon-envelope"></span> &nbsp;Notification
                        <span style="background-color:red" class="badge">{{$unseen}}</span>                   
                    @endif
                    </a>

                    <ul class="dropdown-menu" style="width:300px">
                        <form class="form-horizontal" method="POST" action="{{ route('cust.isNotifiedAll',Auth::user()->user_id)}}">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            <p style="text-align:left;"><b>Notification</b> <span style="float:right;"><a href="#" onclick="$(this).closest('form').submit()"> Mark All as Read </a></span></p>
                        </form>                   
                                
                                     
                    @foreach($notify->reverse() as $n)<!-- sort notification by most recent -->
                    <li>
                    @if(Auth::user()->user_id==$n->user_id)
                    @if($n->is_seen == 0)                                            
                        <form class="form-horizontal" method="POST" action="{{ route('cust.isNotified',$n->id)}}">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            <button style="width:100%" class="btn-info" type="submit">{{$n->notification}}<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                        </form>                   
                    @else
                        <button style="width:100%" class="btn-default" disabled>{{$n->notification}}<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                        @endif
                    @endif
                    </li>
                    @endforeach    
            </ul>
            @endif
        @endauth

    </ul>


    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        @auth
        	@if(Auth::user()->isAdmin())

        	@else
		        @foreach($topup as $t)
		        @if($t->cust_id==Auth::user()->user_id)
		        <li>
		            <a href="#balance">
		                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> RM {{number_format((float)$t->cust_balance, 2, '.', '')}}
		            </a>
		        </li>
		        @endif
		        @endforeach
		    @endif
        @endauth

        @guest
        <li>
            <a href="{{route('cust.getcart')}}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart 
                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty: ''}}</span>
            </a>
        </li>
        @else
        	@if(Auth::user()->isAdmin())

        	@else
        	<li>
            <a href="{{route('cust.getcart')}}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart 
                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty: ''}}</span>
            </a>
        	</li>
        	@endif
        @endguest

        <!-- Authentication Links -->
        @guest
        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

        @else
            
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
               <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->user_name }} <span class="caret"></span>
           </a>
           
            <ul class="dropdown-menu">
                <li>
                    <a href="{{route('cust.profile.edit',['user' => Auth::user()->user_id])}}"><span class="glyphicon glyphicon-edit"></span> Manage Profile</a>
                </li>
                <li>
                    <a href="/orderhistory"><span class="glyphicon glyphicon-time"></span> &nbsp;Order History</a>
                </li>

                <li role="separator" class="divider"></li>

            <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off"></span>
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
