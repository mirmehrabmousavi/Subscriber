@extends('admin.layouts.app')

@section('content')
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                    <li class="nav-item" style="margin-bottom: 5px;">
                        <a class="nav-link d-flex py-75 {{(request()->tab == '')? 'active' : ''}}" id="settings-general" data-toggle="pill"
                           href="#general" aria-expanded="true">
                            <i class="fa fa-globe mr-50 font-medium-3"></i>
                            تنظیمات عمومی
                        </a>
                    </li>
                    <li class="nav-item" style="margin-bottom: 5px;">
                        <a class="nav-link d-flex py-75 {{(request()->tab == 'seo')? 'active' : ''}}" id="settings-seo" data-toggle="pill"
                           href="#seo" aria-expanded="true">
                            <i class="fa fa-google mr-50 font-medium-3"></i>
                            تنظیمات سئو
                        </a>
                    </li>
                    <li class="nav-item" style="margin-bottom: 5px;">
                        <a class="nav-link d-flex py-75 {{(request()->tab == 'payment')? 'active' : ''}}" id="settings-payment" data-toggle="pill"
                           href="#payment" aria-expanded="true">
                            <i class="fa fa-dollar mr-50 font-medium-3"></i>
                            تنظیمات درگاه پرداخت
                        </a>
                    </li>
                    <li class="nav-item" style="margin-bottom: 5px;">
                        <a class="nav-link d-flex py-75 {{(request()->tab == 'sms')? 'active' : ''}}" id="settings-sms" data-toggle="pill"
                           href="#sms" aria-expanded="true">
                            <i class="fa fa-mobile-phone mr-50 font-medium-3"></i>
                            تنظیمات SMS
                        </a>
                    </li>
                </ul>
            </div>
            <!-- right content section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="tab-content">
                                {{--General--}}
                                @include('admin.settings.includes.site')
                                {{--Seo--}}
                                @include('admin.settings.includes.seo')
                                {{--Payment--}}
                                @include('admin.settings.includes.payment')
                                {{--SMS--}}
                                @include('admin.settings.includes.sms')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    @yield('script-settings-site')
    @yield('script-settings-seo')
    @yield('script-settings-payment')
    @yield('script-settings-sms')
@endsection
