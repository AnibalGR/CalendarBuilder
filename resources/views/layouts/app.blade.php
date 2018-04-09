<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} </title>

        <!-- Styles -->
      <!--  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" >
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" >
        <link rel="shortcut icon" type="image" href="{{ asset('img/favico.ico') }}"/>
        @yield('styles')
        
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container full-width">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('img/calendar-builder-3.png') }}" class="img-responsive top-logo">
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            <li><a href="{{ route('start') }}">Home</a></li>
                            <li><a href="{{ route('how-it-works') }}">How It Works</a></li>
                            <!--<li><a href="{{ route('plans') }}">Pricing</a></li>-->
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            @guest
                            <li class="menuNavBarButton colorB-W"><a href="{{ route('login') }}" >Login</a></li>
                            <li class="menuNavBarButton2 colorW-B"><a href="{{ route('register') }}">Get Started</a></li>
                            @else
                            <li><a href="{{ route('dash') }}">My Calendars</a></li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                @yield('customButtons')
                                <ul class="dropdown-menu" role="menu">
                                    <!--<li>
                                        @if (Auth::user()->subscribed('main'))
                                        <a href="{{ url('/subscriptions') }}">
                                            Manage subscriptions
                                        </a>
                                        @endif
                                    </li>-->
                                    <li>
                                        <a href="{{ route('profile') }}">
                                            Profile
                                        </a>
                                    </li>
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
            <div class="container marginContent" id="notifications">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
        <footer>
            <div class="container full-width footer">
                <div class="full-width space-20"></div>
                    <div class="col-xs-12 col-sm-7 copyright">
                        <div class="full-width space-40"></div>
                        © 2017 Digital Activity Calendars, Inc. - All Rights Reserved
                    </div>
                    <div class="col-xs-12 col-sm-4 copyright">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/calendar-builder.png') }}" class="img-responsive footer-logo">
                        </a>
                    </div>
                </div>
        </footer>
        <!-- Scripts -->
        <script src="{{ asset('js/4a5daede5c.js') }}"></script>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        
        <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
<!--        <script src="{{ asset('js/app.js') }}"></script>-->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        @yield('scripts')
        @yield('braintree')
    </body>
</html>

