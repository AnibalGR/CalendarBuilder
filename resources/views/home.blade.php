@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/fullcalendar.min.css') }}" rel='stylesheet' />
<link href="{{ asset('css/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />
<link href="{{ asset('css/bootstrap.vertical-tabs.css') }}" rel="stylesheet" >
<link href="{{ asset('css/custom-calendar.css') }}" rel="stylesheet" >

@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 head-calendar">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4" >
                <div class="panel panel-default">
                    <div class="panel-heading" id='toolsPanel'>Tools</div>
                    <div class="panel-body panel-left" id="toolsCont">
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
                                <li><a href="#Background" data-toggle="tab">
                                        <span class="glyphicon glyphicon-picture sb-icons" aria-hidden="true"></span>
                                        Back
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-10 sb-content">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="contenedor"></div>
                                <div class="tab-pane active" id="home">
                                    <div class="layoutType">
                                        <button id="showTopLayout" type="button" class="btn btn-primary" style="width: 100%; height: 100%">Top layout</button>
                                    </div>
                                    <div class="layoutType">
                                        <button id="showBottomLayout" type="button" class="btn btn-success" style="width: 100%; height: 100%">Bottom layout</button>
                                    </div>
                                    <div class="layoutType">
                                        <button id="noneLayout" type="button" class="btn btn-danger" style="width: 100%; height: 100%">None layout</button>
                                    </div>
                                    <div class="layoutType">
                                        <button id="showLeftLayout" type="button" class="btn btn-success" style="width: 100%; height: 100%">Left layout</button>
                                    </div>
                                    <div class="layoutType">
                                        <button id="showRightLayout" type="button" class="btn btn-success" style="width: 100%; height: 100%">Right layout</button>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile"><button id="addButton" type="button" class="btn btn-primary">Add Text</button></div>
                                <div class="tab-pane" id="messages">
                                    <div>
                                        <input id="upImage" type="file" style="display:none;" />
                                        <button id="addImage" type="button" class="btn btn-primary">Upload Image</button>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <button id="addVideo" type="button" class="btn btn-primary">Add Video</button>
                                    <button id="removeVideo" type="button" class="btn btn-primary">Remove Video</button>
                                </div>
                                <div class="tab-pane" id="Background">Some background images</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading" id="calendarPanel">
                        
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
<<<<<<< HEAD

		<div class='clear'></div>
	</div></div>


<<<<<<< HEAD

                    <div class="panel-body" id="calendarPanel" style="height:auto">
                        <div class="panel-body bg-right" >
                    <div class="panel-body" id="calendarCont">
                        <div id="imagePrev" style="border: 5px"></div>

=======
>>>>>>> 2b958f98143285f4f41761a76e82e1fd9d19dece
                                    <div class='clear'></div>
                                </div>
                            </div>

                            <div class="panel-body" id="calendarPanel" style="height:auto">
                                <div id="imagePrev" style="border: 5px"></div>
                                <div class="panel-body bg-right" >
                                    <div class="panel-body" id="calendarCont" style="overflow: auto">
                                        <p id="topLayout" style="visibility: hidden;  width: 100%; height: 130px; border: 2px solid; z-index: 3">Put your image here!</p>
                                        <p id="leftLayout" style="visibility: hidden;  width: 0px; height: 0px; float: left; margin-bottom: 0px;">Put your image here!</p>
                                        <p id="rightLayout" style="visibility: hidden;  width: 0px; height: 0px; float: right">Put your image here!</p>
                                        <div id='calendar'></div>
                                        <p id="bottomLayout" style="visibility: hidden;  width: 100%; height: 130px; border: 2px solid; z-index: 3">Put your image here!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-2">

<<<<<<< HEAD
=======

		<div class='clear'></div>
	</div></div>

>>>>>>> parent of 2ec1ba1... Nothing
=======
<<<<<<< HEAD
=======
>>>>>>> 567633e464ba8ffca9a24ff378657addfa5916ed
                    <div class="panel-body" id="calendarPanel" style="height:auto">
                        <div class="panel-body bg-right" >
                    <div class="panel-body" id="calendarCont">
                        <div id="imagePrev" style="border: 5px"></div>
<<<<<<< HEAD

