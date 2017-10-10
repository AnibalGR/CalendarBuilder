<?php
use Carbon\Carbon;
?>

@extends('layouts.app')

@section('styles')
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
<link href="{{ asset('css/dialog.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Calendars</div>
                <div class="panel-body">
                    @if (!$calendars->isEmpty())
                    <div class="table-responsive">
                        <table class="table-bordered table-striped">
                            <tr>
                                <td>Name</td>
                                <td>Continue editing</td>
                                <td>Publish</td>
                                <td>Download</td>
                                <td>Delete</td>
                            </tr>

                            @foreach ($calendars as $calendar)
                            <tr data-id="{{ $calendar->id }}">
                                <td>{{ $calendar->name }}</td>
                                <td><a href="#!" >Continue editing</a></td>
                                <td>Publish</td>
                                <td>Download</td>
                                <td><a href="#!" class="btn-delete">Delete</a></td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                    @else
                    You don´t have any calendar created
                    @endif
                    <br>
                    <button class="panel-default" id='onclick'>Create new Calendar</button>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">My Subscription</div>
                <div class="panel-body">
                    @if(!$plans->isEmpty())
                        @foreach ($plans as $plan)
                        <p>You are subscribed to the <br>{{ $plan->braintree_plan }} plan
                        @if($plan->braintree_plan == "Monthly")
                        Why don´t you <a href="">Upgrade</a> your account?
                        @endif
                        </p>
                        @endforeach
                    @else
                        <p>You are not subscribed to any plan. Why don´t you <a href="">Subscribe</a>?
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>
                <div class="panel-body">
                    <form action="{{ url('/subscribe') }}" method="post">
                        <div id="dropin-container"></div>
                        {{ csrf_field() }}
                        <hr>
                        <button id="payment-button" class="btn btn-primary btn-flat hidden" type="submit">Pay now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--New Calendar Form -->
<div id="contactdiv">
    <form class="form" method="POST" action="{{ route('home') }}" id="contact">
        {{ csrf_field() }}
        <img src="images/button_cancel.png" class="img" id="cancel"/>
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
                <option value="12">Dicember</option>
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
<script>
    
</script>

@endsection