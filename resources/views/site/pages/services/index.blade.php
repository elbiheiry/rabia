@extends('site.layouts.master')
@section('title')
    {{$service->translated()->name}}
@endsection
@section('content')
    <!-- Section [ page-heading ]
            ==========================================-->
    <div class="service-heading">
        <div class="container content-style">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$service->translated()->name}}</h2>
                </div><!--End col-md-6-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i>@lang('home.home')</a></li>
                        <li class="active">{{$service->translated()->name}}</li>
                    </ul>
                </div><!--End col-md-12-->
            </div>
        </div>
    </div><!--End page-heading -->
    <!-- Section [ Page content ]
    ==========================================-->
    <div class="page-content">
        <section class="section-setting section-color">
            <div class="container"><!--main tabs-->
                <div class="row">
                    <div class="col-md-12 wow fadeInLeft">
                        <div class="inner">
                            @if(sizeof($service->sub_services) > 0)
                                <ul class="nav nav-tabs right-tabs">
                                    @foreach($service->sub_services as $index => $sub_service)
                                        <li class="@if($index == 0){{'active'}}@endif">
                                            <a href="#tab{{$sub_service->id}}" data-toggle="tab">
                                                {{$sub_service->translated()->name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <ul class="nav nav-tabs right-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-toggle="tab">
                                            - {{app()->getLocale() == 'en' ? 'Breif about work' : 'شرح مختصر لاعمالنا'}}
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#tab2" data-toggle="tab">
                                            - {{app()->getLocale() == 'en' ? 'photos' : 'الصور'}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab3" data-toggle="tab">
                                            - {{app()->getLocale() == 'en' ? 'Videos' : 'الفيديوهات'}}
                                        </a>
                                    </li>
                                </ul>
                            @endif
                            <div class="clearfix"></div>
                            <div class="col-md-12 col-sm-12 tab-content">
                                @if(sizeof($service->sub_services) > 0)
                                    @foreach($service->sub_services as $index => $sub_service)
                                        <div class="tab-pane fade in @if($index == 0){{'active'}}@endif"
                                             id="tab{{$sub_service->id}}"><!--first-->
                                            @if(sizeof($sub_service->sub_services) == 0)
                                                {{$sub_service->translated()->description1}}
                                                <h3>{{app()->getLocale() == 'en' ? 'Our works' : 'من اعمالنا'}}</h3>
                                                <!--start of container-->
                                                <div class="">
                                                    <div class="row">
                                                        <!--start of pic-->
                                                        @foreach($sub_service->images as $image)
                                                            <div class="col-sm-2 img-box">
                                                                <img src="{{asset('storage/uploads/services/'.$image->image)}}"/>
                                                            </div><!--end of pic-->
                                                        @endforeach
                                                    </div>
                                                </div><!--end of container-->

                                                @else

                                                <div class=""><!--sub tabs-->
                                                    <div class="row">
                                                        <div class="col-md-12 wow fadeInLeft">
                                                            <div class="">
                                                                <ul class="nav nav-tabs2 right-tabs">
                                                                    @foreach($sub_service->sub_services as $value => $sub)
                                                                        <li class="@if($value == 0){{'active'}}@endif">
                                                                            <a href="#tab{{$sub->id}}" data-toggle="tab">
                                                                                {{$sub->translated()->name}}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <div class="clearfix"></div>
                                                                <div class="col-md-12 col-sm-12 tab-content">
                                                                    @foreach($sub_service->sub_services as $value => $sub)
                                                                        <div class="tab-pane fade in @if($value == 0){{'active'}}@endif" id="tab{{$sub->id}}"><!--first-->
                                                                            <div class="info-text">
                                                                                {{$sub->translated()->description1}}
                                                                            </div>
                                                                            <h3>{{app()->getLocale() == 'en' ? 'Our works' : 'من اعمالنا'}}</h3>
                                                                            <!--start of container-->
                                                                            <div class="">
                                                                                <div class="row">
                                                                                    <!--start of pic-->
                                                                                    @foreach($sub->images as $image)
                                                                                    <div class="col-sm-2 img-box">
                                                                                        <img src="{{asset('storage/uploads/services/'.$image->image)}}"/>
                                                                                    </div><!--end of pic-->
                                                                                    @endforeach
                                                                                </div>
                                                                            </div><!--end of container-->
                                                                        </div><!--first-->
                                                                    @endforeach
                                                                </div><!--content-->
                                                            </div><!--inner-->
                                                        </div><!--full width-->
                                                    </div><!--end of row-->
                                                </div><!--sub tabs-->
                                            @endif
                                        </div><!--first-->
                                    @endforeach
                                @else
                                    <div class="col-md-12 col-sm-12 tab-content">
                                        <div class="tab-pane active fade in" id="tab1">
                                            <div class="info-text">
                                                {{$service->translated()->description1}}
                                            </div>
                                            <ul class="dot-lists">
                                                @foreach(explode("\n" , $service->translated()->feartures) as $feature)
                                                    <li>
                                                        {{$feature}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade in " id="tab2">
                                            <!--start of container-->
                                            <div class="">
                                                <div class="row">
                                                    <!--start of pic-->
                                                    @foreach($service->images as $image)
                                                        <div class="col-sm-2 img-box">
                                                            <img src="{{asset('storage/uploads/services/'.$image->image)}}"/>
                                                        </div><!--end of pic-->
                                                    @endforeach
                                                </div>
                                            </div><!--end of container-->
                                        </div>
                                        <div class="tab-pane fade in" id="tab3">
                                            <!--videos implementation service-->
                                            @if(sizeof($service->videos) > 0)
                                                <section class="section-setting ">
                                                    <div class="">
                                                        <h3 class="sub-title text-center"
                                                            style="padding-bottom:40px;">@lang('home.videos')</h3>
                                                        <div class="row">
                                                            @foreach($service->videos as $video)
                                                                <div class="col-sm-4 text-center">
                                                                    <a class="popup-youtube" href="{{$video->link}}"
                                                                       target="blank">
                                                                        <i class="fa fa-play"
                                                                           style="color:#9f1c5f; border-radius:100%;border:solid 1px #9f1c5f;padding:20px 25px;"></i>
                                                                    </a>
                                                                    <h2 class="wow fadeInUp"
                                                                        data-wow-delay="0.5s">{{$video->translated()->title}}</h2>
                                                                    <p class="wow fadeInUp"
                                                                       data-wow-delay="0.5s">{{$video->translated()->description}}</p>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </section>
                                            @endif
                                        <!--end of videos implementation service-->
                                        </div>
                                    </div>
                                @endif
                            </div><!--content-->
                        </div><!--inner-->
                    </div><!--full width-->
                </div><!--end of row-->
            </div><!--main tabs-->

        </section>
    </div>
@endsection