<<<<<<< HEAD
=======
>>>>>>> parent of 2ec1ba1... Nothing
=======
>>>>>>> 2b958f98143285f4f41761a76e82e1fd9d19dece
>>>>>>> 567633e464ba8ffca9a24ff378657addfa5916ed
                        <div id="videoDiv" style="visibility: hidden"></div>
                        <p id="topLayout" style="visibility: hidden;  width: 0px; height: 0px;">Put your image here!</p>
                        <p id="leftLayout" style="visibility: hidden;  width: 0px; height: 0px; float: left; margin-bottom: 0px;">Put your image here!</p>
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
                                        defaultDate: '2017-10-12',
                                        weekNumbers: false,
                                        navLinks: true, // can click day/week names to navigate views
                                        editable: true,
                                        eventLimit: true, // allow "more" link when too many events
                                        dayNames: ['S', 'M', 'T', 'W', 'T', 'F', 'S']
                                });
                        },

                        change: function(themeSystem) {
                                $('#calendar').fullCalendar('option', 'themeSystem', themeSystem);
                        }

                });
        
        // Restablecemos los layouts
        $("#topLayout").hide().droppable();
        $("#bottomLayout").hide().droppable();
        $("#leftLayout").hide().droppable();
        $("#rightLayout").hide().droppable();
        $('#calendar').droppable();
        
        // Function to show the top Layout
        $("#showTopLayout").click(function(){
            
            //Comprobamos si hay un video presente
            var actualSize = document.getElementById('videoDiv').style.height;
            var recommendedHeight;
                if((actualSize == 0)||(actualSize == '0px')){
                    // No hay un video presente
                    recommendedHeight = document.getElementById('calendarCont').offsetHeight * 25 / 100;
                    $("#topLayout").css('height',recommendedHeight);
                }else{
                    // Si hay un video presente
                    recommendedHeight = document.getElementById('videoDiv').offsetHeight * 25 / 100;
                    $("#topLayout").css('height',recommendedHeight);
                    var newCalendarHeight = document.getElementById('videoDiv').offsetHeight + document.getElementById('imagePrev').offsetHeight + document.getElementById('topLayout').offsetHeight + 3;
                    $("#calendarCont").css('height',newCalendarHeight);
                }
            
            cleanLayout();
            $("#topLayout").css('visibility','visible');
            $("#topLayout").css('width','100%');
            $("#topLayout").css('border-color','black');
            $("#topLayout").css('border-style','solid');
            $("#topLayout").show();
        });
        
        // Function to show the left Layout
        $("#showLeftLayout").click(function(){
        cleanLayout();
        $("#leftLayout").css('visibility','visible');
        
        var actualSize = document.getElementById('videoDiv').style.height;
        if((actualSize == 0)||(actualSize == '0px')){
            $("#leftLayout").css('height',document.getElementById('calendarCont').offsetHeight);
        }else{
            $("#leftLayout").css('height',(document.getElementById('videoDiv').offsetHeight));
        }
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
        $("#bottomLayout").css('height','25%');
        $("#calendar").css('max-height','75%');
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
        
        
        });
        
</script>

<script type="text/javascript">
    
    $("#addImage").click(function(){
        document.getElementById('upImage').click();
    });

    $("#upImage").change(function(){
        if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = $('<div class="erasable"><div class="imageContainer"><img class="resis" src="' + e.target.result + '"></div></div>');
                    $('#imagePrev').append(img);
                    $(".resis").resizable();
                    $(".imageContainer").draggable({
                        start: function(event, ui) {
                            isDraggingMedia = true;
                        },
                        stop: function(event, ui) {
                            isDraggingMedia = false;
                        },
                        revert: 'invalid',
                    });
                };
                reader.readAsDataURL(this.files[0]);
            }
    });
    
    $("#addVideo").click(function(){
        var actualSize = document.getElementById('videoDiv').style.height;
        if((actualSize == 0)||(actualSize == '0px')){
            var originalSizeCont = document.getElementById('calendarCont').offsetHeight;
            document.getElementById('toolsCont').style.height = originalSizeCont * 2 + 30 +'px';
            document.getElementById('calendarCont').style.height = originalSizeCont * 2 +'px';
            document.getElementById('videoDiv').style.height = originalSizeCont +'px';
            $("#videoDiv").css('visibility','visible');
            
            var video = $('<video />', {
                id: 'video',
                src: "{{ asset('vid/001.mp4') }}",
                autoplay: true,
                type: 'video/mp4',
                loop: true,
                controls: false
            });
            video.appendTo($('#videoDiv'));
            $("#video").css('width','100%');
            $("#video").css('height','100%');
            
            $("#imagePrev").css('height','48%');
            $("#imagePrev").css('width','98%');
            $("#imagePrev").css('top','453px');
        }

    });
    
    $("#removeVideo").click(function(){
        var actualSize = document.getElementById('videoDiv').style.height
        if((actualSize != 0) && (actualSize != '0px')){
            var originalSizeBig = document.getElementById('calendarCont').offsetHeight;
            document.getElementById('videoDiv').style.height = 0 + 'px';
            $("#bottomLayout").css('visibility','hidden');
            document.getElementById('toolsCont').style.height = originalSizeBig / 2 + 30 +'px';
            document.getElementById('calendarCont').style.height = originalSizeBig / 2 +'px';
            $("#video").remove();
            $("#imagePrev").css('height','87%');
            $("#imagePrev").css('top','42px');
        }
    });
    
</script>
<script type="text/javascript">
            $(init);

            function init() {
                // We configure the button whose create a new text object
                $("#addButton").click(function () {
                    $('#imagePrev').append('<div class="erasable"><p class="d" contenteditable="true">Double click here</p></div>');
                    
                    $(".erasable").draggable();
                    
                    $(".erasable").click(function() {
                        $(this).draggable( {disabled: false, revert:'invalid'});
                    });
                    
                    $(".erasable").dblclick(function() {
                        $(this).draggable( {disabled: true, revert:'invalid'});
                    });
                });
                
                var offsetHeight1 = document.getElementById('calendarPanel').offsetHeight;
                document.getElementById('toolsPanel').style.height = offsetHeight1 + 'px';
                
                var offsetHeight = document.getElementById('calendarCont').offsetHeight;
                document.getElementById('toolsCont').style.height = offsetHeight + 30 +'px';
            };
</script>
@endsection