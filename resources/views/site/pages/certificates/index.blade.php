@extends('site.layouts.master')
@section('title')
@lang('home.certificates')
@endsection
@section('content')
    <!-- Section [ page-heading ]
            ==========================================-->
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>@lang('home.certificates')</h2>
                </div><!--End col-md-6-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i>@lang('home.home')</a></li>
                        <li class="active">@lang('home.certificates')</li>
                    </ul>
                </div><!--End col-md-12-->
            </div>
        </div>
    </div><!--End page-heading -->
    <!-- Section [ Page content ]
    ==========================================-->
    <div class="page-content">
        <!-- Section [ certificate ]
        ==========================================-->
        <section class="section-setting">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <ul class="nav nav-tabs inline-tab">
                            @foreach($types as $index => $type)
                                <li class="@if($index == 0){{'active'}}@endif">
                                    <a href="#tab{{$index+1}}" data-toggle="tab">
                                        {{app()->getLocale() == 'en' ? $type->name_en : $type->name_ar}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tab-content ">
                        @foreach($types as $index => $type)
                            <div class="tab-pane fade @if($index == 0){{'in active'}}@endif" id="tab{{$index+1}}">
                                @foreach($type->certificates as $certificate)
                                <div class="container">
                                    <div class="row cerf-item">
                                        <div class="col-sm-6 col-md-6 cert-img">
                                            <img src="{{asset('storage/uploads/certificates/'.$certificate->image)}}">
                                            <a href="{{asset('storage/uploads/certificates/'.$certificate->image)}}" class="popup-gallery"></a>
                                        </div>
                                        <div class="col-sm-6 col-md-6 cert-cont">
                                            <div class="title">{{$certificate->translated()->name}}</div>
                                            <span><i class="fa fa-map-marker"></i> {{$certificate->translated()->destination}}</span>
                                            <span><i class="fa fa-calendar"></i>{{$certificate->created_at->format('D-M-Y')}}</span>
                                        </div>
                                    </div>
                                </div><!--End Col-md-4-->
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div><!--End Row-->
            </div><!--End container-->
        </section><!--End Section-->
    </div><!--End Page Content-->
@endsection