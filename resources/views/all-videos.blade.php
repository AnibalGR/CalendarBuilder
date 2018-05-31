@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/custom-home.css') }}" rel="stylesheet" >
@endsection

@section('content')

        <div class="container-fluid g-section-3">
            <div class="row space-40">
                <div class="container">
                     <div class="row">
                        <div class="col-lg-12 txtcenter color-1">
                        <h1>See All Our Automated Content</h1>
                        <p>Enhance your display with engaging images. Here are just a few examples of our professionally created digital graphics and videos.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal">
                                <img src="{{ asset('img/all-videos/preview-1.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                                            <video autoplay loop class="embed-responsive-item">
                                                                <source src="{{ asset('vid/001.mp4') }}" type="video/mp4">
                                                            </video>
                                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal2">
                                <img src="{{ asset('img/all-videos/preview-2.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal2" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                     <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="{{ asset('vid/002.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal3">
                                <img src="{{ asset('img/all-videos/preview-3.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal3" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="{{ asset('vid/003.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>        
                    </div>
                    
                    <div class="row">
                        
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal4">
                                <img src="{{ asset('img/all-videos/preview-4.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal4" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="{{ asset('vid/004.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal5">
                                <img src="{{ asset('img/all-videos/preview-5.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal5" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="{{ asset('vid/005.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal6">
                                <img src="{{ asset('img/all-videos/preview-6.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal6" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="{{ asset('vid/006.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                       
                       
                    </div>
                    
                    <div class="row">
                        
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal7">
                                <img src="{{ asset('img/all-videos/preview-7.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal7" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="{{ asset('vid/007.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal8">
                                <img src="{{ asset('img/all-videos/preview-8.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal8" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="{{ asset('vid/008.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal9">
                                <img src="{{ asset('img/all-videos/preview-9.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal9" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="{{ asset('vid/009.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                       
                       
                    </div>
                    <div class="row">
                        
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal10">
                                <img src="{{ asset('img/all-videos/preview-10.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal10" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="{{ asset('vid/010.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal11">
                                <img src="{{ asset('img/all-videos/preview-11.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal11" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="{{ asset('vid/011.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 space-20">
                            <button type="button" class="btn btn-lg btn-CtmVideos" data-toggle="modal" data-target="#myModal12">
                                <img src="{{ asset('img/all-videos/preview-12.jpg') }}" class="img-responsive pointerCustom">
                            </button>   

                            <div id="myModal12" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <p></p>
                                    <div align="center" class="embed-responsive embed-responsive-16by9">
                                        <video autoplay loop class="embed-responsive-item">
                                            <source src="{{ asset('vid/012.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        </div>
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>


  
    
<div class="container-fluid bottomSec-1 bottomSec-grey">
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
