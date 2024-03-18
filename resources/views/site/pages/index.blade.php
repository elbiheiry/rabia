@extends('site.layouts.master')
@section('title')
    @lang('home.home')
@endsection
@section('content')
    <div class="carousel fade-carousel slide carousel-fade" data-ride="carousel" data-interval="5000" id="bs-carousel">
        <!-- Overlay -->
        <!-- Indicators -->

        <ol class="carousel-indicators">
            @foreach($sliders as $index => $slider)
                <li data-target="#bs-carousel" data-slide-to="{{$index}}" class="@if($index == 0){{'active'}}@endif"></li>
            @endforeach
        </ol>
        <!-- Wrapper for slides -->


        <!-- we add 7 new images to db.. so , if still 3 please insert it to db (in slider folder) -->
        <div class="carousel-inner ">
            @foreach($sliders as $index => $slider)
                <div class="item slides {{$index == 0 ? 'active' : ''}} carousel-item">
                    <div class="slide"
                         style="background-image: url({{url('storage/uploads/sliders/'.$slider->image)}})">

                        <div class="overlay"></div>
                        <hgroup class="headings typewriter">
                            <h1 class="">{{app()->getLocale() == 'en' ? 'Rabiah garden for commerce and construction' : '  رابية الحديقة للتجارة والمقاولات'}}</h1>
                        <!--<h3 class="wow slideInLeft text-center"  >{{app()->getLocale() == 'en' ? 'For commerce and construction' : 'للتجارة والمقاولات'}}</h3>-->
                        </hgroup>
                    </div>
                </div>
            @endforeach


            <div class="hero">

            <!--<div>
                    <a href="http://www.tinanursery.com/?lang=en" target="blank" class="btn btn-hero btn-lg" role="button">{{app()->getLocale() == 'en' ? 'Tina nursery' : 'موقع تينا'}}</a>
                    <a href="{{asset('assets/site/images/Final Rabia Profile S.pdf')}}" target="blank" class="btn btn-hero btn-lg" role="button" download="">{{app()->getLocale() == 'en' ? 'Download profile' : 'تحميل الملف الشخصي'}}</a>
                </div>-->
            </div>
        </div>
    </div>

    <!-- Section [ Services ]
    ==========================================-->
    <section class="section-setting services">
        <div class="container-fluid">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4 col-sm-4 serv-item wow fadeInUp">
                        <img src="{{asset('storage/uploads/services/'.$service->image)}}">
                        <div class="serv-cont">
                            <div class="head-title">{{$service->translated()->name}}</div>
                            <div class="info-text">{{str_limit($service->translated()->brief,100)}}</div>
                            <a class="custom-btn"
                               href="{{route('site.services',['slug' => $service->slug])}}"><span>@lang('home.more')</span></a>
                        </div>
                    </div><!--End Col-md-4-->
                @endforeach
            </div><!--End Row-->
        </div><!--End container-fluid-->
    </section><!--End Section-->

    <!-- Section [ News ]
    ==========================================-->
    <section class="section-setting section-color">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 wow fadeInUp">
                    <div class="section-title text-center">
                        <div class="head-title">{{$sections[1]->translated()->title}}</div>
                        <span><i class="fa fa-leaf"></i></span>
                        <div class="info-text">{{$sections[1]->translated()->description}}</div>
                    </div><!--End section Title-->
                </div><!--End Col-md-12-->
                @foreach($blogs as $blog)
                    <div class="col-md-4 col-sm-6 wow fadeInUp">
                        <div class="blog-item">
                            <div class="blog-img">
                                <div class="date">
                                    <i class="fa fa-calendar"></i>
                                    {{$blog->created_at->format('d - m - Y')}}
                                </div>
                                <img src="{{asset('storage/uploads/articles/'.$blog->image)}}">
                            </div>
                            <div class="blog-cont">
                                <a href="{{route('site.blog',['slug' => $blog->slug])}}" class="title">
                                    {{$blog->translated()->name}}
                                </a>
                                <div class="info-text">
                                    {{str_limit($blog->translated()->description1 , 75)}}
                                </div>
                                <a href="{{route('site.blog',['slug' => $blog->slug])}}"
                                   class="custom-btn"><span>@lang('home.more')</span></a>
                            </div><!--End Blog Cont-->
                        </div><!--End Blog Item-->
                    </div><!--End Col-md-4-->
                @endforeach
                <div class="col-md-12 col-sm-12 text-center wow fadeInUp">
                    <a href="{{route('site.blogs')}}" class="custom-btn">
                        <span>@lang('home.more')</span>
                    </a>
                </div>
            </div><!--End Row-->
        </div><!--End container-->
    </section><!--End Section-->

    <!-- Section [ Partners ]
    ==========================================-->
    <section class="section-setting">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 wow fadeInUp">
                    <div class="section-title text-center">
                        <div class="head-title">{{$sections[3]->translated()->title}}</div>
                        <span><i class="fa fa-leaf"></i></span>
                    <!--<div class="info-text">{{$sections[3]->translated()->description}}</div>-->
                    </div><!--End section Title-->
                </div><!--End Col-md-12-->
                <div class="col-md-12 col-sm-12 wow fadeInUp">
                    <div class="owl-carousel owl-theme clients-slid">
                        @foreach($partners as $partner)
                            <div class="carousel-item">
                                <img src="{{asset('storage/uploads/partners/'.$partner->image)}}">
                            </div>
                        @endforeach
                    </div><!--End owl-carousel-->
                </div><!--End Col-md-12-->
            </div><!--End Row-->
        </div><!--End container-->
    </section><!--End Section-->
    </div><!--End Page Content-->
@endsection