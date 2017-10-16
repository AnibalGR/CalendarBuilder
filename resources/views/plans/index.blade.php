@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/custom-pricing.css') }}" rel="stylesheet" >
@endsection


@section('content')

<section class="bgimg-2">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-xs-12">
                <div class="mt-80">
                    Pricin Page
                </div>
            </div>
        </div>
    </div>
</section>




<!-- Black Pricing Table -->
	<section class="section-padding black-table-area bgimg-1 bg-additional">
		<div class="container">
			<div class="row">
				<!-- Heading -->
				<div class="col-md-12 text-center">
					<h1 class="section-title purple-heading">Pricing Title here</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br/> tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- Pricing Table Area -->
				<div class="gg-pricing-table dark-table col-md-12 mt-50">
					<!-- Single Table -->
					<div class="col-md-4">
						<div class="single-pricing-table text-center clearfix">
							<!-- Heading -->
							<div class="pricing-table-heading">
								<h2>Free</h2>
								<p>Edit and view only</p>
							</div>
							<!-- Price -->
							<div class="price">
								<span>FREE</span>
							</div>
							<!-- Price Item -->
							<div class="pricing-item">
                                                            <div class="row">
                                                            <div class="col-xs-6" style="text-align: right; font-size: 22px;">
                                                                <ul>
									<li><p><strong><i class="fa fa-check-circle" aria-hidden="true"></i></strong></p></li>
									<li><p><strong><i class="fa fa-check-circle" aria-hidden="true"></i></strong></p></li>
									<li><p><strong><i class="fa fa-times-circle" aria-hidden="true"></i></strong></p></li>
									<li><p><strong><i class="fa fa-times-circle" aria-hidden="true"></i></strong></p></li>
								</ul>
                                                            </div>
                                                                <div class="col-xs-6" style="text-align: left; margin-left: 0px !important; padding-left: 0px;">
                                                                <ul>
									<li><p>View</p></li>
									<li><p>Editor</p></li>
									<li><p>Save</p></li>
									<li><p>Export</p></li>
								</ul>
                                                            </div>
                                                            </div>
                                                        </div>
							<!-- Button -->
							<div class="pricing-button">
								<a href="#" class="btn btn-pricing">Sign Up</a>
							</div>
						</div>
					</div>
					<!-- Single Table -->
					<div class="col-md-4">
						<div class="single-pricing-table pricing-special text-center clearfix">
							<!-- Heading -->
							<div class="pricing-table-heading">
								<h2>Monthly Plan</h2>
								<p>Fully dadicated to the small project</p>
							</div>
							<!-- Price -->
							<div class="price">
								<span>$39.99</span>
							</div>
							<!-- Price Item -->
							<div class="pricing-item">
								<div class="row">
                                                            <div class="col-xs-6" style="text-align: right; font-size: 22px;">
                                                                <ul>
									<li><p><strong><i class="fa fa-check-circle" aria-hidden="true"></i></strong></p></li>
									<li><p><strong><i class="fa fa-check-circle" aria-hidden="true"></i></strong></p></li>
									<li><p><strong><i class="fa fa-check-circle" aria-hidden="true"></i></strong></p></li>
									<li><p><strong><i class="fa fa-check-circle" aria-hidden="true"></i></strong></p></li>
								</ul>
                                                            </div>
                                                                <div class="col-xs-6" style="text-align: left; margin-left: 0px !important; padding-left: 0px;">
                                                                <ul>
									<li><p>View</p></li>
									<li><p>Editor</p></li>
									<li><p>Save</p></li>
									<li><p>Export</p></li>
								</ul>
                                                            </div>
                                                            </div>
							</div>
							<!-- Button -->
							<div class="pricing-button">
								<a href="#" class="btn btn-pricing">Sign Up</a>
							</div>
						</div>
					</div>
					<!-- Single Table -->
					<div class="col-md-4">
						<div class="single-pricing-table text-center clearfix">
							<!-- Heading -->
							<div class="pricing-table-heading">
								<h2>Yearly Plan</h2>
								<p>Fully dadicated to the large project</p>
							</div>
							<!-- Price -->
							<div class="price">
								<span>$400</span>
							</div>
							<!-- Price Item -->
							<div class="pricing-item">
								<div class="row">
                                                            <div class="col-xs-6" style="text-align: right; font-size: 22px;">
                                                                <ul>
									<li><p><strong><i class="fa fa-check-circle" aria-hidden="true"></i></strong></p></li>
									<li><p><strong><i class="fa fa-check-circle" aria-hidden="true"></i></strong></p></li>
									<li><p><strong><i class="fa fa-check-circle" aria-hidden="true"></i></strong></p></li>
									<li><p><strong><i class="fa fa-check-circle" aria-hidden="true"></i></strong></p></li>
								</ul>
                                                            </div>
                                                                <div class="col-xs-6" style="text-align: left; margin-left: 0px !important; padding-left: 0px;">
                                                                <ul>
									<li><p>View</p></li>
									<li><p>Editor</p></li>
									<li><p>Save</p></li>
									<li><p>Export</p></li>
								</ul>
                                                            </div>
                                                            </div>
							</div>
							<!-- Button -->
							<div class="pricing-button">
								<a href="#" class="btn btn-pricing">Sign Up</a>
							</div>
						</div>
					</div>
					<!-- Credits -->
					<div class="design-credit text-center col-md-12 mt-40">
						<p>Have questions, we'll be happy to answer <a href="#" target="_blank">here.</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>



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