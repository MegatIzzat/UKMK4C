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
                <a class="navbar-brand" href="{{url('/staff')}}">
                    <img src="{{asset('img/kiosk4community.jpg')}}"> KIOSK4COMMUNITY
                </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            <span class="glyphicon glyphicon-dashboard"></span> &nbsp; Management <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href=" {{route('staff.product.index')}}"><span class="glyphicon glyphicon-cutlery"></span> &nbsp;Product</a></li>
                                <li><a href=" {{route('staff.advertisement.index')}} "><span class="glyphicon glyphicon-pushpin"></span> &nbsp;Advertisement</a></li>
                                <li><a href=" {{route('staff.category.index')}}"><span class="glyphicon glyphicon-filter"></span> &nbsp;Category</a></li>
                            </ul>
                        </li>
                        <li><a href=" {{url('/register')}} "><span class="glyphicon glyphicon-plus-sign"></span> &nbsp; Register</a></li>
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"> Register <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                
                                <li><a href=" {{url('staff/register')}} ">Staff</a></li>
                            </ul>
                        </li> -->
                        <li><a href=" {{route('staff.topup.index')}} "><span class="glyphicon glyphicon-usd"></span> &nbsp;Top Up</a></li>
                        <li><a href="{{route('staff.report')}}"><span class="glyphicon glyphicon-stats"></span> &nbsp;Sales Report</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            <span class="glyphicon glyphicon-list-alt"></span> &nbsp; List <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href=" {{url('/staff/customerlist')}} "><span class="glyphicon glyphicon-user"></span> &nbsp; Customer</a></li>
                                <li><a href=" {{route('staff.viewfeedback')}} "><span class="glyphicon glyphicon-comment"></span> &nbsp;Feedback</a></li>
                                <!-- <li><a href="{{url('/staff/stafflist')}} ">Staff</a></li> -->
                                <li><a href="{{url('/staff/orderlist')}} "><span class="glyphicon glyphicon-shopping-cart"></span> &nbsp;Order</a></li>

                            </ul>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                   <span class="glyphicon glyphicon-user"></span> &nbsp;{{ Auth::user()->user_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
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