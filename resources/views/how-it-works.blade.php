@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/custom-home.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/custom-howitworks.css') }}" rel="stylesheet" >
@endsection

@section('content')
<section class="bgimg-1 section-title">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="mt-40"></div>
                    <h1>How it Works</h1>
            </div>
        </div>
    </div>
</section>
        <div class="container">
            <div class="row space-40">
                <div class="col-lg-12 txtcenter color-1">
                    <!--<h1>How It Works</h1>-->
                </div>
            </div>
            <div class="row space-20">
                <div class="col-sm-4 space-40 hIcons-1 linebox-right">
                    <img src="{{ asset('img/home/home-1.png') }}" class="img-responsive">
                    <h3>Select Your Template</h3>
                    <p>Use our standard 12-month calendar or build your own.</p>
                </div>
                <div class="col-sm-4 space-40 hIcons-1">
                <img src="{{ asset('img/home/home-2.png') }}" class="img-responsive">
                <h3>Customize Your Calendar</h3>
                    <p>Add your logo, images and text, choose from our video library to highlight special events.</p>
                </div>
                <div class="col-sm-4 space-40 hIcons-1 linebox-left">
                <img src="{{ asset('img/home/home-3.png') }}" class="img-responsive">
                <h3>Publish and Download</h3>
                    <p>Finalize your file and upload it to any screen at your facility.</p>
                </div>
            </div>
        </div>
<!--
        <div class="container full-width bg-div-3">
            <div class="row space-60">
                <div class="col-xs-12">
                    <div class="button-sign-up">
                    <a href="#">SIGN UP</a>
                </div>
            </div>
        </div>
        </div>
-->
<section>
<div class="container-fluid bg-div-2">
    <div class="mt-50"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="color-2">Creating Your Custom Calendar</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 class="color-1">A Few More Details</h4>
                <p>Once you create your Digital Display Calendar account, you can immediately start customizing your calendar. No matter the level of your artistic or technical capabilities, you’ll have an easy and personalized experience with our simple interface.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="hIcons-2">
                    <ul>
                                <li><p><strong><i class="fa fa-cloud-upload list-green" aria-hidden="true"></i></strong></p></li>
                    </ul>
                </div>
                <h4 class="color-2 text-center">Step 1: Color and Layout</h4>
                <p class="text-justify">Select one of our 20+ preloaded themes, or choose colors for the text and background starting with a blank canvas. If you know the precise values you’re looking for, you can enter them into the boxes for an exact match.</p>
                <p class="text-justify">Next, select one of three calendar layouts: full width, with an image on the left, or with an image on the right.</p>
            </div>
            <div class="col-md-4">
                <div class="hIcons-2">
                    <ul>
                                <li><p><strong><i class="fa fa-cogs list-green" aria-hidden="true"></i></strong></p></li>
                    </ul>
                </div>
                <h4 class="color-2 text-center">Step 2: Text and Shapes</h4>
                <p class="text-justify">At any stage of the customization process, you may upload an Excel file with your events straight onto the calendar! (We have included a template to help you get started.) You can also add events using our easy-to-manipulate text boxes. You can customize the style of the text and add highlights to showcase important events.</p>
                <p class="text-justify">Add interest with some shapes: square, line, circle, triangle, and two types of stars. These can all be recolored, resized, and rotated to your liking.</p>
            </div>
            <div class="col-md-4">
                <div class="hIcons-2">
                    <ul>
                                <li><p><strong><i class="fa fa-tv list-green" aria-hidden="true"></i></strong></p></li>
                    </ul>
                </div>
                <h4 class="color-2 text-center">Step 3: Video and Images</h4>
                <p class="text-justify">Choose from our preloaded background or side-panel images and videos, or upload pictures of your choice.</p>
                <p class="text-justify">At any stage of the creation process, you may have us generate a video for you, save your calendar, and upload or clear events.</p>
            </div>
        </div>
    </div>
    <div class="mt-80"></div>
</div>
</section>

    
<div class="container-fluid bottomSec-1">
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
