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

@section('content')
<div class="container-fluid" id="Background-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 panel-header1 padd-20">
        <div class="col-md-4 head-calendar">
            
        </div>
        <div class="col-md-8 head-calendar">
            <div class="col-md-12">
            <div class="col-md-3">
            @if (Auth::user()->subscribed('main'))
            <button id="generateVideo" type="button" class="btn btn-labeled btn-default">
                                                        <span class="btn-label"><i class="glyphicon glyphicon-facetime-video sb-icons-3"></i></span><span class="text-whiteBG">GENERATE VIDEO</span></button>
            </div>
                <div class="col-md-1 space-5"></div>
            <div class="col-md-3">
            <button id="saveCalendar" type="button" class="btn btn-labeled btn-default">
                                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk sb-icons-3"></i></span><span class="text-whiteBG">SAVE CALENDAR</span></button>
            @endif
            </div>
            <div class="col-md-3">
            
                <div id="actionsAlerts" class="aAlerts">
                    
                </div>
            
            
            </div>
                
            </div>
        </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4" >
                <div class="panel panel-default">
                    <!--<div class="panel-heading" id='toolsPanel'>Tools</div>-->
                    <div class="panel-body panel-left" id="toolsCont">
                        <div class="col-xs-3 BGapp1"> <!-- required for floating -->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tabs-left" id="left-menu">
                                <li class="active"><a href="#color" data-toggle="tab">
                                        <span class="fa fa-paint-brush sb-icons" aria-hidden="true"></span>
                                        COLOR</a>
                                </li>
                                <li><a href="#home" data-toggle="tab">
                                        <span class="glyphicon glyphicon-th sb-icons" aria-hidden="true"></span>
                                        LAYOUT</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">
                                        <span class="glyphicon glyphicon-text-width sb-icons" aria-hidden="true"></span>
                                        TEXT</a>
                                </li>
                                <li><a href="#shapes" data-toggle="tab">
                                        <span class="glyphicon glyphicon-star sb-icons" aria-hidden="true"></span>
                                        SHAPES</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">
                                        <span class="glyphicon glyphicon-picture sb-icons" aria-hidden="true"></span>
                                        IMAGE</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">
                                        <span class="glyphicon glyphicon-film sb-icons" aria-hidden="true"></span>
                                        VIDEO</a>
                                </li>
                                <li><a href="#Background" data-toggle="tab">
                                        <span class="glyphicon glyphicon-picture sb-icons" aria-hidden="true"></span>
                                        BG
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-9 BGapp">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="contenedor"></div>
                                <div class="tab-pane active" id="color">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-12 space-20">
                                                    <button id="removeCalendarBackColor" type="button" class="btn btn-labeled btn-default2">
                                                        <span class="btn-label"><i class="glyphicon glyphicon-erase sb-icons-4"></i></span><span class="text-whiteBG">REMOVE</span></button>
                                            </div>
                                        </div>
                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-4">
                                                Year color:
                                            </div>
                                            <div class="col-xs-7 col-md-8">
                                                <input type="color" value="" id="calendarYearColor" size="5">
                                            </div>
                                        </div>
                                        
                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-4">
                                                Week color:
                                            </div>
                                            <div class="col-xs-7 col-md-8">
                                                <input type="color" value="" id="calendarWeekColor" size="5">
                                            </div>
                                        </div>
                                        
                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-4">
                                                Day color:
                                            </div>
                                            <div class="col-xs-7 col-md-8">
                                                <input type="color" value="" id="calendarDayColor" size="5">
                                            </div>
                                        </div>

                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-4">
                                                BG color:
                                            </div>
                                            <div class="col-xs-7 col-md-8">
                                                <input type="color" value="" id="calendarBackColor" size="5">
                                            </div>
                                        </div>
                                        
                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-4">
                                                Opacity:
                                            </div>
                                            <div class="col-xs-7 col-md-8">
                                                <input type="range" value="1" min="0" max="1" step="0.001" id="background-color-opacity">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="home">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-12 space-20">
                                                    <button id="noneLayout" type="button" class="btn btn-labeled btn-default2">
                                                        <span class="btn-label"><i class="glyphicon glyphicon-erase sb-icons-4"></i></span><span class="text-whiteBG">REMOVE</span></button>
                                            </div>
                                            <!--
                                            <div class="col-xs-12 text-center">
                                                <div class="layoutType">
                                                    <button id="noneLayout" type="button" class="btn-danger btn-custom"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span>Remove Layout</button>
                                                    <!--<img id="noneLayout" src="{{ asset('img/thumb/layout-1.jpg') }}" class="img-responsive" height="100px" width="150px">-->
                                        <!--        
                                                </div>
                                            </div>
                                            -->
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="showTopLayout" src="{{ asset('img/thumb/layout-2.jpg') }}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="showBottomLayout" src="{{ asset('img/thumb/layout-3.jpg') }}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="showLeftLayout" src="{{ asset('img/thumb/layout-4.jpg') }}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="showRightLayout" src="{{ asset('img/thumb/layout-5.jpg') }}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile">
                                    <div class="container-fluid">
                                        <div class="row space-20">
                                            <div class="col-xs-6">
                                                    <button id="addText" type="button" class="btn btn-labeled btn-default">
                                                        <span  class="btn-label"><i class="glyphicon glyphicon-erase sb-icons-3"></i></span><span class="text-whiteBG">ADD TEXT</span></button>
                                            </div>
                                            <div class="col-xs-6">
                                                    <button id="removeText" type="button" class="btn btn-labeled btn-default2">
                                                        <span  class="btn-label"><i class="glyphicon glyphicon-erase sb-icons-4"></i></span><span class="text-whiteBG">REMOVE</span></button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <!--<button id="addText" type="button" class="btn btn-primary btn-custom"><span class="fa fa-text-width" aria-hidden="true"></span> Add Text</button>-->
                                               
                                                <div id="text-wrapper" style="margin-top: 10px" ng-show="getText()">

                                                    <div id="text-controls">

                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                <span class="fa fa-font"></span>
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <div class="styled-select blue semi-square">
                                                                <select id="font-family">
                                                                    <option value="arial">Arial</option>
                                                                    <option value="helvetica" selected>Helvetica</option>
                                                                    <option value="myriad pro">Myriad Pro</option>
                                                                    <option value="delicious">Delicious</option>
                                                                    <option value="verdana">Verdana</option>
                                                                    <option value="georgia">Georgia</option>
                                                                    <option value="courier">Courier</option>
                                                                    <option value="comic sans ms">Comic Sans MS</option>
                                                                    <option value="impact">Impact</option>
                                                                    <option value="monaco">Monaco</option>
                                                                    <option value="optima">Optima</option>
                                                                    <option value="hoefler text">Hoefler Text</option>
                                                                    <option value="plaster">Plaster</option>
                                                                    <option value="engagement">Engagement</option>
                                                                </select>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                <span class="fa fa-align-center"></span>
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <div class="styled-select blue semi-square">
                                                                    <select id="text-align">
                                                                        <option value="left">Left</option>
                                                                        <option value="center">Center</option>
                                                                        <option value="right">Right</option>
                                                                        <option value="justify">Justify</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                <span class="fa fa-bold"></span>
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <input type='checkbox' name='fonttype' id="text-cmd-bold">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                <span class="fa fa-italic"></span>
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <input type='checkbox' name='fonttype' id="text-cmd-italic">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Text Color:
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <input type="color" value="" id="text-color" size="10">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                BG text color:
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <input type="color" value="" id="text-lines-bg-color" size="10">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Box color:
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <input type="color" value="" id="text-bg-color" size="10">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Stroke color:
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <input type="color" value="" id="text-stroke-color">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Stroke width:
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <input type="range" value="1" min="1" max="5" id="text-stroke-width">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Font size:
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <input type="range" value="" min="1" max="120" step="1" id="text-font-size">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Line height:
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <input type="range" value="" min="0" max="10" step="0.1" id="text-line-height">
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="shapes">
                                    <div class="container-fluid">
                                        <div class="row space-20">
                                            <div class="col-xs-12">
                                                    <button id="removeShape" type="button" class="btn btn-labeled btn-default2">
                                                        <span  class="btn-label"><i class="glyphicon glyphicon-erase sb-icons-4"></i></span><span class="text-whiteBG">REMOVE</span></button>
                                            </div>
                                        </div>
                                        
                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-4">
                                                Shape color:
                                            </div>
                                            <div class="col-xs-7 col-md-8">
                                                <input type="color" value="" id="shapeColor" size="10">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addRect" src="{{ asset('img/shapes/square.jpg') }}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addLine" src="{{ asset('img/shapes/line.jpg') }}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addCircle" src="{{ asset('img/shapes/circle.jpg') }}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addTriangle" src="{{ asset('img/shapes/triangle.jpg') }}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addStar5" src="{{ asset('img/shapes/star.jpg') }}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addStar4" src="{{ asset('img/shapes/star-2.jpg') }}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!--
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <button id="addRect" type="button" class="btn btn-primary btn-custom">Add Rectangle</button>
                                            </div>
                                            <div class="col-xs-6">
                                                <button id="addLine" type="button" class="btn btn-primary btn-custom">Add Line</button>    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <button id="addCircle" type="button" class="btn btn-primary btn-custom">Add Circle</button>
                                            </div>
                                            <div class="col-xs-6">
                                                <button id="addStar4" type="button" class="btn btn-primary btn-custom">Add Star (4 edges)</button>    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <button id="addTriangle" type="button" class="btn btn-primary btn-custom">Add Triangle</button>
                                            </div>
                                            <div class="col-xs-6">
                                                <button id="addStar5" type="button" class="btn btn-primary btn-custom">Add Star (5 edges)</button>    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="shapeColor" style="display:inline-block">Shape color:</label>
                                            <input type="color" value="" id="shapeColor" size="10">
                                        </div>
                                        
                                        -->
                                        
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="messages">
                                    <div class="container-fluid">
                                        <div class="row space-20">
                                            <div class="col-xs-6">
                                                <!--Upload Image Form-->
                                                <form method="POST" action="{{ route('uploadImage') }}" id="form-upload" enctype="multipart/form-data">
                                                    <input id="upImage" name="upImage" type="file" style="display:none;" accept=".jpg,.jpeg,.png,.svg,.gif"/>
                                                    {{ csrf_field() }}
                                                    <button id="addImage" type="button" class="btn btn-labeled btn-default">
                                                        <span class="btn-label"><i class="glyphicon glyphicon-upload sb-icons-3"></i></span><span class="text-whiteBG">UPLOAD</span></button>
                                                    <!--<button id="addImage" type="button" class="btn btn-success btn-custom"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>-->
                                                </form>
                                                <div id='imageError'></div>
                                            </div>
                                            <div class="col-xs-6">
                                                    <button id="removeObject" type="button" class="btn btn-labeled btn-default2">
                                                        <span  class="btn-label"><i class="glyphicon glyphicon-erase sb-icons-4"></i></span><span class="text-whiteBG">REMOVE</span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 zeropdg-2">
                                                <div class="addImgBox">
                                                    <img id="addImg1" src="{{ asset('img/headers/header-1.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg2" src="{{ asset('img/headers/header-2.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg3" src="{{ asset('img/headers/header-3.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg4" src="{{ asset('img/headers/header-4.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg5" src="{{ asset('img/headers/header-5.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg6" src="{{ asset('img/headers/header-6.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 zeropdg-2">
                                                <div class="addImgBox">
                                                    <img id="addImg7" src="{{ asset('img/headers/header-7.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg8" src="{{ asset('img/headers/header-8.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg9" src="{{ asset('img/headers/header-9.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg10" src="{{ asset('img/headers/header-10.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                
                                                <div class="addImgBox">
                                                    <img id="addImg11" src="{{ asset('img/headers/header-11.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg12" src="{{ asset('img/headers/header-12.jpg') }}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <div class="container-fluid">
                                        <div class="row space-20">
                                            <div class="col-xs-6">
                                                <!--Upload Video Form-->
                                                <form method="POST" action="{{ route('uploadVideo') }}" id="form-uploadV" enctype="multipart/form-data">
                                                    <input id="upVideo" name="upVideo" type="file" style="display:none;" accept=".mpg,.avi,.flv,.mkv,.mov,.mp4,.ogv,.webm,.wmv"/>
                                                    {{ csrf_field() }}
                                                    <button id="addVideo" type="button" class="btn btn-labeled btn-default">
                                                        <span class="btn-label"><i class="glyphicon glyphicon-upload sb-icons-3"></i></span><span class="text-whiteBG">UPLOAD</span></button>
                                                    <!--<button id="addVideo" type="button" class="btn btn-success btn-custom"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>-->
                                                </form>
                                            </div>
                                            <div class="col-xs-6">
                                                <form method="POST" action="{{ route('delVideo') }}" id="del_video">
                                                    <input id="idVideo" name="idVideo" type="hidden"/>
                                                    {{ csrf_field() }}
                                                    <button id="removeVideo" type="button" class="btn btn-labeled btn-default2">
                                                        <span  class="btn-label"><i class="glyphicon glyphicon-erase sb-icons-4"></i></span><span class="text-whiteBG">REMOVE</span></button>
                                                   <!--<button id="removeVideo" type="button" class="btn-danger btn-custom"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Remove</button>-->
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 zeropdg">
                                                <div id='videoError'></div>
                                                <div id="dialog" title="Video Upload">
                                                    <div class="progress-label">Starting upload...</div>
                                                    <div id="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 zeropdg-2">
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
                                                    <img id="addVideo4" src="{{ asset('img/thumb/video-4.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo5" src="{{ asset('img/thumb/video-5.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo6" src="{{ asset('img/thumb/video-6.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 zeropdg-2">
                                                <div class="addVideoBox">
                                                    <img id="addVideo7" src="{{ asset('img/thumb/video-7.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo8" src="{{ asset('img/thumb/video-8.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo9" src="{{ asset('img/thumb/video-9.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo10" src="{{ asset('img/thumb/video-10.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo11" src="{{ asset('img/thumb/video-11.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo12" src="{{ asset('img/thumb/video-12.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="tab-pane" id="Background">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <!--
                                            <div class="col-xs-6 zeropdg-2">
                                                <!--Upload Image Form-->
                                                <!--
                                                <form method="POST" action="{{ route('uploadImage') }}" id="form-upload" enctype="multipart/form-data">
                                                    <input id="upBgImg" name="upImage" type="file" style="display:none;" accept=".jpg,.jpeg,.png,.svg,.gif"/>
                                                    {{ csrf_field() }}
                                                    <button id="addBgImg" type="button" class="btn btn-labeled btn-default">
                                                        <span class="btn-label"><i class="glyphicon glyphicon-upload sb-icons-3"></i></span><span class="text-whiteBG">UPLOAD</span></button>
                                                    <button id="addBgImg" type="button" class="btn btn-success btn-custom"><span class="glyphicon glyphicon-upload sb-icons-3" aria-hidden="true"></span> Upload</button>
                                                </form>
                                                
                                                <div id='imageError'></div>
                                            </div>
                                            -->
                                            <div class="col-xs-12 space-20">
                                                <form method="POST" action="{{ route('uploadImage') }}" id="form-upload" enctype="multipart/form-data">
                                                    <input id="upBgImg" name="upImage" type="file" style="display:none;" accept=".jpg,.jpeg,.png,.svg,.gif"/>
                                                    {{ csrf_field() }}
                                                    <button id="removeBg" type="button" class="btn btn-labeled btn-default2">
                                                        <span class="btn-label"><i class="glyphicon glyphicon-erase sb-icons-4"></i></span><span class="text-whiteBG">REMOVE</span></button>
                                                    <!--<button id="removeBg" type="button" class="btn-danger btn-custom"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Remove</button>-->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 zeropdg-2">
                                                <div class="addBgBox">
                                                    <img id="addBg1" src="{{ asset('img/backgrounds/thumbs/april_showers_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg2" src="{{ asset('img/backgrounds/thumbs/autumn_leaves_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg3" src="{{ asset('img/backgrounds/thumbs/balloons_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg4" src="{{ asset('img/backgrounds/thumbs/christmas_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg5" src="{{ asset('img/backgrounds/thumbs/cornucopia_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg6" src="{{ asset('img/backgrounds/thumbs/early_autumn.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg7" src="{{ asset('img/backgrounds/thumbs/easter_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg8" src="{{ asset('img/backgrounds/thumbs/fireplace_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 zeropdg-2">
                                                <div class="addBgBox">
                                                    <img id="addBg9" src="{{ asset('img/backgrounds/thumbs/football_autumn_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg10" src="{{ asset('img/backgrounds/thumbs/grain_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg11" src="{{ asset('img/backgrounds/thumbs/halloween_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg12" src="{{ asset('img/backgrounds/thumbs/hanukkah_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg13" src="{{ asset('img/backgrounds/thumbs/harvest_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg14" src="{{ asset('img/backgrounds/thumbs/ice_cream_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg15" src="{{ asset('img/backgrounds/thumbs/icecle_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg16" src="{{ asset('img/backgrounds/thumbs/independence_day_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 zeropdg-2">
                                                <div class="addBgBox">
                                                    <img id="addBg17" src="{{ asset('img/backgrounds/thumbs/may_flowers_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg18" src="{{ asset('img/backgrounds/thumbs/pumpkin_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg19" src="{{ asset('img/backgrounds/thumbs/spring_buds_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg20" src="{{ asset('img/backgrounds/thumbs/st_patrick_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg21" src="{{ asset('img/backgrounds/thumbs/tulip_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg22" src="{{ asset('img/backgrounds/thumbs/vacation_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg23" src="{{ asset('img/backgrounds/thumbs/valentines_day_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg24" src="{{ asset('img/backgrounds/thumbs/winter_river_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg25" src="{{ asset('img/backgrounds/thumbs/winter_trees_thumb.jpg') }}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 calendar-ini">
                <div id="tabs" style="padding: 0px;">
                    <ul>
                        <li><a href="#tabs-1"><span id="calendarTab" class="glyphicon glyphicon-calendar sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 5px"></span>Calendar</a></li>
                        <li><a href="#tabs-2"><span id="videoTab" class="glyphicon glyphicon-film sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 10px"></span>Video</a></li>
                    </ul>
                    <div id="tabs-1" style="padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px">
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
                            
                            <div class="CalendarContent1" id="calendarPanel">
                                <div class="bgimg-none" id="calendarBack">
                                <div class="panel-body bg-right prueba full-width">
                                    <div id="calendarCont">                                    
                                    </div>
                                        <p id="topLayout" class="prueba" style="visibility: hidden;  width: 100%; height: 130px; border: 2px solid; z-index: 3">Put your image here!</p>
                                        <p id="leftLayout" class="prueba" style="visibility: hidden;  width: 0px; height: 0px; float: left; margin-bottom: 0px;">Put your image here!</p>
                                        <p id="rightLayout" class="prueba" style="visibility: hidden;  width: 0px; height: 0px; float: right">Put your image here!</p>
                                        <div id="calendar" class="prueba" style="z-index: 2"></div>
                                        <p id="bottomLayout" class="prueba" style="visibility: hidden;  width: 100%; height: 130px; border: 2px solid; z-index: 3">Put your image here!</p>
                                </div>
                                <div id="imagePrev" class="prueba box">
                                    <canvas id="c"></canvas>
                                </div>
                                </div>
                            </div>
