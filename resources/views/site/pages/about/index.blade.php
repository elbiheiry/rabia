@extends('site.layouts.master')
@section('title')
    @lang('home.about')
@endsection
@section('content')
    <!-- Section [ page-heading ]
            ==========================================-->
    <div class="page-heading">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <h2>@lang('home.about')</h2>
                </div><!--End col-md-12-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i>@lang('home.home')</a></li>
                        <li class="active">@lang('home.about')</li>
                    </ul>
                </div><!--End col-md-12-->
            </div>
        </div>
    </div><!--End page-heading -->
    <!-- Section [ Page content ]
    ==========================================-->
    <div class="page-content">
        <!-- Section [ About ]
        ==========================================-->
        <section class="section-setting section-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow fadeInLeft">
                        <div class="inner">
                            <ul class="nav nav-tabs right-tabs">
                                <li>
                                    <a href="#tab5" data-toggle="tab">
                                        {{app()->getLocale() == 'en' ? 'General Manager' : 'المدير'}}
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#tab3" data-toggle="tab">
                                        - {{$abouts[3]->translated()->title}}
                                    </a>
                                </li>

                                <li>
                                    <a href="#tab1" data-toggle="tab">
                                        - {{$abouts[1]->translated()->title}}
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab">
                                        - {{$abouts[2]->translated()->title}}
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab4" data-toggle="tab">
                                        {{app()->getLocale() == 'en' ? 'Organizational structure' : 'الهيكل التنظيمي'}}
                                    </a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                            <div class="col-md-12 col-sm-12 tab-content">
                                <div class="tab-pane fade in active" id="tab1">

                                    <div class="info-text">
                                        {{$abouts[1]->translated()->description1}}
                                    </div>
                                </div>
                                <div class="tab-pane fade in" id="tab2">
                                    <ul class="dot-lists">
                                        @foreach(explode("\n" , $abouts[2]->translated()->description1) as $description)
                                            <li>{{$description}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane fade in" id="tab3">
                                    <ul class="dot-lists">
                                        @foreach(explode("\n" , $abouts[3]->translated()->description1) as $description)
                                            <li>{{$description}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane fade in" id="tab4">
                                    <ul class="dot-lists">
                                        <img id="myImg" src="{{asset('storage/uploads/about/'.$abouts[6]->image)}}"
                                             alt="Organizational structure">

                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">
                                            <span class="close">&times;</span>
                                            <img class="modal-content" id="img01">
                                            <div id="caption"></div>
                                        </div>
                                    </ul>
                                </div>
                                <div class="tab-pane fade in" id="tab5">
                                    <ul class="dot-lists">
                                        <div class="author">
                                            <div class="sub-title">{{$abouts[4]->translated()->title}}</div>
                                            @foreach(explode("\n" , $abouts[4]->translated()->description1) as $description)
                                                <div class="info-text">{{$description}}</div>
                                            @endforeach
                                            <span><img src="{{asset('assets/site/images/chairman.jpg')}}">{{app()->getLocale() == 'ar' ? 'ناصر المتعب' : 'Nasser Al Mutiebb'}}</span>
                                        </div>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div><!--End Page Content-->
@endsection