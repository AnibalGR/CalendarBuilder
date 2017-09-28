@extends('layouts.app')

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
                            <div class="tab-pane" id="messages">Some images</div>
                            <div class="tab-pane" id="settings">Some videos</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-8">
            <div class="panel panel-default ui-widget-header" id="droppable">
                <div class="panel-heading center-block">Calendar</div>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>
    
@endsection
