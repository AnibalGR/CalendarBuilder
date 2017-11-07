<?php

use Carbon\Carbon;
?>

@extends('layouts.app')

@section('styles')
<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">-->
<link href="{{ asset('css/dialog.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <div id="tabs" style="padding: 0px;">
                <ul>
                    <li><a href="#tabs-0"><span id="plansTab" class="glyphicon glyphicon-calendar sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 5px"></span>Choose a plan</a></li>
                    <li><a href="#tabs-1"><span id="subscriptionTab" class="glyphicon glyphicon-calendar sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 5px"></span>Subscription</a></li>
                    <li><a href="#tabs-2"><span id="calendarTab" class="glyphicon glyphicon-calendar sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 5px"></span>Calendars</a></li>
                    <li><a href="#tabs-3"><span id="videoTab" class="glyphicon glyphicon-calendar sb-icons-2" aria-hidden="true" style="text-align: left; width: 20%; margin-right: 5px"></span>Videos</a></li>
                </ul>
                <div id='tabs-0' style='padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px'>
                <div class="panel-body">
                            <ul class="list-group">
                                @foreach ($plans as $plan)
                                <li class="list-group-item clearfix">
                                    <div class="pull-left">
                                        <h4>{{ $plan->name }}</h4>
                                        <h4>${{ number_format($plan->cost, 2) }}</h4>
                                        @if ($plan->description)
                                        <p>{{ $plan->description }}</p>
                                        @endif
                                    </div>
                                    @if(Auth::user())
                                    @if (!Auth::user()->subscribedToPlan($plan->braintree_plan, 'main'))
                                    <a href="{{ url('/plan', $plan->slug) }}" class="btn btn-default pull-right">Choose Plan</a>
                                    @else
                                    <a href="" class="btn btn-default pull-right">You are already subscribed to this plan</a>
                                    @endif
                                    @endif

                                </li>
                                @endforeach
                            </ul>
                        </div>
            </div>
            <div id='tabs-1' style='padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px'>
                <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Manage Subscriptions</div>

                <div class="panel-body">
                    @if (Auth::user()->subscription('main')->cancelled())
                    <p>Your subscription ends on {{ Auth::user()->subscription('main')->ends_at->format('M dS Y') }}</p>
                    <form action="{{ url('subscription/resume') }}" method="post">
                        <button type="submit" class="btn btn-default">Resume subscription</button>
                        {{ csrf_field() }}
                    </form>
                    @else
                    <p>You are currently subscribed to {{ Auth::user()->subscription('main')->braintree_plan }} plan</p>
                    <form action="{{ url('subscription/cancel') }}" method="post">
                        <button type="submit" class="btn btn-default">Cancel subscription</button>
                        {{ csrf_field() }}
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">My payment method</div>

                <div class="panel-body">
                    <p>This is your current payment method:</p>
                    @if(Auth::user()->paypal_email)
                    <p>Paypal email: {{ Auth::user()->paypal_email }}</p>
                    @else
                    <p>Card brand: {{ Auth::user()->card_brand }}</p>
                    <p>Last 4 numbers: {{ Auth::user()->card_last_four }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Change payment method</div>

                <div class="panel-body">
                    <form action="{{ url('/update_card') }}" method="post">
                        <div id="dropin-container"></div>
                        {{ csrf_field() }}
                        <hr>
                        <button id="payment-button" class="btn btn-primary btn-flat hidden" type="submit">Update payment method</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
            </div>
            <div id='tabs-2' style='padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px'>
                <div class="panel-body">
                            <div id='calendarsShow'>
                                @if (!$calendars->isEmpty())
                                <div class="table-responsive">
                                    <table class="table-bordered table-striped" id="calendarsTable">
                                        <tr>
                                            <td>Name</td>
                                            <td colspan="2">Actions</td>
                                        </tr>
                                        @foreach ($calendars as $calendar)
                                        <tr data-id="{{ $calendar->id }}">
                                            <td>{{ $calendar->name }}</td>
                                            <td><a href="{{ route('editCalendar', $calendar->id) }}" >Continue editing</a></td>
                                            <td><a href="#!" class="btn-delete">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                @else
                                You haven't created any calendars
                                @endif
                            </div>
                            <br>
                            <button class="panel-default" id='onclick'>Create New Calendar</button>
                        </div>
            </div>
            
            <div id='tabs-3' style='padding-left: 0px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px'>
                <div class="panel-body">
                            @if (count($videos) > 0)
                            <div class="table-responsive">
                                <table class="table-bordered table-striped">
                                    <tr>
                                        <td>Name</td>
                                        <td colspan="3">Actions</td>
                                    </tr>
                                    @foreach ($videos as $video)
                                    <tr>
                                        <td>{{ $video->getBasename() }}</td>
                                        <td><a href='{{ asset("") }}calendars/{{Auth::id()}}/{{$video->getBasename()}}' target="_blank" download>Download</a></td>
        <!--                                <td><a href="" >Share</a></td>
                                        <td><a href="#!" >Delete</a></td>-->
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            @else
                            You don't have any videos created
                            @endif
                            <br>
                        </div>
            </div>
            </div>
        </div>
    </div>
</div>


<!--New Calendar Form -->
<div id="contactdiv">
    <form class="form" method="POST" action="{{ route('calendarBuilder') }}" id="contact">
        {{ csrf_field() }}
        <img src="{{ asset('img/delete-element.png') }}" class="img" id="cancel"/>
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
        <input type="button" id="send" value="Create"/>
        <input type="button" id="cancel" value="Cancel"/>
        <br/>
    </form>
</div>

<!--Delete Calendar Form-->
<form method="POST" action="{{ route('deleteCalendar', ':USER_ID') }}" id="form-delete">
    <input name="_method" type="hidden" value="DELETE">
    {{ csrf_field() }}
</form>

@endsection

@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ asset('js/dialog.js') }}"></script>

@endsection

@section('braintree')
    <script src="https://js.braintreegateway.com/js/braintree-2.30.0.min.js"></script>

    <script>
        $.ajax({
            url: '{{ url('braintree/token') }}'
        }).done(function (response) {
            braintree.setup(response.data.token, 'dropin', {
                container: 'dropin-container',
                onReady: function () {
                    $('#payment-button').removeClass('hidden');
                }
            });
        });
    </script>
@endsection