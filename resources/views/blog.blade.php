@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
<div style="width:100%; height:100%;">
<iframe src="{{ asset('/blog-content') }}" width="100%" height="auto" frameborder="0" marginwidth="0" marginheight="0">Test of Blog</iframe>
</div>
</div>
</div>
</div>
@endsection