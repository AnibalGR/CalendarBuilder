@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/fullcalendar.min.css') }}" rel='stylesheet' />
<link href="{{ asset('css/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />
<link href="{{ asset('css/bootstrap.vertical-tabs.css') }}" rel="stylesheet" >
<link href="{{ asset('css/custom-calendar.css') }}" rel="stylesheet" >
<link href="{{ asset('css/switchButton.css') }}" rel="stylesheet" >
<style>
    #progressbar {
    margin-top: 20px;
  }
 
  .progress-label {
    font-weight: bold;
    text-shadow: 1px 1px 0 #fff;
  }
 
  .ui-dialog-titlebar-close {
    display: none;
  }
</style>
@endsection


@section('customButtons')
<button id="saveImage">Generate Calendar Video</button>
<button id="saveCalendar">Save Calendar</button>
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
                                        <!--Upload Image Form-->
                                        <form method="POST" action="{{ route('uploadImage') }}" id="form-upload" enctype="multipart/form-data">
                                            <input id="upImage" name="upImage" type="file" style="display:none;" accept=".jpg,.jpeg,.png,.svg,.gif"/>
                                            {{ csrf_field() }}
                                            <button id="addImage" type="button" class="btn btn-primary">Upload Image</button>
                                        </form>
                                        <div id='imageError'></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <div class="row">
                                        <div class="container">
                                            <div class="col-xs-7 col-sm-2 zeropdg">
                                                <div class="addVideoBox">
                                                    <img id="addVideo1" src="{{ asset('img/thumb/video-1.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo2" src="{{ asset('img/thumb/video-2.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo3" src="{{ asset('img/thumb/video-3.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo4" src="{{ asset('img/thumb/video-1.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo5" src="{{ asset('img/thumb/video-2.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-3 zeropdg">
                                                <!--Upload Video Form-->
                                                <form method="POST" action="{{ route('uploadVideo') }}" id="form-uploadV" enctype="multipart/form-data">
                                                    <input id="upVideo" name="upVideo" type="file" style="display:none;" accept=".mpg,.avi,.flv,.mkv,.mov,.mp4,.ogv,.webm,.wmv"/>
                                                    {{ csrf_field() }}
                                                    <button id="addVideo" type="button" class="btn btn-primary">Upload Video</button>
                                                </form>
                                                <div id='videoError'></div>
                                                <form method="POST" action="{{ route('delVideo') }}" id="del_video">
                                                    <input id="idVideo" name="idVideo" type="hidden"/>
                                                    {{ csrf_field() }}
                                                    <button id="removeVideo" type="button" class="btn btn-danger">Remove</button>
                                                </form>
                                                <div id="dialog" title="Video Upload">
                                                    <div class="progress-label">Starting upload...</div>
                                                    <div id="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="tab-pane" id="Background">
                                    <div class="addVideoBox">
                                        <img id="addVideo5" src="{{ asset('img/thumb/video-2.jpg') }}" class="img-responsive" height="75px" width="150px">
                                    </div>
                                    <!-- Rounded switch -->
                                    <label class="switch" >
                                        <input type="checkbox" id="delObject">
                                        <span class="slider round"></span>
                                    </label>
                                    <button id="removeObject" type="button" class="btn btn-primary" style="width: 100%">Remove Object</button>
                                We are going to put some season image to use as background!
                                </div>
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

                                            <select id='themeCategory'>
                                                @if($themeC == 'standard')
                                                <option value='standard' selected>Without theme</option>
                                                <option value='jquery-ui'>With theme</option>
                                                @else
                                                <option value='standard'>Without theme</option>
                                                <option value='jquery-ui' selected="">With theme</option>	
                                                @endif
                                            </select>
                                        </div>
                                        <div id="themeSelector" data-theme-system="jquery-ui" class='selector' style='display:none'>
                                            Theme Name:

                                            <select id='theme'>
                                                <option value='black-tie'>Black Tie</option>
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
                                {!! $content !!}
                                <div class="panel-body bg-right prueba full-width" id='calendarBackground' style="background-image: url('../../img/backgrounds/christmas.jpg'); background-size: cover;">
                                    <div class="panel-body prueba" id="calendarCont" style="overflow: auto">
                                        <p id="topLayout" class="prueba" style="visibility: hidden;  width: 100%; height: 130px; border: 2px solid; z-index: 3">Put your image here!</p>
                                        <p id="leftLayout" class="prueba" style="visibility: hidden;  width: 0px; height: 0px; float: left; margin-bottom: 0px;">Put your image here!</p>
                                        <p id="rightLayout" class="prueba" style="visibility: hidden;  width: 0px; height: 0px; float: right">Put your image here!</p>
                                        <div id="calendar" class="prueba"></div>
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
    </div>
    <!--Save Calendar Form-->
    <form method="POST" action="{{ route('saveCalendar') }}" id="form-save">
        <input id="idCal" name="idCal" type="text" style="visibility: hidden">
        <input id="nameCal" name="nameCal" type="text" style="visibility: hidden">
        <input id="yearCal" name="yearCal" type="text" style="visibility: hidden">
        <input id="monthCal" name="monthCal" type="text" style="visibility: hidden">
        <input id="themeCCal" name="themeCCal" type="text" style="visibility: hidden">
        <input id="themeCal" name="themeCal" type="text" style="visibility: hidden">
        <input id="videoCal" name="videoCal" type="text" style="visibility: hidden">
        <input id="layoutCal" name="layoutCal" type="text" style="visibility: hidden">
        <textarea id="contentCal" name="contentCal" form="form-save" maxlength="50000" style="visibility: hidden"></textarea>
        {{ csrf_field() }}
    </form>
    <!--Save Calendar Form-->
    <form method="POST" enctype="multipart/form-data" action="{{ route('saveImage') }}" id="myForm">
        <input type="hidden" name="img_val" id="img_val" value="" />
        <input type="hidden" name="cal_val" id="cal_val" value="" />
        {{ csrf_field() }}
    </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/theme-chooser.js') }}"></script>