<!--
                        <div class="CalendarContent1" id="calendarPanel">
                            <div id='calendarBackground' style="width: 100%;height: 100%;position: absolute"></div>

                            <div class="panel-body prueba" id="calendarPanel" >
                                <div class="panel-body bg-right prueba full-width" id="calendarCont" style="position: absolute">
                                        <p id="topLayout" class="prueba" style="visibility: hidden;  width: 100%; height: 130px; border: 2px solid; z-index: 3">Put your image here!</p>
                                        <p id="leftLayout" class="prueba" style="visibility: hidden;  width: 0px; height: 0px; float: left; margin-bottom: 0px;">Put your image here!</p>
                                        <p id="rightLayout" class="prueba" style="visibility: hidden;  width: 0px; height: 0px; float: right">Put your image here!</p>
                                        <div id="calendar" class="prueba" style="z-index: 2"></div>
                                        <p id="bottomLayout" class="prueba" style="visibility: hidden;  width: 100%; height: 130px; border: 2px solid; z-index: 3">Put your image here!</p>
                                </div>
                                <div id="imagePrev" class="prueba box">
                                    <canvas id="c"></canvas>
                                </div>
                            </div>
                            -->
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
        <input id="layoutCal" name="layoutCal" type="text" style="visibility: hidden">
        <input id="backgroundCal" name="backgroundCal" type="text" style="visibility: hidden">
        <input id="colorCal" name="colorCal" type="text" style="visibility: hidden">
        <input id="colorYearCal" name="colorYearCal" type="text" style="visibility: hidden">
        <input id="colorWeekCal" name="colorWeekCal" type="text" style="visibility: hidden">
        <input id="colorDayCal" name="colorDayCal" type="text" style="visibility: hidden">
        <input id="opacityCal" name="opacityCal" type="text" style="visibility: hidden">
        <input id="videoCal" name="videoCal" type="text" style="visibility: hidden">
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
<script src="{{ asset('js/bootstrap-waitingfor.min.js') }}"></script>
<script src="{{ asset('js/fabric.js') }}"></script>
<script src="{{ asset('js/jquery.ba-resize.min.js') }}"></script>
<script src="{{ asset('js/calendarBuilder.js') }}"></script>
<script src="{{ asset('js/layouts.js') }}"></script>
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
            $("#saveCalendar").trigger("click");
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
        case 4:
            url = "{{ asset('vid/004.mp4') }}";
            break;
        case 5:
            url = "{{ asset('vid/005.mp4') }}";
            break;
        case 6:
            url = "{{ asset('vid/006.mp4') }}";
            break;
        case 7:
            url = "{{ asset('vid/007.mp4') }}";
            break;
        case 8:
            url = "{{ asset('vid/008.mp4') }}";
            break;
        case 9:
            url = "{{ asset('vid/009.mp4') }}";
            break;
        case 10:
            url = "{{ asset('vid/010.mp4') }}";
            break;
        case 11:
            url = "{{ asset('vid/011.mp4') }}";
            break;
        case 12:
            url = "{{ asset('vid/012.mp4') }}";
            break;
    }

    if (!$("#video").length) {
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
        $("#saveCalendar").trigger("click");
        $("#videoTab").trigger("click");
    } else {
        $('#video').attr('src', url);
        $("#video")[0].load();
        $("#saveCalendar").trigger("click");
        $("#videoTab").trigger("click");
    }
}

    function loadVideo(){
    var url = '{{ $video }}'
            if (url != 'none'){
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
            if ($actualThemeC == 'jquery-ui'){
    $actualTheme = '{{ $theme }}';
    $('#theme').val($actualTheme);
    }
    }


</script>

<script type="text/javascript">
// Render Image from Calendar    
    $('#generateVideo').click(function () {
    waitingDialog.show('Please wait while your video is created!', {dialogSize: 'sm', progressType: 'danger'});
    $("#calendarTab").trigger("click");
    setTimeout(function(){
        
        html2canvas($('#calendarPanel'), {
            scale: 4,
            onrendered: function (canvas) {
            $('#img_val').val(canvas.toDataURL("image/png"));
            $('#cal_val').val("{{ $id }}");
            }
    });
        
    },1000);
    
    setTimeout(function(){
    var form = $('#myForm');
    var url = form.attr('action');
    var data = form.serialize();
    $.post(url, data, function(result){
    waitingDialog.hide();
    $("#actionsAlerts").empty();
    $("#actionsAlerts").append("<p id='savedTime'>The video was successfully created. You can find it on the <a href='{{ route('dash') }}'>Dashboard</a></p>");
    setTimeout(function(){
        $("#savedTime").fadeOut("slow");
    },5000);
    }).fail(function(e){
    waitingDialog.hide();
    alert (JSON.stringify(e));
    });
    }, 4500);
    });
    
    function getContent(){
    return '{{ $content }}';
    }

    function getLayout(){
        return '{{ $layout }}';
    }
    
    function getCurrentLayout(){
        if ($("#bottomLayout").is(":visible")) {
            return 'bottom';
        }
        if ($("#rightLayout").is(":visible")) {
            return 'right';
        }
        if ($("#leftLayout").is(":visible")) {
            return 'left';
        }
        if ($("#topLayout").is(":visible")) {
            return 'top';
        }
        return 'none';
    }
    
    function getUploadImageRoute(){
        return "{{ route('uploadImage') }}";
    }
    
    function getUserID(){
    return '{{$id}}';
    }

    function getName(){
    return '{{$name}}';
    }

    function getYear(){
    return '{{$year}}';
    }

    function getMonth(){
    return '{{$month}}';
    }
    
    function getColor(){
        return '{{ $color }}';
    }
    
    function getColorYear(){
        return '{{ $colorYear }}';
    }
    
    function getColorWeek(){
        return '{{ $colorWeek }}';
    }
    
    function getColorDay(){
        return '{{ $colorDay }}';
    }
    
    function getOpacity(){
        return '{{ $opacity }}';
    }
    
    function getBackground(){
        return '{{ $background }}';
    }
    
    // Remove video function
    $("#removeVideo").click(function () {
        if ($("#video").length) {
            $('#idVideo').val("{{ $id }}");
            var form = $('#del_video');
            var url = form.attr('action');
            var data = form.serialize();
            $.post(url, data, function(result){
                $("#video").remove();
                $("#calendarTab").trigger("click");
                $("#saveCalendar").trigger("click");
            }).fail(function(e){
                alert (JSON.stringify(e));
            });
        }
    });

</script>
@endsection