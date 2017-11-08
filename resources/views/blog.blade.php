@extends('layouts.app')

@section('styles')
<style>iframe{width: 1px;min-width: 100%;}</style>
@endsection

@section('content')
                <iframe id="myIframe" src="{{ asset('/blog-content') }}" scrolling="no" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';"></iframe>
@endsection

@section('scripts')

<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
<div style="width:100%; height:1000px">
<iframe src="{{ asset('/blog-content') }}" width="100%" height="100%" frameborder="0" marginwidth="0" marginheight="0">Test of Blog</iframe>
</div>
</div>
</div>
</div>
@endsection