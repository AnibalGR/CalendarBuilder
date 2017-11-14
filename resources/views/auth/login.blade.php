@extends('layouts.app')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@section('styles')
<style>
    .row {
    position: relative;
    top: 50%;
    transform: translateY(-50%); /* or try 50% */
}
</style>
@endsection
@section('content')
<div  class="app-bg">
<div id="mainContainer" class="container-fluid">
    <div class="top-space-3"></div>
</div>
<div class="container" id="mainContainer">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary" style="margin-bottom: 0px">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="mainContainer" class="container-fluid">
    <div class="bottom-space-3"></div>
</div>
</div>
@endsection

@section('scripts')
<!--
<script>
$(document).ready(function(){
    $('#mainContainer').height($(window).height() - $('#notifications').height() - $('footer').height() - $('.navbar').height() - 10);
});
-->
</script>@endsection