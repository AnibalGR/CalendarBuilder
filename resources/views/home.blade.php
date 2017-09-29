@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/fullcalendar.min.css') }}" rel='stylesheet' />
<link href="{{ asset('css/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />
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
<style>

	
	#top,
	#calendar.fc-unthemed {
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}

	#top {
		background: #eee;
		border-bottom: 1px solid #ddd;
		padding: 0 10px;
		line-height: 40px;
		font-size: 12px;
		color: #000;
	}

	#top .selector {
		display: inline-block;
		margin-right: 10px;
	}

	#top select {
		font: inherit; /* mock what Boostrap does, don't compete  */
	}

	.left { float: left }
	.right { float: right }
	.clear { clear: both }

	#calendar {
		max-width: 900px;
		margin: 40px auto;
		padding: 0 10px;
	}

</style>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Tools</div>
                    <div class="panel-body">
                        <div class="col-xs-4"> <!-- required for floating -->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tabs-left">
                                <li class="active"><a href="#home" data-toggle="tab">Layout</a></li>
                                <li><a href="#profile" data-toggle="tab">Text</a></li>
                                <li><a href="#messages" data-toggle="tab">Image</a></li>
                                <li><a href="#settings" data-toggle="tab">Video</a></li>
                            </ul>
                        </div>

                        <div class="col-xs-8">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">Choose Layout</div>
                                <div class="tab-pane" id="profile"><button id="addButton" type="button" class="btn btn-primary">Add Text</button></div>
                                <div id="contenedor">
                                </div>
                                <div class="tab-pane" id="messages">Some images</div>
                                <div class="tab-pane" id="settings">Some videos</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Calendar</div>
                    <div class="panel-body">
                        
<div id='top'>

		<div class='left'>

			<div id='theme-system-selector' class='selector'>
				Theme System:

				<select>
					<option value='bootstrap3'>Bootstrap 3</option>
					<option value='jquery-ui' selected>jQuery UI</option>
					<option value='standard'>unthemed</option>
				</select>
			</div>

			<div data-theme-system="bootstrap3" class='selector' style='display:none'>
				Theme Name:

				<select>
					<option value='' selected>Default</option>
					<option value='cosmo'>Cosmo</option>
					<option value='cyborg'>Cyborg</option>
					<option value='darkly'>Darkly</option>
					<option value='flatly'>Flatly</option>
					<option value='journal'>Journal</option>
					<option value='lumen'>Lumen</option>
					<option value='paper'>Paper</option>
					<option value='readable'>Readable</option>
					<option value='sandstone'>Sandstone</option>
					<option value='simplex'>Simplex</option>
					<option value='slate'>Slate</option>
					<option value='solar'>Solar</option>
					<option value='spacelab'>Spacelab</option>
					<option value='superhero'>Superhero</option>
					<option value='united'>United</option>
					<option value='yeti'>Yeti</option>
				</select>
			</div>

			<div data-theme-system="jquery-ui" class='selector' style='display:none'>
				Theme Name:

				<select>
					<option value='black-tie'>Black Tie</option>
					<option value='blitzer'>Blitzer</option>
					<option value='cupertino' selected>Cupertino</option>
					<option value='dark-hive'>Dark Hive</option>
					<option value='dot-luv'>Dot Luv</option>
					<option value='eggplant'>Eggplant</option>
					<option value='excite-bike'>Excite Bike</option>
					<option value='flick'>Flick</option>
					<option value='hot-sneaks'>Hot Sneaks</option>
					<option value='humanity'>Humanity</option>
					<option value='le-frog'>Le Frog</option>
					<option value='mint-choc'>Mint Choc</option>
					<option value='overcast'>Overcast</option>
					<option value='pepper-grinder'>Pepper Grinder</option>
					<option value='redmond'>Redmond</option>
					<option value='smoothness'>Smoothness</option>
					<option value='south-street'>South Street</option>
					<option value='start'>Start</option>
					<option value='sunny'>Sunny</option>
					<option value='swanky-purse'>Swanky Purse</option>
					<option value='trontastic'>Trontastic</option>
					<option value='ui-darkness'>UI Darkness</option>
					<option value='ui-lightness'>UI Lightness</option>
					<option value='vader'>Vader</option>
				</select>
			</div>

			<span id='loading' style='display:none'>loading theme...</span>

		</div>

		<div class='right'>
			<span class='credits' data-credit-id='bootstrap-standard' style='display:none'>
				<a href='https://getbootstrap.com/docs/3.3/' target='_blank'>Theme by Bootstrap</a>
			</span>
			<span class='credits' data-credit-id='bootstrap-custom' style='display:none'>
				<a href='https://bootswatch.com/' target='_blank'>Theme by Bootswatch</a>
			</span>
			<span class='credits' data-credit-id='jquery-ui' style='display:none'>
				<a href='http://jqueryui.com/themeroller/' target='_blank'>Theme by jQuery UI</a>
			</span>
		</div>

		<div class='clear'></div>
	</div>

	<div id='calendar'></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/theme-chooser.js') }}"></script>
<script>

        $(document).ready(function() {

                initThemeChooser({

                        init: function(themeSystem) {
                                $('#calendar').fullCalendar({
                                        themeSystem: themeSystem,
                                        header: {
                                                left: 'prev,next today',
                                                center: 'title',
                                                right: 'month,agendaWeek,agendaDay,listMonth'
                                        },
                                        defaultDate: '2017-09-12',
                                        weekNumbers: true,
                                        navLinks: true, // can click day/week names to navigate views
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
                        },

                        change: function(themeSystem) {
                                $('#calendar').fullCalendar('option', 'themeSystem', themeSystem);
                        }

                });

        });

</script>
<script type="text/javascript">
            $(init);
            function init() {
                // We configure the button whose create a new text object
                $("#addButton").click(function () {
                    $("#contenedor").append('<div class="dragThis" id="resizable"><input type="text" placeholder="Write some text here"><ul><li id="posX"></li><li id="posY"></li></ul></div>');
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
@endsection