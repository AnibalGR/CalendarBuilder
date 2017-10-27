@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/custom-pricing.css') }}" rel="stylesheet" >
@endsection


@section('content')
<section class="bgimg-1 section-title">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="mt-40"></div>
                    <h1>Pricing Options Include</h1>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container section-table-pricing">
        <div class="col-md-4 mt-40">
            <div class="table-pricing">
                <div class="pricing-group">
                    <h2>FREE</h2>
                    <p>Edit and view only</p>
                </div>
                <div class="princint-1">
                    <span>FREE</span>
                </div>
                <!-- Price Item -->
                <div class="pricing-item">
                    <div class="row">
                        <div class="col-xs-6" style="text-align: right; font-size: 22px;">
                            <ul>
                                <li><p><strong><i class="fa fa-check-circle list-green" aria-hidden="true"></i></strong></p></li>
                                <li><p><strong><i class="fa fa-check-circle list-green" aria-hidden="true"></i></strong></p></li>
                                <li><p><strong><i class="fa fa-times-circle list-green" aria-hidden="true"></i></strong></p></li>
                                <li><p><strong><i class="fa fa-times-circle list-green" aria-hidden="true"></i></strong></p></li>
                            </ul>
                        </div>
                        <div class="col-xs-6" style="text-align: left; margin-left: 0px !important; padding-left: 0px;">
                            <ul>
                                <li><p>View</p></li>
                                <li><p>Editor</p></li>
                                <li><p>Save</p></li>
                                <li><p>Export</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="button-sign-up">
                    <a href="#">SIGN UP</a>
                </div>
                <div class="pricing-table-bottom"></div>
            </div>
        </div>
        <div class="col-md-4 mt-40">
            <div class="table-pricing">
                <div class="pricing-group">
                    <h2>Monthly Plan</h2>
                    <p>Edit and view, save and export</p>
                </div>
                <div class="princint-1">
                    <span>$39.99</span>
                </div>
                <!-- Price Item -->
                <div class="pricing-item">
                    <div class="row">
                        <div class="col-xs-6" style="text-align: right; font-size: 22px;">
                            <ul>
                                <li><p><strong><i class="fa fa-check-circle list-green" aria-hidden="true"></i></strong></p></li>
                                <li><p><strong><i class="fa fa-check-circle list-green" aria-hidden="true"></i></strong></p></li>
                                <li><p><strong><i class="fa fa-check-circle list-green" aria-hidden="true"></i></strong></p></li>
                                <li><p><strong><i class="fa fa-check-circle list-green" aria-hidden="true"></i></strong></p></li>
                            </ul>
                        </div>
                        <div class="col-xs-6" style="text-align: left; margin-left: 0px !important; padding-left: 0px;">
                            <ul>
                                <li><p>View</p></li>
                                <li><p>Editor</p></li>
                                <li><p>Save</p></li>
                                <li><p>Export</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="button-sign-up">
                    <a href="#">SIGN UP</a>
                </div>
                <div class="pricing-table-bottom"></div>
            </div>
        </div>
        <div class="col-md-4 mt-40">
            <div class="table-pricing">
                <div class="pricing-group">
                    <h2>Yearly Plan</h2>
                    <p>Edit and view, save and export</p>
                </div>
                <div class="princint-1">
                    <span>$400.00</span>
                </div>
                <!-- Price Item -->
                <div class="pricing-item">
                    <div class="row">
                        <div class="col-xs-6" style="text-align: right; font-size: 22px;">
                            <ul>
                                <li><p><strong><i class="fa fa-check-circle list-green" aria-hidden="true"></i></strong></p></li>
                                <li><p><strong><i class="fa fa-check-circle list-green" aria-hidden="true"></i></strong></p></li>
                                <li><p><strong><i class="fa fa-check-circle list-green" aria-hidden="true"></i></strong></p></li>
                                <li><p><strong><i class="fa fa-check-circle list-green" aria-hidden="true"></i></strong></p></li>
                            </ul>
                        </div>
                        <div class="col-xs-6" style="text-align: left; margin-left: 0px !important; padding-left: 0px;">
                            <ul>
                                <li><p>View</p></li>
                                <li><p>Editor</p></li>
                                <li><p>Save</p></li>
                                <li><p>Export</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="button-sign-up">
                    <a href="#">SIGN UP</a>
                </div>
                <div class="pricing-table-bottom"></div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="mt-100"></div>
    </div>
</section>
<section>
<div class="container-fluid bg-div-2">
    <div class="mt-50"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="color-2">Frequently Asked Questions</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="color-1">Lorem Ipsum</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id ipsum diam. Nulla facilisi. 
                    Sed suscipit sem a mauris commodo aliquet. In sit amet nulla vel nisi congue pulvinar nec et dui nulla facilisi. 
                    Sed vestibulum sem vel elit tincidunt ultricies. Nullam rutrum lacus et elit cursus, at dapibus ante ultrices.</p>
            </div>
            <div class="col-md-4">
                <h4 class="color-1">Lorem Ipsum</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id ipsum diam. Nulla facilisi. 
                    Sed suscipit sem a mauris commodo aliquet. In sit amet nulla vel nisi congue pulvinar nec et dui nulla facilisi. 
                    Sed vestibulum sem vel elit tincidunt ultricies. Nullam rutrum lacus et elit cursus, at dapibus ante ultrices.</p>
            </div>
            <div class="col-md-4">
                <h4 class="color-1">Lorem Ipsum</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id ipsum diam. Nulla facilisi. 
                    Sed suscipit sem a mauris commodo aliquet. In sit amet nulla vel nisi congue pulvinar nec et dui nulla facilisi. 
                    Sed vestibulum sem vel elit tincidunt ultricies. Nullam rutrum lacus et elit cursus, at dapibus ante ultrices.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="color-1">Lorem Ipsum</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id ipsum diam. Nulla facilisi. 
                    Sed suscipit sem a mauris commodo aliquet. In sit amet nulla vel nisi congue pulvinar nec et dui nulla facilisi. 
                    Sed vestibulum sem vel elit tincidunt ultricies. Nullam rutrum lacus et elit cursus, at dapibus ante ultrices.</p>
            </div>
            <div class="col-md-4">
                <h4 class="color-1">Lorem Ipsum</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id ipsum diam. Nulla facilisi. 
                    Sed suscipit sem a mauris commodo aliquet. In sit amet nulla vel nisi congue pulvinar nec et dui nulla facilisi. 
                    Sed vestibulum sem vel elit tincidunt ultricies. Nullam rutrum lacus et elit cursus, at dapibus ante ultrices.</p>
            </div>
            <div class="col-md-4">
                <h4 class="color-1">Lorem Ipsum</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis id ipsum diam. Nulla facilisi. 
                    Sed suscipit sem a mauris commodo aliquet. In sit amet nulla vel nisi congue pulvinar nec et dui nulla facilisi. 
                    Sed vestibulum sem vel elit tincidunt ultricies. Nullam rutrum lacus et elit cursus, at dapibus ante ultrices.</p>
            </div>
        </div>
    </div>
    <div class="mt-80"></div>
</div>
</section>


@endsection

<!-- Scripts -->
<script src="/js/app.js"></script>
@yield('braintree')