<script src="{{ asset('js/textEditor.js') }}"></script>
<script src="{{ asset('js/html2canvas.svg.min.js') }}"></script>
<script src="{{ asset('js/html2canvas.js') }}"></script>
<script src="{{ asset('js/jquery.plugin.html2canvas.js') }}"></script>
<script src="{{ asset('js/progressBar.js') }}"></script>
<script src="{{ asset('js/calendarBuilder.js') }}"></script>
<script src="{{ asset('js/bootstrap-waitingfor.min.js') }}"></script>
<script>
// Asociative function to call the Input File buton
$("#addVideo").click(function () {
    document.getElementById('upVideo').click();
});

// Input Video File function
$("#upVideo").change(function () {
    
    if (this.files && this.files[0]) {

        var fd = new FormData();
        fd.append('file', this.files[0]);

        $("#dialog").dialog("open");
        progressbar = $("#progressbar");

        var $request;

        $request = $.ajax({
            xhr: function () {
                var xhr = new window.XMLHttpRequest();

                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        console.log(percentComplete);
                        progressbar.progressbar("value", percentComplete);
                        if (percentComplete === 100) {
                            $("#dialog").dialog("close");
                            waitingDialog.show('Please wait while your video is processed!', {dialogSize: 'sm', progressType: 'success'});
                        }
                    }
                }, false);

                return xhr;
            },
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('uploadVideo') }}",
            contentType: false,
            processData: false,
            data: fd,
            success: function (url) {
                waitingDialog.hide();
                    if ($("#video")) {
                        $("#video").remove();
                    }
                    $("#videoDiv").css('visibility', 'visible');
                    var video = $('<video />', {
                        id: 'video',
                        src: '{{ asset("") }}' + url,
                        autoplay: false,
                        type: 'video/mp4',
                        loop: false,
                        controls: true
                    });
                    video.appendTo($('#videoDiv'));
                    $("#video").css('width', '100%');
                    $("#video").css('height', '100%');
                    $("#videoTab").trigger("click");
                    $( "#saveCalendar" ).trigger( "click" );
            },
            error: function (data) {
                try {
                    waitingDialog.hide();
                    if (!$('#imageError').html().length) {
                        $('#imageError').append("<p>" + data.responseJSON.message + "</p>");
                    }
                } catch (err) {
                    console.log(err);
                }
            }
        });
        
        // Cancel Upload Video button
        $("#cancelUpload").click(function () {
            if ($request) {
                $request.abort();
                $("#dialog").dialog("close");
            }
        });
    }

    $("#upVideo").val(null);
    $("#addVideo").focus();
    
    
    
});

// Asociative function to call the Input File buton
$("#addImage").click(function () {
    document.getElementById('upImage').click();
});

