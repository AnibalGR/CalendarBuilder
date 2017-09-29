@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/fullcalendar.min.css') }}" rel='stylesheet' />
<link href="{{ asset('css/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />
<link href="{{ asset('css/bootstrap.vertical-tabs.css') }}" rel="stylesheet" >
<link href="{{ asset('css/custom.css') }}" rel="stylesheet" >

@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4" >
                <div class="panel panel-default" >
                    <div class="panel-heading">Tools</div>
                    <div class="panel-body panel-left" >
                        <div class="col-xs-2"> <!-- required for floating -->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tabs-left" id="left-menu">
                                <li class="active"><a href="#home" data-toggle="tab">
                                        <span class="glyphicon glyphicon-th sb-icons" aria-hidden="true"></span>
                                    Layout</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">
                                        <span class="glyphicon glyphicon-text-width sb-icons" aria-hidden="true"></span>
                                    Text</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">
                                        <span class="glyphicon glyphicon-picture sb-icons" aria-hidden="true"></span>
                                     Image</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">
                                        <span class="glyphicon glyphicon-film sb-icons" aria-hidden="true"></span>
                                        Video</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-10 sb-content">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="contenedor"></div>
                                <div class="tab-pane active" id="home"><button id="showTopLayout" type="button" class="btn btn-primary">Top layout</button><button id="showBottomLayout" type="button" class="btn btn-success">Bottom layout</button><button id="noneLayout" type="button" class="btn btn-danger">None layout</button><button id="showLeftLayout" type="button" class="btn btn-success">Left layout</button><button id="showRightLayout" type="button" class="btn btn-success">Right layout</button></div>
                                <div class="tab-pane" id="profile"><button id="addButton" type="button" class="btn btn-primary">Add Text</button></div>
                                <div class="tab-pane" id="messages">
                                    <div class="upload-image">
                                        <input type="file" name="file" value="Upload Image" />
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings">Some videos</div>
                                
                            </div>
                            <div class="upload-image-preview" id="imagePrev"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" id="calendarPanel">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        
                        <div id='top'>
                            <div class='left'>Calendar</div>
		<div class='right'>

			<div id='theme-system-selector' class='selector'>
				Theme System:

				<select>
                                    <option value='standard' selected>Without theme</option>
                                    <option value='jquery-ui'>With theme</option>	
				</select>
			</div>
			<div data-theme-system="jquery-ui" class='selector' style='display:none'>
				Theme Name:

				<select>
					<option value='black-tie' selected>Black Tie</option>
					<option value='blitzer'>Blitzer</option>
					<option value='cupertino'>Cupertino</option>
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

		<div class='clear'></div>
	</div></div>

                    <div class="panel-body" id="calendarPanel" style="height:auto">
                        <div class="panel-body bg-right" >
                        


                    <div class="panel-body" id="calendarCont" style="overflow: auto">
                        <p id="topLayout" style="visibility: hidden;  width: 0px; height: 0px;">Put your image here!</p>
                        <p id="leftLayout" style="visibility: hidden;  width: 0px; height: 0px; float: left">Put your image here!</p>
                        <p id="rightLayout" style="visibility: hidden;  width: 0px; height: 0px; float: right">Put your image here!</p>
                        <div id='calendar'></div>
                        <p id="bottomLayout" style="visibility: hidden;  width: 0px; height: 0px;">Put your image here!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div></div>
@endsection

@section('scripts')
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/theme-chooser.js') }}"></script>
<script>
    $(document).ready(function() {
        
        $("#toolsP").css('height',$("#calendarPanel").height());
        $("#toolsP").css('border','solid');
        
        
        // Restablecemos los layouts
        $("#topLayout").hide();
        $("#bottomLayout").hide();
        $("#leftLayout").hide();
        $("#rightLayout").hide();
        $('#calendar').droppable();
        
        // Function to show the top Layout
        $("#showTopLayout").click(function(){
        cleanLayout();
        $("#topLayout").css('visibility','visible');
        $("#topLayout").css('height','100px');
        $("#topLayout").css('width','100%');
        $("#topLayout").css('border-color','black');
        $("#topLayout").css('border-style','solid');
        $("#topLayout").show();
        });
        
        // Function to show the left Layout
        $("#showLeftLayout").click(function(){
        cleanLayout();
        $("#leftLayout").css('visibility','visible');
        $("#leftLayout").css('height',$("#calendarCont").height());
        $("#leftLayout").css('width','25%');
        $("#leftLayout").css('border-color','black');
        $("#leftLayout").css('border-style','solid');
        $("#calendar").css('max-width','75%');
        $("#calendar").css('float','right');
        $("#leftLayout").show();
        });
        
        // Function to show the right Layout
        $("#showRightLayout").click(function(){
        cleanLayout();
        $("#rightLayout").css('visibility','visible');
        $("#rightLayout").css('height',$("#calendarCont").height());
        $("#rightLayout").css('width','25%');
        $("#rightLayout").css('border-color','black');
        $("#rightLayout").css('border-style','solid');
        $("#calendar").css('max-width','75%');
        $("#calendar").css('float','left');
        $("#rightLayout").show();
        });
        
        // Function to show the bottom Layout
        $("#showBottomLayout").click(function(){
        cleanLayout();
        $("#bottomLayout").css('visibility','visible');
        $("#bottomLayout").css('height','100px');
        $("#bottomLayout").css('width','100%');
        $("#bottomLayout").css('border-color','black');
        $("#bottomLayout").css('border-style','solid');
        $("#bottomLayout").css('padding-top','5px');
        $("#bottomLayout").show();
        });
        
        function cleanLayout(){
            $("#topLayout").hide();
        $("#bottomLayout").hide();
        $("#leftLayout").hide();
        $("#rightLayout").hide();
        $("#calendar").css('max-width','100%');
        $("#calendar").css('float','none');
        };
        
        $("#noneLayout").click(function(){
            cleanLayout();
        });
        
        // Función para subir imágenes
        $("input[name=file]").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = $('<img>').attr('src', e.target.result);
                    $('.upload-image-preview').append(img);
                    
                };

                reader.readAsDataURL(this.files[0]);
            }
        });
        
        initThemeChooser({
            init: function(themeSystem) {
                $('#calendar').fullCalendar({
                                     themeSystem: themeSystem,
                                        height: 'auto',
                                        header: {
                                                left: 'prev,next',
                                                center: 'title',
                                                right: null
                                        },
                                        defaultDate: '2017-09-12',
                                        weekNumbers: false,
                                        navLinks: true, // can click day/week names to navigate views
                                        editable: true,
                                        eventLimit: true // allow "more" link when too many events
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
                
                $("#imagePrev").draggable();
                
                
                
                // We configure the button whose create a new text object
                $("#addButton").click(function () {
                    $('#contenedor').append('<div contenteditable="true" class="d"><span>Double click here</span></div>');
                    
                    $(".d").draggable().click(function() {
                        $(this).draggable( {disabled: false, revert:'invalid'});
                        
                    }).dblclick(function() {
                    $(this).draggable({ disabled: true, revert:'invalid' });
                    });
                    $(".d").resizable({animate: true});
//                    $('.dragThis').draggable({
//                        revert:'invalid'
////                        drag: function(){
////                            var offset = $(this).offset();
////                            var xPos = offset.left;
////                            var yPos = offset.top;
////                            $('#posX').text('x: ' + xPos);
////                            $('#posY').text('y: ' + yPos);
////                        }
//                    });
                    //$("#resizable").resizable();
                });
            }
</script>
@endsection