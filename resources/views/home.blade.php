@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Tools</div>
                <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
</button>

<button type="button" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
</button>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            </div>
            <div class="col-md-8">
            <div class="panel panel-default ui-widget-header" id="droppable">
                <div class="panel-heading center-block">Calendar</div>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>
    
@endsection