// Input Image File function
$("#upImage").change(function () {

    if (this.files && this.files[0]) {

        var fd = new FormData();
        fd.append('file', this.files[0]);

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('uploadImage') }}",
            contentType: false,
            processData: false,
            data: fd,
            success: function (data) {
                var img = $('<div class="erasable imageContainer"><input type="text" class="closebtn" value="X"><img class="resis" src=" ../../' + data + '"></div>');
                $('#imagePrev').append(img);
                $('#imagePrev').droppable();
                $(".resis").resizable();
                $(".imageContainer").draggable({ revert: 'invalid' });
            },
            error: function (data) {
                alert(data.responseJSON.message);
                if (!$('#imageError').html().length) {
                    $('#imageError').append("<p>" + data.responseJSON.message + "</p>");
                }
                var salida = JSON.stringify(data);
                alert(salida);
            }
        });
    }
    $("#upImage").val(null);
});

// Initialize all the functions and variables
$(document).ready(function() {
        
    $( "#tabs" ).tabs();
        
    updateTheme();
        
    // Function to load the calendar
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
                navLinks: true,
                editable: true,
                eventLimit: true,
                showNonCurrentDates: false,
            });
            
            resizeLayout();
            
        },
        change: function(themeSystem) {
            $('#calendar').fullCalendar('option', 'themeSystem', themeSystem);
        }
    });
    
    cleanLayout();
    
    loadLayout();
    
    loadVideo();
    
    setObjectsProperties();
});        

// Function to setup a predeterminated video
function changeVideo(id) {

    var url;

    switch (id) {
        case 1:
            url = "{{ asset('vid/001.mp4') }}";
            break;
        case 2:
            url = "{{ asset('vid/002.mp4') }}";
            break;
        case 3:
            url = "{{ asset('vid/003.mp4') }}";
            break;
    }

    if (!$("#video").is(":visible")) {
        $("#videoDiv").css('visibility', 'visible');
        var video = $('<video />', {
            id: 'video',
            src: url,
            autoplay: true,
            type: 'video/mp4',
            loop: false,
            controls: true
        });
        video.appendTo($('#videoDiv'));
        $("#video").css('width', '100%');
        $("#video").css('height', '100%');

        $("#videoTab").trigger("click");
    } else {
        $('#video').attr('src', url);
        $("#video")[0].load();
    }
    
}
        
// Function to show the top Layout
$("#showTopLayout").click(function(){
           
    showTopLayout();
            
});
        
// Function to show the left Layout
$("#showLeftLayout").click(function(){
            
    showLeftLayout();
            
});
        
function setObjectsProperties(){
    
    // Image properties
//    $('.resis').resizable("destroy");
    $(".resis").resizable();
    $(".imageContainer").draggable({ revert: 'invalid' });
    $('#imagePrev').droppable();
    
    // Text properties
//    $('.CalTxt1').resizable();
    
    $(".erasable").draggable();
    
    $(".erasable").click(function () {
        $(this).draggable({disabled: false, revert: 'invalid'});
    });

    $(".erasable").dblclick(function () {
        $(this).draggable({disabled: true, revert: 'invalid'});
        $('.CalTxt1').attr('contenteditable', true);
        $(this).setAttribute('contenteditable', true);
    });

}
        
// Function to show the right Layout
$("#showRightLayout").click(function(){
            
    showRightLayout();
            
});
        
// Function to show the bottom Layout
$("#showBottomLayout").click(function(){
            
    showBottomLayout();
    
});
        
function showBottomLayout(){
    // Clean any previous layout
    cleanLayout();
            
    // Must see if is already visible
    $("#bottomLayout").css('visibility', 'visible');
    $("#bottomLayout").css('border-color','black');
    $("#bottomLayout").css('border-style','solid');
            
    // Show top Layout
    $("#bottomLayout").show();

}
        
function showTopLayout(){
    // Clean any previous layout
    cleanLayout();
            
    // Must see if is already visible
    $("#topLayout").css('visibility', 'visible');
    $("#topLayout").css('border-color','black');
    $("#topLayout").css('border-style','solid');
            
    // Show top Layout
    $("#topLayout").show();
}
        
function showLeftLayout(){
    cleanLayout();
    $("#leftLayout").css('visibility','visible');
    $("#leftLayout").css('height',$("#calendarCont").height());
    $("#leftLayout").css('width','25%');
    $("#leftLayout").css('border-color','black');
    $("#leftLayout").css('border-style','solid');
    $("#calendar").css('max-width','75%');
    $("#calendar").css('float','right');
    $("#leftLayout").show();
}

