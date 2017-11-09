@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/bootstrap-slider.css')}}" rel="stylesheet" >
<link href="{{ asset('css/fullcalendar.min.css')}}" rel='stylesheet' />
<link href="{{ asset('css/fullcalendar.print.min.css')}}" rel="stylesheet" media="print" />
<link href="{{ asset('css/bootstrap.vertical-tabs.css')}}" rel="stylesheet" >
<link href="{{ asset('css/bootstrap-colorpicker.css')}}" rel="stylesheet" >
<link href="{{ asset('css/bootstrap-dialog.css')}}" rel="stylesheet" >
<link href="{{ asset('css/custom-calendar.css')}}" rel="stylesheet" >
<link href="{{ asset('css/switchButton.css')}}" rel="stylesheet" >


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
    
    #custom-handle {
    width: 3em;
    height: 1.6em;
    top: 50%;
    margin-top: -.8em;
    text-align: center;
    line-height: 1.6em;
  }
  
  .ui-icon-circle-close {
    cursor:pointer;
  }
  
</style>
@endsection

@section('content')
<div class="container-fluid" id="Background-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 panel-header1 padd-20">
                <div class="col-md-4 head-calendar" id="headerRow">

                </div>
                <div class="col-md-8 head-calendar">
                    <div class="col-md-12">
                        @if (Auth::user()->subscribed('main'))
                        <div class="col-md-3">
                            <button id="generateVideo" type="button" class="btn btn-labeled btn-default">
                                <span class="btn-label"><i class="glyphicon glyphicon-facetime-video sb-icons-3"></i></span><span class="text-whiteBG">GENERATE VIDEO</span></button>
                        </div>
                        @endif
                        <div class="col-md-1 space-5"></div>
                        <div class="col-md-3">
                            <button id="saveCalendar" type="button" class="btn btn-labeled btn-default">
                                <span class="btn-label">
                                    <i class="glyphicon glyphicon-floppy-disk sb-icons-3"></i>
                                </span>
                                <span class="text-whiteBG">SAVE CALENDAR</span>
                            </button>
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
                                        BACKGROUND <br/>IMAGES
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

                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-4">
                                                Year color:
                                            </div>
                                            <div id="cp1" class="input-group colorpicker-component">
                                                <input id="inputYearColor" type="text" value="#00AABB" class="form-control"/>
                                                <span class="input-group-addon"><i></i></span>
                                            </div>
                                        </div>

                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-4">
                                                Week color:
                                            </div>
                                            <div id="cp2" class="input-group colorpicker-component">
                                                <input type="text" value="#00AABB" class="form-control"/>
                                                <span class="input-group-addon"><i></i></span>
                                            </div>
                                        </div>

                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-4">
                                                Day color:
                                            </div>
                                            <div id="cp3" class="input-group colorpicker-component">
                                                <input type="text" value="#00AABB" class="form-control"/>
                                                <span class="input-group-addon"><i></i></span>
                                            </div>
                                        </div>

                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-4">
                                                Background color:
                                            </div>
                                            <div id="cp4" class="input-group colorpicker-component">
                                                <input type="text" value="#00AABB" class="form-control"/>
                                                <span class="input-group-addon"><i></i></span>
                                            </div>
                                        </div>
                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-6">
                                                Calendar video length (seconds):
                                            </div>
                                            <div class="col-xs-7 col-md-6">
                                                <div id="calendar-video-length"><div id="custom-handle" class="ui-slider-handle"></div></div>
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
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="showTopLayout" src="{{ asset('img/thumb/layout-2.jpg')}}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="showBottomLayout" src="{{ asset('img/thumb/layout-3.jpg')}}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="showLeftLayout" src="{{ asset('img/thumb/layout-4.jpg')}}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="showRightLayout" src="{{ asset('img/thumb/layout-5.jpg')}}" class="img-responsive" height="100px" width="150px">
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
                                                                        <option value="myriad pro">Myriad Pro</option>
                                                                        <option value="verdana">Verdana</option>
                                                                        <option value="georgia">Georgia</option>
                                                                        <option value="courier">Courier</option>
                                                                        <option value="comic sans ms">Comic Sans MS</option>
                                                                        <option value="impact">Impact</option>
                                                                        <option value="monaco">Monaco</option>
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
                                                                Text color:
                                                            </div>
                                                            <div id="cp5" class="input-group colorpicker-component">
                                                                <input type="text" value="#000000" class="form-control"/>
                                                                <span class="input-group-addon"><i></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Background text color:
                                                            </div>
                                                            <div id="cp6" class="input-group colorpicker-component">
                                                                <input type="text" value="#000000" class="form-control"/>
                                                                <span class="input-group-addon"><i></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Box color:
                                                            </div>
                                                            <div id="cp7" class="input-group colorpicker-component">
                                                                <input type="text" value="#000000" class="form-control"/>
                                                                <span class="input-group-addon"><i></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Border color:
                                                            </div>
                                                            <div id="cp8" class="input-group colorpicker-component">
                                                                <input type="text" value="#000000" class="form-control"/>
                                                                <span class="input-group-addon"><i></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Border width:
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <div id="text-stroke-width"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Font size:
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <div id="text-font-size"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row space-20">
                                                            <div class="col-xs-5 col-md-4">
                                                                Line space:
                                                            </div>
                                                            <div class="col-xs-7 col-md-8">
                                                                <div id="text-line-height"></div>
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
                                            <div id="cp9" class="input-group colorpicker-component">
                                                <input type="text" value="#000000" class="form-control"/>
                                                <span class="input-group-addon"><i></i></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addRect" src="{{ asset('img/shapes/square.jpg')}}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addLine" src="{{ asset('img/shapes/line.jpg')}}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addCircle" src="{{ asset('img/shapes/circle.jpg')}}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addTriangle" src="{{ asset('img/shapes/triangle.jpg')}}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addStar5" src="{{ asset('img/shapes/star.jpg')}}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="layoutType">
                                                    <img id="addStar4" src="{{ asset('img/shapes/star-2.jpg')}}" class="img-responsive" height="100px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="messages">
                                    <div class="container-fluid">
                                        <div class="row space-20">
                                            <div class="col-xs-6">
                                                <!--Upload Image Form-->
                                                <form method="POST" action="{{ route('uploadImage')}}" id="form-upload" enctype="multipart/form-data">
                                                    <input id="upImage" name="upImage" type="file" style="display:none;" accept=".jpg,.jpeg,.png,.svg,.gif"/>
                                                    {{ csrf_field()}}
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
                                                    <img id="addImg1" src="{{ asset('img/headers/header-1.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg2" src="{{ asset('img/headers/header-2.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg3" src="{{ asset('img/headers/header-3.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg4" src="{{ asset('img/headers/header-4.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg5" src="{{ asset('img/headers/header-5.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg6" src="{{ asset('img/headers/header-6.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg7" src="{{ asset('img/headers/header-7.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg8" src="{{ asset('img/headers/header-8.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 zeropdg-2">
                                                <div class="addImgBox">
                                                    <img id="addImg9" src="{{ asset('img/headers/header-9.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg10" src="{{ asset('img/headers/header-10.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg11" src="{{ asset('img/headers/header-11.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg12" src="{{ asset('img/headers/header-12.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>

                                                <div class="addImgBox">
                                                    <img id="addImg13" src="{{ asset('img/headers/header-13.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg14" src="{{ asset('img/headers/header-14.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg15" src="{{ asset('img/headers/header-15.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                                <div class="addImgBox">
                                                    <img id="addImg16" src="{{ asset('img/headers/header-16.png')}}" class="img-responsive" height="55px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row space-20">
                                            <div class="col-xs-5 col-md-4">
                                                Opacity:
                                            </div>
                                            <div class="col-xs-7 col-md-8">
                                                <div id="image-color-opacity"></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <div class="container-fluid">
                                        <div class="row space-20">
                                            <div class="col-xs-12">
                                                <!--Upload Video Form-->
                                                <form method="POST" action="{{ route('uploadVideo')}}" id="form-uploadV" enctype="multipart/form-data">
                                                    <input id="upVideo" name="upVideo" type="file" style="display:none;" accept=".mpg,.avi,.flv,.mkv,.mov,.mp4,.ogv,.webm,.wmv"/>
                                                    {{ csrf_field()}}
                                                    <button id="addVideo" type="button" class="btn btn-labeled btn-default">
                                                        <span class="btn-label"><i class="glyphicon glyphicon-upload sb-icons-3"></i></span><span class="text-whiteBG">UPLOAD</span></button>
                                                    <!--<button id="addVideo" type="button" class="btn btn-success btn-custom"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>-->
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
                                                    <img id="addVideo1" src="{{ asset('img/thumb/video-1.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo2" src="{{ asset('img/thumb/video-2.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo3" src="{{ asset('img/thumb/video-3.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo4" src="{{ asset('img/thumb/video-4.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo5" src="{{ asset('img/thumb/video-5.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo6" src="{{ asset('img/thumb/video-6.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 zeropdg-2">
                                                <div class="addVideoBox">
                                                    <img id="addVideo7" src="{{ asset('img/thumb/video-7.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo8" src="{{ asset('img/thumb/video-8.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo9" src="{{ asset('img/thumb/video-9.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo10" src="{{ asset('img/thumb/video-10.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo11" src="{{ asset('img/thumb/video-11.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addVideoBox">
                                                    <img id="addVideo12" src="{{ asset('img/thumb/video-12.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="tab-pane" id="Background">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-12 space-20">
                                                <form method="POST" action="{{ route('uploadImage')}}" id="form-upload" enctype="multipart/form-data">
                                                    <input id="upBgImg" name="upImage" type="file" style="display:none;" accept=".jpg,.jpeg,.png,.svg,.gif"/>
                                                    {{ csrf_field()}}
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
                                                    <img id="addBg1" src="{{ asset('img/backgrounds/thumbs/april_showers_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg2" src="{{ asset('img/backgrounds/thumbs/autumn_leaves_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg3" src="{{ asset('img/backgrounds/thumbs/balloons_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg4" src="{{ asset('img/backgrounds/thumbs/christmas_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg5" src="{{ asset('img/backgrounds/thumbs/cornucopia_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg6" src="{{ asset('img/backgrounds/thumbs/early_autumn.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg7" src="{{ asset('img/backgrounds/thumbs/easter_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg8" src="{{ asset('img/backgrounds/thumbs/fireplace_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 zeropdg-2">
                                                <div class="addBgBox">
                                                    <img id="addBg9" src="{{ asset('img/backgrounds/thumbs/football_autumn_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg10" src="{{ asset('img/backgrounds/thumbs/grain_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg11" src="{{ asset('img/backgrounds/thumbs/halloween_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg12" src="{{ asset('img/backgrounds/thumbs/hanukkah_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg13" src="{{ asset('img/backgrounds/thumbs/harvest_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg14" src="{{ asset('img/backgrounds/thumbs/ice_cream_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg15" src="{{ asset('img/backgrounds/thumbs/icecle_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg16" src="{{ asset('img/backgrounds/thumbs/independence_day_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 zeropdg-2">
                                                <div class="addBgBox">
                                                    <img id="addBg17" src="{{ asset('img/backgrounds/thumbs/may_flowers_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg18" src="{{ asset('img/backgrounds/thumbs/pumpkin_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg19" src="{{ asset('img/backgrounds/thumbs/spring_buds_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg20" src="{{ asset('img/backgrounds/thumbs/st_patrick_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg21" src="{{ asset('img/backgrounds/thumbs/tulip_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg22" src="{{ asset('img/backgrounds/thumbs/vacation_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg23" src="{{ asset('img/backgrounds/thumbs/valentines_day_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg24" src="{{ asset('img/backgrounds/thumbs/winter_river_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
                                                </div>
                                                <div class="addBgBox">
                                                    <img id="addBg25" src="{{ asset('img/backgrounds/thumbs/winter_trees_thumb.jpg')}}" class="img-responsive" height="75px" width="150px">
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
                        <li><a href="#tabs-0"><span id="calendarTab" class="glyphicon glyphicon-calendar sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 5px"></span>Calendar</a></li>
                        @if(count($videos) > 0)
                            @foreach($videos as $video)
                            <li><a href="#tabs-{{ $video->id }}"><span class="glyphicon glyphicon-film sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 10px"></span>Video</a><span class="ui-icon ui-icon-circle-close ui-closable-tab"></span></li>
                            @endforeach
                        @endif
                    </ul>
                    <div id="tabs-0" style="padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px">
                        <div class="panel panel-default" style="margin-bottom: 0px">
                            <div class="panel-heading">

                                <div id='top'>
                                    <div class='right'><h4><b>Calendar Name: {{ $name}}</b></h4></div>
                                    <div class='left'>

                                        <div id='theme-system-selector' class='selector' >
                                            <h4 style="display: inline"><b>Select your theme:</b></h4>

                                            <select id='themeCategory' style="display: inline">
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
                        </div>
                    </div>
                    @if(count($videos) > 0)
                        @foreach($videos as $video)
                        <div id='tabs-{{ $video->id }}' style='padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px'>
                            <video id="video{{ $video->id }}}}" src="{{ $video->url }}" type="video/mp4" controls="controls" style="width: 100%; height: 100%;"></video>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--Save Calendar Form-->
    <form method="POST" action="{{ route('saveCalendar')}}" id="form-save">
        <input id="idCal" name="idCal" type="text" style="visibility: hidden">
        <input id="themeCal" name="themeCal" type="text" style="visibility: hidden">
        <input id="themeCCal" name="themeCCal" type="text" style="visibility: hidden">
        <input id="layoutCal" name="layoutCal" type="text" style="visibility: hidden">
        <input id="backgroundCal" name="backgroundCal" type="text" style="visibility: hidden">
        <input id="colorCal" name="colorCal" type="text" style="visibility: hidden">
        <input id="colorYearCal" name="colorYearCal" type="text" style="visibility: hidden">
        <input id="colorWeekCal" name="colorWeekCal" type="text" style="visibility: hidden">
        <input id="colorDayCal" name="colorDayCal" type="text" style="visibility: hidden">
        <input id="cal_length" name="cal_length" type="hidden" value="" />
        <textarea id="contentCal" name="contentCal" form="form-save" maxlength="50000" style="visibility: hidden"></textarea>
        {{ csrf_field()}}
    </form>
    <!--Generate Video Form-->
    <form method="POST" enctype="multipart/form-data" action="{{ route('saveImage')}}" id="myForm">
        <input type="hidden" name="img_val" id="img_val" value="" />
        <input type="hidden" name="cal_val" id="cal_val" value="" />
        {{ csrf_field()}}
    </form>
    
    <!--Store Video Form-->
    <form method="POST" action="{{ route('storeVideo')}}" id="videoForm">
        <input type="hidden" name="calendarID" id="calendarID" value="" />
        <input type="hidden" name="videoURL" id="videoURL" value="" />
        <input type="hidden" name="videoType" id="videoType" value="" />
        {{ csrf_field()}}
    </form>
    
    <!--Delete Video Form-->
    <form method="POST" action="{{ route('delVideo')}}" id="deleteVideoForm">
        <input type="hidden" name="videoID" id="videoID" value="" />
        {{ csrf_field()}}
    </form>
    
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/moment.min.js')}}"></script>
<script src="{{ asset('js/fullcalendar.min.js')}}"></script>
<script src="{{ asset('js/theme-chooser.js')}}"></script>
<script src="{{ asset('js/textEditor.js')}}"></script>
<script src="{{ asset('js/html2canvas.svg.min.js')}}"></script>
<script src="{{ asset('js/html2canvas.js')}}"></script>
<script src="{{ asset('js/jquery.plugin.html2canvas.js')}}"></script>
<script src="{{ asset('js/progressBar.js')}}"></script>
<script src="{{ asset('js/bootstrap-waitingfor.min.js')}}"></script>
<script src="{{ asset('js/fabric.js')}}"></script>
<script src="{{ asset('js/jquery.ba-resize.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-colorpicker.js')}}"></script>
<script src="{{ asset('js/bootstrap-dialog.js')}}"></script>
<script src="{{ asset('js/calendarBuilder.js')}}"></script>
<script src="{{ asset('js/layouts.js')}}"></script>
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
            fd.append('calendarID', '{{ $id }}');
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
                success: function (response) {
                    waitingDialog.hide();
                    
                    var videosCount = $("#tabs").find(".ui-closable-tab").length;
        
                    if(videosCount >= 5){
                        BootstrapDialog.show({
                        title: 'Maximun amount of videos reached',
                        message: 'You can only add a maximun of 5 videos to each calendar.',
                        buttons: [{label: 'Accept',
                            action: function(dialogItself){
                                dialogItself.close();
                            }}],
                        type: BootstrapDialog.TYPE_DANGER,
                        });
                    }else{
                        $("div#tabs ul").append(
                            '<li><a href="#tabs-' + response.videoID + '"><span class="glyphicon glyphicon-film sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 10px"></span>Video</a><span class="ui-icon ui-icon-circle-close ui-closable-tab"></span></li>'
                        );
                        $("div#tabs").append(
                            "<div id='tabs-" + response.videoID + "' style='padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px'></div>"
                        );
                
                        $("div#tabs").tabs("refresh");
                
                        var video = $('<video />', {
                            id: 'video' + response.videoID,
                            src: response.url,
                            autoplay: false,
                            type: 'video/mp4',
                            loop: false,
                            controls: true
                        });
                
                        video.appendTo($('#tabs-' + response.videoID));
                
                        $("#video" + response.videoID).css('width', '100%');
                        $("#video" + response.videoID).css('height', '100%');
                        $("#tabs").tabs("option", "active", "#tabs-" + response.videoID);
                    }
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
        var videosCount = $("#tabs").find(".ui-closable-tab").length;
        
        if(videosCount >= 5){
            BootstrapDialog.show({
                    title: 'Maximun amount of videos reached',
                    message: 'You can only add a maximun of 5 videos to each calendar.',
                    buttons: [{label: 'Accept',
                        action: function(dialogItself){
                            dialogItself.close();
                        }}],
                    type: BootstrapDialog.TYPE_DANGER,
                });
        }else{
            $("#calendarID").val("{{ $id }}")
            $("#videoURL").val(url);
            $("#videoType").val("local");
            
            var form = $('#videoForm');
            var url2 = form.attr('action');
            var data = form.serialize();
            
            $.post(url2, data, function (result) {
                $("div#tabs ul").append(
                    '<li><a href="#tabs-' + result + '"><span class="glyphicon glyphicon-film sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 10px"></span>Video</a><span class="ui-icon ui-icon-circle-close ui-closable-tab"></span></li>'
                );
                $("div#tabs").append(
                    "<div id='tabs-" + result + "' style='padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px'></div>"
                );
                
                $("div#tabs").tabs("refresh");
                
                var video = $('<video />', {
                    id: 'video' + result,
                    src: url,
                    autoplay: false,
                    type: 'video/mp4',
                    loop: false,
                    controls: true
                });
                
                video.appendTo($('#tabs-' + result));
                
                $("#video" + result).css('width', '100%');
                $("#video" + result).css('height', '100%');
                $("#tabs-" + result).trigger("click");
                
                
            }).fail(function (e) {
                
                alert(JSON.stringify(e));
            });
            
        }        
    }

    function updateTheme() {
        $actualThemeC = '{{ $themeC }}'
        if ($actualThemeC == 'jquery-ui') {
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
        setTimeout(function () {

            html2canvas($('#calendarPanel'), {
                scale: 4,
                onrendered: function (canvas) {
                    $('#img_val').val(canvas.toDataURL("image/png"));
                    $('#cal_val').val("{{ $id }}");
                }
            });

        }, 1500);

        setTimeout(function () {
            var form = $('#myForm');
            var url = form.attr('action');
            var data = form.serialize();
            $.post(url, data, function (result) {
                waitingDialog.hide();
                  BootstrapDialog.show({
                    title: 'Video created',
                    message: 'Your video has been created successfully. <br> You can find it in your <a href="{{ route("dash") }}">dashboard</a> under the "My Videos" section.',
                    buttons: [{label: 'Take me to the video',
                        action: function(dialogItself){
                            window.location.replace("{{ route('dash') }}");
                        }},
                        {label: 'Dismiss',
                            action: function(dialogItself){
                                dialogItself.close();
                    }}],
                    type: BootstrapDialog.TYPE_PRIMARY,
                });
            }).fail(function (e) {
                alert("hay error");
                waitingDialog.hide();
                alert(JSON.stringify(e));
            });
        }, 4500);
    });

    function getContent() {
        return '{{ $content }}';
    }

    function getLayout() {
        return '{{ $layout }}';
    }

    function getCurrentLayout() {
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

    function getUploadImageRoute() {
        return "{{ route('uploadImage') }}";
    }
    
    function getDeleteVideoRoute(){
        return "{{ route('delVideo') }}";
    }
    
    function getCalendarID() {
        return '{{$id}}';
    }

    function getName() {
        return '{{$name}}';
    }

    function getYear() {
        return '{{$year}}';
    }

    function getMonth() {
        return '{{$month}}';
    }

    function getColor() {
        return '{{ $color }}';
    }

    function getColorYear() {
        return '{{ $colorYear }}';
    }

    function getColorWeek() {
        return '{{ $colorWeek }}';
    }

    function getColorDay() {
        return '{{ $colorDay }}';
    }

    function getBackground() {
        return '{{ $background }}';
    }
    
    function getVideoLength(){
        return '{{ $videoLength }}'
    }
</script>
@endsection