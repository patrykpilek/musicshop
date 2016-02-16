<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Music Shop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ (Request::is('home') ? 'active' : '') }}"><a href="/home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Music<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">CD</a></li>
                        <li><a href="#">Vinyl</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Link One</a></li>
                        <li><a href="#">Link Two</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="{{ (Request::is('register') ? 'active' : '') }}"><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li class="{{ (Request::is('login') ? 'active' : '') }}"><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            @if( Auth::user()->first_name == null)
                                {{ Auth::user()->username }} <span class="caret"></span>
                            @else
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            @endif
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if (Auth::user()->is_admin == true)
                                <li><a href="{!! URL::to('/dashboard') !!}"><i class="fa fa-tachometer"></i> Admin Dashboard</a></li>
                            @endif
                            <li><a href="{!! url('/user') !!}"><i class="fa fa-user"></i> Your Account</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>