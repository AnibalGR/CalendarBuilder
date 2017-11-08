@extends('layouts.app')

@section('styles')
<style>iframe{width: 1px;min-width: 100%;}</style>
@endsection

@section('content')
                <iframe id="myIframe" src="{{ asset('/blog-content') }}" scrolling="no" onload="this.style.height=this.contentDocument.body.scrollHeight + 'px';"></iframe>
@endsection

@section('scripts')
<script>
$(function(){
    // Resize canvas
    window.addEventListener('resize', resizeIframe, false);
    
    function resizeIframe(){
        document.getElementById("myIframe").style.height = document.getElementById("myIframe").contentDocument.body.scrollHeight + 'px'
    }
    
})
</script>
@endsection