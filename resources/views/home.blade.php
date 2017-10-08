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
                                <div class="tab-pane" id="profile">
                                    <button id="addButton" type="button" class="btn btn-primary" style="width: 100%">Add Text</button>
                                    <div class="form-group">
                                        <label for="sel1">Font Size</label>
                                        <select class="form-control" id="fontSize">
                                            <option>H1</option>
                                            <option>H2</option>
                                            <option>H3</option>
                                            <option>H4</option>
                                            <option selected="selected">H5</option>
                                            <option>H6</option>
                                        </select>
                                            <label for="sel1">Font Name</label>
                                        <select class="form-control" id="fontName">
                                            <option selected="selected">Arial</option>
                                            <option>Arial Black</option>
                                            <option>Calibri</option>
                                            <option>Comic Sans MS</option>
                                            <option>Lucida Sans Unicode</option>
                                            <option>Trebuchet MS</option>
                                            <option>Courier New</option>
                                            <option>Lucida Console</option>
                                            <option>Georgia</option>
                                            <option>Palatino Linotype</option>
                                            <option>Times New Roman</option>
                                            <option>Impact</option>
                                            <option>Tahoma</option>
                                            <option>Verdana</option>
                                        </select>
                                        <label for="sel1">Fore Color</label>
                                        <div class="colorMatrix">
                                            <button class="colorE" id="white">
                                                
                                            </button>
                                            <button class="colorE" id="lightBlue">
                                                
                                            </button>
                                            <button class="colorE" id="steelBlue">
                                                
                                            </button>
                                            <button class="colorE" id="blue">
                                                
                                            </button>
                                            <button class="colorE" id="lightGreen">
                                                
                                            </button>
                                            <button class="colorE" id="green">
                                                
                                            </button>
                                            <button class="colorE" id="darkGreen">
                                                
                                            </button>
                                            <button class="colorE" id="purple">
                                                
                                            </button>
                                            <button class="colorE" id="hotPink">
                                                
                                            </button>
                                            <button class="colorE" id="yellow">
                                                
                                            </button>
                                            <button class="colorE" id="gold">
                                                
                                            </button>
                                            <button class="colorE" id="orange">
                                                
                                            </button>
                                            <button class="colorE" id="red">
                                                
                                            </button>
                                            <button class="colorE" id="gray">
                                                
                                            </button>
                                            <button class="colorE" id="brown">
                                                
                                            </button>
                                            <button class="colorE" id="black">
                                                
                                            </button>
                                        </div>
                                        <label for="sel1">Background Color</label>
                                        <div class="colorMatrix">
                                            <button class="colorE" id="white2">
                                                
                                            </button>
                                            <button class="colorE" id="lightBlue2">
                                                
                                            </button>
                                            <button class="colorE" id="steelBlue2">
                                                
                                            </button>
                                            <button class="colorE" id="blue2">
                                                
                                            </button>
                                            <button class="colorE" id="lightGreen2">
                                                
                                            </button>
                                            <button class="colorE" id="green2">
                                                
                                            </button>
                                            <button class="colorE" id="darkGreen2">
                                                
                                            </button>
                                            <button class="colorE" id="purple2">
                                                
                                            </button>
                                            <button class="colorE" id="hotPink2">
                                                
                                            </button>
                                            <button class="colorE" id="yellow2">
                                                
                                            </button>
                                            <button class="colorE" id="gold2">
                                                
                                            </button>
                                            <button class="colorE" id="orange2">
                                                
                                            </button>
                                            <button class="colorE" id="red2">
                                                
                                            </button>
                                            <button class="colorE" id="gray2">
                                                
                                            </button>
                                            <button class="colorE" id="brown2">
                                                
                                            </button>
                                            <button class="colorE" id="black2">
                                                
                                            </button>
                                        </div>
                                    </div>
                                    <button id="bold" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-bold sb-icons" aria-hidden="true"></span></button>
                                    <button id="italic" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-italic sb-icons" aria-hidden="true"></span></button>
                                    <button id="underline" type="button" class="btn btn-primary">Underline</button>
                                    <button id="undo" type="button" class="btn btn-primary">Undo</button>
                                    <button id="copy" type="button" class="btn btn-primary">Copy</button>
                                    <button id="cut" type="button" class="btn btn-primary">Cut</button>
                                    <button id="delete" type="button" class="btn btn-primary">Delete</button>
                                    <button id="paste" type="button" class="btn btn-primary">Paste</button>
                                    <button id="redo" type="button" class="btn btn-primary">Redo</button>
                                </div>
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
                                <div class="tab-pane" id="Background"><button id="removeObject" type="button" class="btn btn-primary" style="width: 100%">Remove Object</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div id="tabs" style="padding: 0px;">
                    <ul>
                        <li><a href="#tabs-1"><span id="calendarTab" class="glyphicon glyphicon-calendar sb-icons" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 5px"></span>Calendar</a></li>
                        <li><a href="#tabs-2"><span id="videoTab" class="glyphicon glyphicon-film sb-icons" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 10px"></span>Video</a></li>
                    </ul>
                    <div id="tabs-1" style="padding-left: 0px;padding-right: 0px;padding-bottom: 0px;padding-top: 0px">
                        <div class="panel panel-default" style="margin-bottom: 0px">
                            <div class="panel-heading">

                                <div id='top'>
                                    <div class='left'>Calendar: {{ $name }} </div>
                                    <div class='right'>

                                        <div id='theme-system-selector'class='selector' >
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
                                </div>
                            </div>

                            <div class="panel-body prueba" id="calendarPanel" style="height:auto">
                                <div id="imagePrev" class="prueba" style="border: 5px"></div>
                                <div class="panel-body bg-right prueba" >
                                    <div class="panel-body prueba" id="calendarCont" style="overflow: auto">
                                        <p id="topLayout" class="prueba" style="visibility: hidden;  width: 100%; height: 130px; border: 2px solid; z-index: 3">Put your image here!</p>
                                        <p id="leftLayout" class="prueba" style="visibility: hidden;  width: 0px; height: 0px; float: left; margin-bottom: 0px;">Put your image here!</p>
                                        <p id="rightLayout" class="prueba" style="visibility: hidden;  width: 0px; height: 0px; float: right">Put your image here!</p>
                                        <div id='calendar' class="prueba"></div>
                                        <p id="bottomLayout" class="prueba" style="visibility: hidden;  width: 100%; height: 130px; border: 2px solid; z-index: 3">Put your image here!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-2">
                        <div id="videoDiv" style="visibility: hidden"></div>
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
<script src="{{ asset('js/textEditor.js') }}"></script>
<script src="{{ asset('js/html2canvas.svg.min.js') }}"></script>
<script src="{{ asset('js/html2canvas.js') }}"></script>
<script>
    
    $('#saveImage').click(function(){
    html2canvas($('#calendarPanel'), {
        scale: 4,
        onrendered: function(canvas) {
        var a = document.createElement('a');
        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
        a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
        a.download = 'somefilename.jpg';
        a.click();
        }}
    );
    
});
</script>
<script>
    
    $( function() {
        $( "#tabs" ).tabs();
    });
    
    function resizePanels(){
        var offsetHeight1 = document.getElementById('calendarPanel').offsetHeight;
        document.getElementById('toolsPanel').style.height = offsetHeight1 + 'px';
                
        var offsetHeight = document.getElementById('calendarCont').offsetHeight;
        document.getElementById('toolsCont').style.height = offsetHeight + 30 +'px';
    };
    
    $(document).ready(function() {
        initThemeChooser({
            init: function(themeSystem) {
                $('#calendar').fullCalendar({
                                     themeSystem: themeSystem,
                                        height: 'auto',
                                        header: {
                                                left: null,
                                                center: 'title',
                                                right: null
                                        },
                                        defaultDate: '{{ $year }}-{{ $month }}',
                                        weekNumbers: false,
                                        navLinks: true, // can click day/week names to navigate views
                                        editable: true,
                                        eventLimit: true, // allow "more" link when too many events
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
            // Clean any previous layout
            cleanLayout();
            
            // Must see if is already visible
            if($("#topLayout").is(":visible")){
                // We hide it if visible
                $("#topLayout").hide();
            }else{
                $("#topLayout").css('visibility', 'visible');
                $("#topLayout").show();
            }
            
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
        // Must see if is already visible
            if($("#bottomLayout").is(":visible")){
                // We hide it if visible
                $("#bottomLayout").hide();
            }else{
                $("#bottomLayout").css('visibility', 'visible');
                $("#bottomLayout").show();
            }
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
        if(!$("#video").is(":visible")){
            $("#videoDiv").css('visibility','visible');
            
            var video = $('<video />', {
                id: 'video',
                src: "{{ asset('vid/001.mp4') }}",
                autoplay: true,
                type: 'video/mp4',
                loop: false,
                controls: true
            });
            video.appendTo($('#videoDiv'));
            $("#video").css('width','100%');
            $("#video").css('height','100%');
   
            $("#videoTab").trigger("click");
        }                   
    });
    
    $("#removeVideo").click(function(){
        if($("#video").is(":visible")){
            $("#video").remove();
            $("#calendarTab").trigger("click");
        }
    });
     
</script>

<script type="text/javascript">
        $(init);

            function init() {
                // We configure the button whose create a new text object
                $("#addButton").click(function () {
                    $('#imagePrev').append('<div class="erasable"><p class="d" contenteditable="true">Double click here</p><input type="image" class="closebtn" src="{{ asset('img/delete-element.png') }}"></div>');
                    
                    $(".erasable").draggable();
                    
                    $('.d').resizable();
                    
                    $(".erasable").click(function() {
                        $(this).draggable( {disabled: false, revert:'invalid'});
                    });
                    
                    $(".erasable").dblclick(function() {
                        $(this).draggable( {disabled: true, revert:'invalid'});
                        $('.d').setAttribute('contenteditable',true);
                        $(this).setAttribute('contenteditable',true);
                    });
                });
            };
</script>
@endsection