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
                                <h1>Appealing Digital Display</h1>        
                                <h3>Keep patients and visitors informed and up-to-date <br>
                                    on upcoming events and activities in your facility</h3>
                            </hgroup>
                            <div class="space-20">
                            <button class="btn btn-hero btn-lg" role="button">CREATE</button>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        
        <div class="container space-40">
            <div class="row">
                <div class="col-lg-12 txtcenter color-1">
                <h1>How It Works</h1>
                </div>
            </div>
            <div class="row space-20">
                <div class="col-sm-4 hIcons-1 linebox-right">
                    <img src="{{ asset('img/home/home-1.png') }}" class="img-responsive">
                    <h3>Select Your Template</h3>
                    <p>Use our standar 12-month calendar or build your own.</p>
                </div>
                <div class="col-sm-4 hIcons-1">
                <img src="{{ asset('img/home/home-2.png') }}" class="img-responsive">
                <h3>Customize Your Calendar</h3>
                    <p>Add your logo, images and text.<br/>Choose from our video library to highlight special events.</p>
                </div>
                <div class="col-sm-4 hIcons-1 linebox-left">
                <img src="{{ asset('img/home/home-3.png') }}" class="img-responsive">
                <h3>Publish & Downloads</h3>
                    <p>Finalize your file and upload it to any screen at your facility</p>
                </div>
            </div>
        </div>
        <div class="container space-40 bg-gray">
            <div class="row">
                <div class="col-lg-12 space-40 space-20 txtcenter">
                <p>We are so exited to have signed up for this service. Digital Activity Clendars has helped our business
                save time and money, and our facility looks better than over. This service has everything I need.<p>
                </div>
            </div>
        </div>
        <div class="container space-40">
            <div class="row">
                <div class="col-lg-12 txtcenter color-2">
                <h1>Customized for any display.</h1>
                </div>
            </div>
            <div class="row space-20">
                <div class="col-sm-4 hIcons-2 linebox-right">
                    <img src="{{ asset('img/home/home-4.png') }}" class="img-responsive">
                    <h3>Computer Screens</h3>
                </div>
                <div class="col-sm-4 hIcons-2">
                <img src="{{ asset('img/home/home-5.png') }}" class="img-responsive">
                <h3>Flatscreen TV's</h3>
                </div>
                <div class="col-sm-4 hIcons-2 linebox-left">
                <img src="{{ asset('img/home/home-6.png') }}" class="img-responsive">
                <h3>Patient rooms</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
