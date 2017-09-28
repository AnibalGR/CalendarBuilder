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
        <link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fullcalendar.print.min.css') }}" rel="stylesheet" media="print">
        <style>
            .dragThis {
                width: 8em;
                height: 8em;
                padding: 0.5em;
                border: 3px solid #ccc;
                border-radius: 0 1em 1em 1em;
                background-color: transparent;
                z-index: 10;
                position: absolute;
            }
            #calendar {
                max-width: 900px;
                max-height: 50%;
                margin: 0 auto;
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
                            <li><button id="addButton" type="button" class="btn btn-primary">Add Text</button></li>
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
            <div id="contenedor">
            
        </div>
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript">
            
                                               $(init);
                                               function init() {
                                               $('.dragThis').draggable(
                                               {
                                               drag: function(){
                                               var offset = $(this).offset();
                                               var xPos = offset.left;
                                               var yPos = offset.top;
                                               $('#posX').text('x: ' + xPos);
                                               $('#posY').text('y: ' + yPos);
                                               }
                                               });
                                               $("#addButton").click(function () {
                                               
                                                
                                               $("#contenedor").append('<div class="dragThis"><input type="text" placeholder="Write some text here"><ul><li id="posX"></li><li id="posY"></li></ul></div>');
                                               $('.dragThis').draggable({
                                               drag: function(){
                                               var offset = $(this).offset();
                                               var xPos = offset.left;
                                               var yPos = offset.top;
                                               $('#posX').text('x: ' + xPos);
                                               $('#posY').text('y: ' + yPos);
                                               }
                                               });
                                               });
                                               $('.dragThis').draggable(
                                               {
                                               drag: function(){
                                               var offset = $(this).offset();
                                               var xPos = offset.left;
                                               var yPos = offset.top;
                                               $('#posX').text('x: ' + xPos);
                                               $('#posY').text('y: ' + yPos);
                                               }
                                               });
                                               }

        </script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        <script src="{{ asset('js/fullcalendar.min.js') }}"></script>

<!--    <script src="{{ asset('js/app.js') }}"></script>-->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script>

                                               $(document).ready(function() {

                                               $('#calendar').fullCalendar({
                                               header: {
                                               left: 'prev,next today',
                                                       center: 'title',
                                                       right: 'month,agendaWeek,agendaDay'
                                               },
                                                       defaultDate: '{{ Carbon::today()->toDateString() }}',
                                                       navLinks: true, // can click day/week names to navigate views
                                                       selectable: true,
                                                       selectHelper: true,
                                                       select: function(start, end) {
                                                       var title = prompt('Event Title:');
                                                       var eventData;
                                                       if (title) {
                                                       eventData = {
                                                       title: title,
                                                               start: start,
                                                               end: end
                                                       };
                                                       $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                                                       }
                                                       $('#calendar').fullCalendar('unselect');
                                                       },
                                                       editable: true,
                                                       eventLimit: true, // allow "more" link when too many events
                                                       events: [
                                                       {
                                                       title: 'All Day Event',
                                                               start: '2017-09-01'
                                                       },
                                                       {
                                                       title: 'Long Event',
                                                               start: '2017-09-07',
                                                               end: '2017-09-10'
                                                       },
                                                       {
                                                       id: 999,
                                                               title: 'Repeating Event',
                                                               start: '2017-09-09T16:00:00'
                                                       },
                                                       {
                                                       id: 999,
                                                               title: 'Repeating Event',
                                                               start: '2017-09-16T16:00:00'
                                                       },
                                                       {
                                                       title: 'Conference',
                                                               start: '2017-09-11',
                                                               end: '2017-09-13'
                                                       },
                                                       {
                                                       title: 'Meeting',
                                                               start: '2017-09-12T10:30:00',
                                                               end: '2017-09-12T12:30:00'
                                                       },
                                                       {
                                                       title: 'Lunch',
                                                               start: '2017-09-12T12:00:00'
                                                       },
                                                       {
                                                       title: 'Meeting',
                                                               start: '2017-09-12T14:30:00'
                                                       },
                                                       {
                                                       title: 'Happy Hour',
                                                               start: '2017-09-12T17:30:00'
                                                       },
                                                       {
                                                       title: 'Dinner',
                                                               start: '2017-09-12T20:00:00'
                                                       },
                                                       {
                                                       title: 'Birthday Party',
                                                               start: '2017-09-13T07:00:00'
                                                       },
                                                       {
                                                       title: 'Click for Google',
                                                               url: 'http://google.com/',
                                                               start: '2017-09-28'
                                                       }
                                                       ]
                                               });
                                               });

        </script>
    </body>
</html>
