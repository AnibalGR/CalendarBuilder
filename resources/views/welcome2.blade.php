@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/custom-home.css') }}" rel="stylesheet" >
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">              
            <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
                    <!-- Overlay -->
                <div class="overlay"></div>
                    <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item slides active">
                        <div class="slide-1"></div>
                        <div class="hero">
                            <hgroup>
                                <h1>Captivate Your<br/> Patients and Visitors</h1>        
                                <h3>with a vibrant digital display activity<br>
                                    calendar created by you, using our<br>
                                    technology, in just minutes</h3>
                            </hgroup>
                            <div class="space-20">
                                @if(Auth::user())
                                <a href="{{ route('dash') }}"><button class="btn btn-hero btn-lg" role="button">GET STARTED</button></a>
                                @else
                                <a href="{{ route('login') }}"><button class="btn btn-hero btn-lg" role="button">GET STARTED</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    
    <div class="container-fluid g-section bg-color-grey">
        <div class="row">
            <div class="container-fluid g-section-bg">
                <div class="row space-20">
                    <div class="container">
                        <div class="col-lg-12 g-section-1">
                            <div class="row">
                                <div class="col-sm-6">
                                        <h2>Digital Signage Software<br>
                                        Designed Exclusively for Health Care Facilities</h2>
                                        <div class="space-40"></div>
                                        <p>Administrators and activities directors can transform<br>
                                            their activity calendars into vibrant digital displays.</p>
                                        <div class="space-40"></div>
                                                    @if(Auth::user())
                                                    <a href="{{ route('dash') }}"><button class="btn-gs1" role="button">GET STARTED</button></a>
                                                    @else
                                                    <a href="{{ route('login') }}"><button class="btn-gs1" role="button">GET STARTED</button></a>
                                                    @endif
                                </div>
                                <div class="col-sm-6">

                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid g-section bg-white-color">
        <div class="row">
            <div class="container-fluid">
                <div class="row space-60">
                    <div class="container">
                        <div class="col-lg-12 g-section-2">
                            <div class="row">
                                <div class="col-sm-6">
                                        <h2>Landscape TV</h2>
                                        <div class="space-40"></div>
                                        <p>
                                            <img src="{{ asset('img/home/tv-sec-3.png') }}" class="img-responsive">
                                        </p>
                                        <div class="space-40"></div>
                                                    
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="align-left">Bring Your Activities Calendar to Life</h2>
                                        <div class="space-40"></div>
                                        <p>Following a few simple steps, you can transform your print calendar into an engaging visual display. Upload your existing calendar or design a new one using our calendar design software, add our exclusive video content, and you're done.</p>
                                        <div class="space-40"></div>
                                                    
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container-fluid g-section-3">
            <div class="row space-40">
                <div class="container">
                     <div class="row">
                        <div class="col-lg-12 txtcenter color-1">
                        <h1>Automated Content</h1>
                        <p>Choose from a variety of our professionally created digital<br>
        graphics to enhance your display with engaging images.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 space-20">
                            <img src="{{ asset('img/home/preview-1.jpg') }}" class="img-responsive">
                        </div>
                        <div class="col-sm-4 space-20">
                        <img src="{{ asset('img/home/preview-2.jpg') }}" class="img-responsive">
                        </div>
                        <div class="col-sm-4 space-20">
                        <img src="{{ asset('img/home/preview-3.jpg') }}" class="img-responsive">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 space-20">
                            <img src="{{ asset('img/home/preview-4.jpg') }}" class="img-responsive">
                        </div>
                        <div class="col-sm-4 space-20">
                        <img src="{{ asset('img/home/preview-5.jpg') }}" class="img-responsive">
                        </div>
                        <div class="col-sm-4 space-20 align-center">
                            <div class="space-60"></div>
                                                    @if(Auth::user())
                                                    <a href="{{ route('dash') }}"><button class="btn-gls" role="button">And much more</button></a>
                                                    @else
                                                    <a href="{{ route('login') }}"><button class="btn-gls" role="button">And much more</button></a>
                                                    @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid g-section-4">
        <div class="row">
            <div class="container space-60">
                <div class="row">
                    <div class="col-sm-12 align-center">
                        <h2>Why Choose Digital Display Activity Calendars</h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row space-20">
                    <div class="container">
                        <div class="col-lg-12 g-section-4">
                            <div class="row">
                                <div class="col-sm-3">
                                        <span class="fa fa-check fa-icons" aria-hidden="true"></span>
                                        <h4>Digital Signage Software</h4>
                                        <div class="space-20"></div>
                                        <p>A straightforward interface allows you to create engaging activity calendar displays in just minutes.</p>
                                </div>
                                <div class="col-sm-3">
                                        <span class="fa fa-money fa-icons" aria-hidden="true"></span>
                                        <h4>Save Money</h4>
                                        <div class="space-20"></div>
                                        <p>For less than the cost of printing and decorating a traditional calendar, you could have a fully customized digital display activities calendar.</p>
                                </div>
                                <div class="col-sm-3">
                                        <span class="fa fa-tv fa-icons" aria-hidden="true"></span>
                                        <h4>Any Display</h4>
                                        <div class="space-20"></div>
                                        <p>Works with any aspect ratio—just set your display dimensions. Ideal for flat-screen TVs and patient room displays.</p>
                                </div>
                                <div class="col-sm-3">
                                        <span class="fa fa-clock-o fa-icons" aria-hidden="true"></span>
                                        <h4>Save Time</h4>
                                        <div class="space-20"></div>
                                        <p>Instead of taking hours printing, posting, and decorating a traditional calendar every month, in just minutes you can download and display a beautiful digital version of your calendar.</p>
                                </div>
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                        <span class="fa fa-star fa-icons" aria-hidden="true"></span>
                                        <h4>Enhance Your Facility</h4>
                                        <div class="space-20"></div>
                                        <p>Rather than using the same printed calendar that’s been displayed by nursing homes for the last 50 years, upgrade your look to a vibrant digital display that lets visitors and patients know your facility is progressive and modern.</p>
                                </div>
                                <div class="col-sm-4">
                                </div>
                                

                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container">
            <div class="row space-40">
                <div class="col-lg-12 txtcenter">
                <h1>How It Works</h1>
                </div>
            </div>
            <div class="row space-20">
                <div class="col-sm-4 space-40 hIcons-1 linebox-right-1">
                    <img src="{{ asset('img/home/home-1-1.png') }}" class="img-responsive">
                    <h3>Select Your Template</h3>
                    <p>Use our standard 12-month calendar or build your own.</p>
                </div>
                <div class="col-sm-4 space-40 hIcons-1">
                <img src="{{ asset('img/home/home-2-1.png') }}" class="img-responsive">
                <h3>Customize Your Calendar</h3>
                    <p>Add your logo, images, and text.<br/>Choose from our video library to highlight special events.</p>
                </div>
                <div class="col-sm-4 space-40 hIcons-1 linebox-left-1">
                <img src="{{ asset('img/home/home-3-1.png') }}" class="img-responsive">
                <h3>Publish and Download</h3>
                    <p>Finalize your file and upload it to any screen at your facility.</p>
                </div>
            </div>
        </div>

        <div class="container full-width bg-gray">
            <div class="row space-60">
                <div class="col-sm-4">
                    <div class="testimonial">
                        <span class="fa fa-quote-left fa-icons" aria-hidden="true"></span>
                    </div>                    
                </div>
                <div class="col-sm-6 testimonial-2 space-40">
                <p>"We are so excited to have signed up for this service. Digital Display Calendars has helped our business save time and money, and our facility looks better than ever. This service has everything I need." <br>John Stewart - Nursing Homes Plus<p>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
        
        <div class="container space-40">
            <div class="row">
                <div class="col-lg-12 txtcenter">
                <h1>Customized for Any Display</h1>
                </div>
            </div>
            <div class="row space-20">
                <div class="col-sm-4 hIcons-2 space-40">
                    <img src="{{ asset('img/home/home-4.png') }}" class="img-responsive">
                    <div class="full-width space-40"></div>
                    <h3>Computer Screens</h3>
                </div>
                <div class="col-sm-4 hIcons-2 space-40">
                    <img src="{{ asset('img/home/home-5.png') }}" class="img-responsive">
                    <div class="full-width space-40"></div>
                    <h3>Flatscreen TVs</h3>
                </div>
                <div class="col-sm-4 hIcons-2 space-40">
                    <img src="{{ asset('img/home/home-6.png') }}" class="img-responsive">
                    <div class="full-width space-40"></div>
                    <h3>Patient Rooms</h3>
                </div>
            </div>
        </div>
    
<div class="container-fluid bottomSec-1 bottomSec-grey">
    <div class="col-xs-12 space-60">
    <div class="full-width space-60"></div>
    <h2>Start designing your display!</h2>
    <div class="full-width space-60"></div>
    <div class="button-1">
        @if(!Auth::user())
        <a href="{{ route('plans') }}">SIGN UP NOW</a>
        @else
        <a href="{{ route('dash') }}">START NOW</a>
        @endif
    </div>
    <div class="full-width space-60"></div>
    </div>
</div>
@endsection
