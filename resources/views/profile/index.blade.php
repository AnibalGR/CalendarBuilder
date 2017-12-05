@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/bootstrap-dialog.css')}}" rel="stylesheet" >
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<div  class="app-bg">
<div id="mainContainer" class="container-fluid">
    <div class="top-space-2"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">My Profile</div>

                <div class="panel-body" style="text-align: center">
                    <form name="profileForm" id="profileForm" method="post" action="{{ route('editProfile') }}" style="display: inline-block; text-align: center;">
                        <div class="profileForm">
                            <label for="username">Username:</label>
                        </div>
                        <div class="profileForm">
                            <input name="username" type="text" value="{{ Auth::user()->name }}">
                        </div>
                        <br>
                        <br>
                        <div class="profileForm">
                            <label for="email">Email:</label>
                        </div>
                        <div class="profileForm">
                            <input name="email" type="email" value="{{ Auth::user()->email }}">
                        </div>
                        <br>
                        <br>
                        <div class="profileForm">
                            <label for="newPassword">New Password</label>
                        </div>
                        <div class="profileForm">
                            <input name="newPassword" type="password" value="">
                        </div>
                        <br>
                        <br>
                        <div class="profileForm">
                            <label for="confirmNewPassword">Confirm New Password</label>
                        </div>
                        <div class="profileForm">
                            <input name="confirmNewPassword" type="password" value="">
                        </div>
                        {{ csrf_field() }}
                        <br>
                        <div>
                            <p>*Leave in blank the password fields if you don't want to update it.</p>
                        </div>
                        <br>
                        <br>
                        <div class="profileForm">
                            <input name="sendForm" id="sendForm" type="submit" value="Edit Profile" class="btn-success">
                        </div>
                        <div class="profileForm">
                            <input name="cancel" id="cancel" type="button" value="Cancel" class="btn-danger">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="mainContainer" class="container-fluid">
    <div class="bottom-space-2"></div>
</div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap-dialog.js')}}"></script>
    
<script>
    $('#sendForm').click(function(e){
        
        e.preventDefault();
        
        var form = $('#profileForm');
        var url = form.attr('action');
        var data = form.serialize();
        
        $.post(url, data, function(result){
            BootstrapDialog.show({
                            title: 'Message',
                            message: result.message,
                            buttons: [{label: 'Accept',
                                    action: function (dialogItself) {
                                        dialogItself.close();
                                    }}],
                            type: BootstrapDialog.TYPE_INFO,
                        });
        }).fail(function(e){
            alert (JSON.stringify(e));
        });
        
    });
    $('#cancel').click(function(e){
        
        e.preventDefault();
        
        window.location.replace("{{ route('dash') }}");
    });
</script>
@endsection