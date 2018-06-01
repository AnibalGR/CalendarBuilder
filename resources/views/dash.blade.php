<?php

use Carbon\Carbon;
?>

@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('css/dialog.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-dialog.css')}}" rel="stylesheet" >
@endsection

@section('content')
<div id="mainContainer" class="container-fluid">
    <div class="top-space-1"></div>
</div>
<div id="mainContainer" class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="tabs" style="padding: 0px;">
                <ul>
                    <!--<li class="customLi"><a href="#tabs-0"><span id="plansTab" class="glyphicon glyphicon-star sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: -3px"></span>Premium Plans</a></li>-->
                    <li class="customLi"><a href="#tabs-0"><span id="subscriptionTab" class="glyphicon glyphicon-calendar sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 5px"></span>Calendars</a></li>
                    <li class="customLi"><a href="#tabs-1"><span id="calendarTab" class="glyphicon glyphicon-film sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 5px"></span>Videos</a></li>
                </ul>
                <div id='tabs-0' style='padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px'>
                <div class="panel-body">
                            <ul class="list-group">
                                @foreach ($plans as $plan)
                                <li class="list-group-item clearfix">
                                    <div class="col-md-6 separated-item">
                                        <h4><b>{{ $plan->name }}</b></h4>
                                        <h4>${{ number_format($plan->cost, 2) }}</h4>
                                        @if ($plan->description)
                                        <p class="planDescription">{{ $plan->description }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6 pull-right separated-item" style="width: 50%; text-align: center;">
                                        @if(Auth::user())
                                            @if (!Auth::user()->subscribedToPlan($plan->braintree_plan, 'main'))
                                                <a href="{{ url('/plan', $plan->slug) }}" class="btn btn-default">Choose this plan</a>
                                            @else
                                            <div style="width: auto">You have this plan</div>
                                            @endif
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
            </div>
            <div id='tabs-0' style='padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px'>
                <div class="panel-body">
                            <div class="space-10">
                            </div>
                            <div class="create-vid links-3" id='onclick'>Create New Calendar</div>
                            <div class="space-20">
                            </div>
                            <div id='calendarsShow'>
                                @if (!$calendars->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="calendarsTable">
                                        <tr>
                                            <td class="td-size1 td-heads td-center">Name</td>
                                            <td class="td-size1 td-heads td-center" colspan="2">Actions</td>
                                        </tr>
                                        @foreach ($calendars as $calendar)
                                        <tr data-id="{{ $calendar->id }}">
                                            <td class="td-size1">{{ $calendar->name }}</td>
                                            <td class="td-size2 links-1 td-center"><a href="{{ route('editCalendar', $calendar->id) }}" ><div class="edit-button">Continue editing</div></a></td>
                                            <td class="td-size1 links-2 td-center"><a href="#!" class="btn-delete"><div class="delete-button">Delete</div></a></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                @else
                                You haven't created any calendars
                                @endif
                            </div>
                        </div>
            </div>
            
            <div id='tabs-1' style='padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px'>
                <div class="panel-body" id="videosShow">
                            @if (count($videos) > 0)
                            <div class="table-responsive">
                                <table class=" table table-bordered table-striped" id="videosTable">
                                    <tr>
                                        <td class="td-size1 td-heads td-center">Name</td>
                                        <td class="td-size1 td-heads td-center" colspan="3">Actions</td>
                                    </tr>
                                    @foreach ($videos as $video)
                                    <tr data-id="{{ $video->getBasename() }}">
                                        <td class="td-size1" style="text-align: center">{{ $video->getBasename() }}</td>
                                        <td class="td-size1 links-3 td-center"><a href='{{ asset("") }}calendars/{{Auth::id()}}/{{$video->getBasename()}}' target="_blank" download><div class="download-button">Download</div></a></td>
                                        <td class="td-size1 btn-primary td-center"><a style="color: #fff;" href='{{ asset("") }}calendars/{{Auth::id()}}/{{$video->getBasename()}}' target="_blank"><div class="download-button">Preview</div></a></td>
                                        <td class="td-size1 links-2 td-center"><a href="#!" class="btn-delete-video"><div class="delete-button">Delete</div></a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            @else
                            <p class="txtcenter space-40 format">You don't have any videos created</p>
                            @endif
                            <br>
                        </div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="mainContainer" class="container-fluid">
    <div class="bottom-space-1"></div>
</div>


<!--New Calendar Form -->
<div id="contactdiv">
    <form class="form" method="POST" action="{{ route('calendarBuilder') }}" id="contact">
        {{ csrf_field() }}
        <div class="close-form-1" id="cancel">X</div>
       <!-- <img src="{{ asset('img/delete-element.png') }}" class="img" id="cancel"/>-->
        <h3>Create New Calendar</h3>
        <hr/><br/>
        <label>Name:</label>
        <br/>
        <input type="text" id="name" name="name"/><br/>
        <div id="invalidName"></div>
        <br/>
        <div class="form-group">
            <label for="year">Year:</label>
            <select class="form-control" id="year" name="year">
                {{ $now = Carbon::now() }}
                <option value="{{ $now->year }}">{{ $now->year }}</option>
                <option value="{{ $now->year + 1 }}">{{ $now->year + 1 }}</option>
                <option value="{{ $now->year + 2 }}">{{ $now->year + 2 }}</option>
                <option value="{{ $now->year + 3 }}">{{ $now->year + 3 }}</option>
                <option value="{{ $now->year + 4 }}">{{ $now->year + 4 }}</option>
            </select>
        </div>
        <br/>
        <div class="form-group">
            <label for="month">Month:</label>
            <select class="form-control" id="month" name="month">
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <br/>
        <input type="button" id="send" class="links-1" value="Create"/>
        <input type="button" id="cancel" class="links-2" value="Cancel"/>
        <br/>
    </form>
</div>

<!--Delete Calendar Form-->
<form method="POST" action="{{ route('deleteCalendar', ':USER_ID') }}" id="form-delete">
    <input name="_method" type="hidden" value="DELETE">
    {{ csrf_field() }}
</form>

<!--Delete Video Form-->
<form method="POST" action="{{ route('deleteGeneratedVideo') }}" id="del-video-form">
    <input name="video_name" id="video_name" type="hidden" value="">
    {{ csrf_field() }}
</form>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/dialog.js') }}"></script>
<script src="{{ asset('js/bootstrap-dialog.js')}}"></script>
<script>
//window.addEventListener('resize', resizeContainer, false);
//function resizeContainer(){
//    $('#mainContainer').height($(window).height() - $('#notifications').height() - $('footer').height() - $('.navbar').height() - 10);
//}
$(document).ready(function(){
//    $('#mainContainer').height($(window).height() - $('#notifications').height() - $('footer').height() - $('.navbar').height() - 10);
    
    @if (session('success'))
    BootstrapDialog.show({
                            title: 'Success',
                            message: "{{ session('success') }}",
                            buttons: [{label: 'Accept',
                                    action: function (dialogItself) {
                                        dialogItself.close();
                                    }}],
                            type: BootstrapDialog.TYPE_SUCCESS,
                        });
    @endif
    @if (session('error'))
    BootstrapDialog.show({
                            title: 'Error',
                            message: "{{ session('error') }}",
                            buttons: [{label: 'Accept',
                                    action: function (dialogItself) {
                                        dialogItself.close();
                                    }}],
                            type: BootstrapDialog.TYPE_DANGER,
                        });
    @endif
})
</script>@endsection