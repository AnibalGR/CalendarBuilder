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
                    <p>Use our standar 12-month calendar or build your own.</p>
                </div>
                <div class="col-sm-4 space-40 hIcons-1">
                <img src="{{ asset('img/home/home-2.png') }}" class="img-responsive">
                <h3>Customize Your Calendar</h3>
                    <p>Add your logo, images and text.<br/>Choose from our video library to highlight special events.</p>
                </div>
                <div class="col-sm-4 space-40 hIcons-1 linebox-left">
                <img src="{{ asset('img/home/home-3.png') }}" class="img-responsive">
                <h3>Publish & Downloads</h3>
                    <p>Finalize your file and upload it to any screen at your facility</p>
                </div>
            </div>
        </div>

        <div class="container full-width bg-div-3">
            <div class="row space-60">
                <div class="col-xs-12">
                    <div class="button-sign-up">
                    <a href="#">SIGN UP</a>
                    </div>
            </div>
        </div>
        </div>
<section>
<div class="container-fluid bg-div-2">
    <div class="mt-50"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="color-2">Creating your custom calendar</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 class="color-1">Lorem Ipsum</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id ipsum diam. Nulla facilisi. 
                    Sed suscipit sem a mauris commodo aliquet. In sit amet nulla vel nisi congue pulvinar nec et dui nulla facilisi. 
                    Sed vestibulum sem vel elit tincidunt ultricies. Nullam rutrum lacus et elit cursus, at dapibus ante ultrices.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="hIcons-2">
                    <ul>
                                <li><p><strong><i class="fa fa-cloud-upload list-green" aria-hidden="true"></i></strong></p></li>
                    </ul>
                </div>
                <h4 class="color-2 text-center">Step 1</h4>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id ipsum diam. Nulla facilisi. 
                    Sed suscipit sem a mauris commodo aliquet. In sit amet nulla vel nisi congue pulvinar nec et dui nulla facilisi. 
                    Sed vestibulum sem vel elit tincidunt ultricies. Nullam rutrum lacus et elit cursus, at dapibus ante ultrices.</p>
            </div>
            <div class="col-md-4">
                <div class="hIcons-2">
                    <ul>
                                <li><p><strong><i class="fa fa-cogs list-green" aria-hidden="true"></i></strong></p></li>
                    </ul>
                </div>
                <h4 class="color-2 text-center">Step 1</h4>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id ipsum diam. Nulla facilisi. 
                    Sed suscipit sem a mauris commodo aliquet. In sit amet nulla vel nisi congue pulvinar nec et dui nulla facilisi. 
                    Sed vestibulum sem vel elit tincidunt ultricies. Nullam rutrum lacus et elit cursus, at dapibus ante ultrices.</p>
            </div>
            <div class="col-md-4">
                <div class="hIcons-2">
                    <ul>
                                <li><p><strong><i class="fa fa-tv list-green" aria-hidden="true"></i></strong></p></li>
                    </ul>
                </div>
                <h4 class="color-2 text-center">Step 1</h4>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id ipsum diam. Nulla facilisi. 
                    Sed suscipit sem a mauris commodo aliquet. In sit amet nulla vel nisi congue pulvinar nec et dui nulla facilisi. 
                    Sed vestibulum sem vel elit tincidunt ultricies. Nullam rutrum lacus et elit cursus, at dapibus ante ultrices.</p>
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
    <div class="button-1"><a href="">SIGN UP NOW</a></div>
    <div class="full-width space-60"></div>
    </div>
</div>
@endsection
