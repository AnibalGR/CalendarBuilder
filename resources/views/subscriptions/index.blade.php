@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
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