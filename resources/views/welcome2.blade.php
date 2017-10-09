@extends('layouts.app')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <img class="img-responsive" id="background" src="{{ asset('img/backgroundHomePage.jpg') }}" >
                <div class="row" id='splashScreen'>
                    <h1>Appealing Digital Display</h1>
                    <h2>Keep patients and visitors informed and up-to-date <br>
                        on upcoming events and activities in your facility
                    </h2>
                </div>
            </div>
        </div>
@endsection
