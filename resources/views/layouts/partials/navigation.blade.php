<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! url('/home') !!}">Music Shop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <!-- Left Side of Navbar -->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="true">Music<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">All Music</li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">CD</a></li>
                        <li><a href="#">Vinyl</a></li>
                    </ul>
                </li>
                <li class="{{ (Request::is('contact') ? 'active' : '') }}"><a href="{!! url('/contact') !!}">Contact</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="{{ (Request::is('register') ? 'active' : '') }}"><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li class="{{ (Request::is('login') ? 'active' : '') }}"><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-expanded="true">
                            {{ Auth::user()->getNameOrUsername() }}
                            <span class="caret"></span>
                            @if(Storage::disk('local')->has(Auth::user()->id .'-image.jpg'))
                                <img class="profile-image img-circle" src="{{ url('user/image/'. Auth::user()->id .'-image.jpg') }}" >
                            @else
                                <img class="profile-image img-circle" src="{{ Auth::user()->getAvatar() }}" >
                            @endif
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if (Auth::user()->is_admin == true)
                                <li><a href="{!! url('/admin/dashboard') !!}"><i class="fa fa-tachometer"></i> Admin Dashboard</a></li>
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