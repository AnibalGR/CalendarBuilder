<?php
    use Carbon\Carbon;
?>
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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
<!--        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" >-->
        <link href="{{ asset('css/bootstrap.vertical-tabs.css') }}" rel="stylesheet" >
        
        <style>
            .dragThis {
                width: 150px;
                height: 150px;
                padding: 0.5em;
                border: 3px solid #ccc;
                background-color: transparent;
                z-index: 10;
                position: absolute;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
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
                            {{ config('app.name', 'Laravel') }}
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
                            @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                            <li><button type="button" class="btn btn-primary">Save</button></li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript">
            $(init);
            function init() {
                // We configure the button whose create a new text object
                $("#addButton").click(function () {
                    $("#contenedor").append('<div class="dragThis ui-widget-content" id="resizable"><input type="text" placeholder="Write some text here"><ul><li id="posX"></li><li id="posY"></li></ul></div>');
                    $('.dragThis').draggable({
                        revert:'invalid',
                        drag: function(){
                            var offset = $(this).offset();
                            var xPos = offset.left;
                            var yPos = offset.top;
                            $('#posX').text('x: ' + xPos);
                            $('#posY').text('y: ' + yPos);
                        }
                    });
                });
            }
        </script>
<!--    <script src="{{ asset('js/app.js') }}"></script>-->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
