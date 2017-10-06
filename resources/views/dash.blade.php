@extends('layouts.app')

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
                                <td>Number of pages</td>
                                <td>Continue editing</td>
                                <td>Publish</td>
                                <td>Download</td>
                                <td>Remove</td>
                            </tr>

                            @foreach ($calendars as $calendar)
                            <tr>
                                <td>{{ $calendar->name }}</td>
                                <td>{{ $calendar->getPageCount() }}</td>
                                <td>Continue editing</td>
                                <td>Publish</td>
                                <td>Download</td>
                                <td>Remove</td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                    @else
                    You don´t have any calendar created
                    @endif
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
@endsection