function resizeLayout(){
    if($("#leftLayout").is(":visible")){
        $("#leftLayout").css('height',$("#calendarCont").height());
    }
    if($("#rightLayout").is(":visible")){
        $("#rightLayout").css('height',$("#calendarCont").height());
    }
}

function showRightLayout(){
            
    cleanLayout();
    $("#rightLayout").css('visibility','visible');
    $("#rightLayout").css('height',$("#calendarCont").height());
    $("#rightLayout").css('width','25%');
    $("#rightLayout").css('border-color','black');
    $("#rightLayout").css('border-style','solid');
    $("#calendar").css('max-width','75%');
    $("#calendar").css('float','left');
    $("#rightLayout").show();
            
}
        
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

function getLayout(){
    if($("#bottomLayout").is(":visible")){
        return 'bottom';
    }
    if($("#rightLayout").is(":visible")){
        return 'right';
    }
    if($("#leftLayout").is(":visible")){
        return 'left';
    }
    if($("#topLayout").is(":visible")){
        return 'top';
    }
    return 'none';
}

function loadLayout(){
    $actualLayout = '{{ $layout }}';
    switch($actualLayout){
        case "none":
            cleanLayout();
            break;
        case "top":
            showTopLayout();
            break;
        case "bottom":
            showBottomLayout();
            break;
        case "left":
            showLeftLayout();
            break;
        case "right":
            showRightLayout();
            break;
    }
}

function loadVideo(){
    var url = '{{ $video }}'
    if(url != 'none'){
        $("#videoDiv").css('visibility', 'visible');
        var video = $('<video />', {
            id: 'video',
            src: url,
            autoplay: false,
            type: 'video/mp4',
            loop: false,
            controls: true
        });
        video.appendTo($('#videoDiv'));
        $("#video").css('width', '100%');
        $("#video").css('height', '100%');
        $("#videoDiv").show();
    }
}


function updateTheme(){
    $actualThemeC = '{{ $themeC }}'
    if($actualThemeC == 'jquery-ui'){
        $actualTheme = '{{ $theme }}';
        $('#theme').val($actualTheme);
    }
}
        
        
</script>

<script type="text/javascript">
// Render Image from Calendar    
$('#saveImage').click(function () {
    waitingDialog.show('Please wait while your video is created!', {dialogSize: 'sm', progressType: 'danger'});
    $("#calendarTab").trigger("click");
    
    html2canvas($('#calendarPanel'), {
        scale: 4,
        onrendered: function (canvas) {
                $('#img_val').val(canvas.toDataURL("image/png"));
                $('#cal_val').val("{{ $id }}");
        }
    });
    setTimeout(function(){
    var form = $('#myForm');
    var url = form.attr('action');
    var data = form.serialize();
    $.post(url, data, function(result){
        waitingDialog.hide();
            alert(result);
        }).fail(function(e){
            waitingDialog.hide();
            alert (JSON.stringify(e));
        });
        }, 4500);
});
                                    
    // Create new Calendar form popup send-button click event.
$('#saveCalendar').click(function () {
    
    var $themeCategory = $('#themeCategory').val();
    var $theme = $('#theme').val();
    var $layout = getLayout();
    var video = $('#video').length;
    var $src = "none";
    if(video){
        $src = $('#video').attr('src');
    };
    var $content = $('#imagePrev').html();
    $('#idCal').val('{{$id}}');
    $('#nameCal').val('{{$name}}');
    $('#yearCal').val('{{$year}}');
    $('#monthCal').val('{{$month}}');
    $('#themeCCal').val($themeCategory);
    $('#themeCal').val($theme);
    $('#layoutCal').val($layout);
    $('#videoCal').val($src);
    $('#contentCal').val('<div id="imagePrev" class="prueba" style="border: 5px">' + $content + '</div>');
    var form = $('#form-save');
    var url = form.attr('action');
    var data = form.serialize();
    $.post(url, data, function(result){
            alert(result);
        }).fail(function(e){
            alert (e.message);
        });
});
           
// Remove video function
$("#removeVideo").click(function () {
    if ($("#video").is(":visible")) {
        $('#idVideo').val("{{ $id }}");
        var form = $('#del_video');
        var url = form.attr('action');
        var data = form.serialize();
        $.post(url, data, function(result){
            $("#video").remove();
            $("#calendarTab").trigger("click");
            $( "#saveCalendar" ).trigger( "click" );
        }).fail(function(e){
            alert (e.message);
        });
    }
});

</script>
@endsection