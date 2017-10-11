@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/slider.css') }}" rel="stylesheet" >
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
                        <button class="btn btn-hero btn-lg" role="button">CREATE</button>
                      </div>
                    </div>
                  </div> 
                </div>

                <div class="row" id='splashScreen'>
                    <h1>Appealing Digital Display</h1>
                    <h2>Keep patients and visitors informed and up-to-date <br>
                        on upcoming events and activities in your facility
                    </h2>
                </div>
            </div>
        </div>
@endsection
