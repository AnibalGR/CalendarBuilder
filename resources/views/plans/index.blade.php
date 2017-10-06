@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Choose your plan</div>

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
        </div>
    </div>
</div>
@endsection

<!-- Scripts -->
<script src="/js/app.js"></script>
@yield('braintree')