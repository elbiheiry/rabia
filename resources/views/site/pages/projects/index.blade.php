@extends('site.layouts.master')
@section('title')
@lang('home.works')
@endsection
@section('content')
    <!-- Section [ page-heading ]
            ==========================================-->
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>@lang('home.works')</h2>
                </div><!--End col-md-6-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i>@lang('home.home')</a></li>
                        <li class="active">@lang('home.works')</li>
                    </ul>
                </div><!--End col-md-12-->
            </div>
        </div>
    </div><!--End page-heading -->
    <!-- Section [ Page content ]
    ==========================================-->
    <div class="page-content">
        <!-- Section [ Work ]
        ==========================================-->
        <section class="section-setting">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <ul class="nav nav-tabs inline-tab">
                            @foreach($filters as $index => $filter)
                                <li class="@if($index == 0){{'active'}}@endif">
                                    <a href="#tab{{$index+1}}" data-toggle="tab">
                                        {{$filter->translated()->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tab-content">
                        @foreach($filters as $index => $filter)
                            <div class="tab-pane fade @if($index == 0){{'in active'}}@endif" id="tab{{$index+1}}">
                                @foreach($filter->projects as $project)
                                <div class="col-md-4 col-sm-6">
                                    <div class="work-item">
                                        <div class="work-img">
                                            <span>{{$filter->translated()->name}}</span>
                                            <img src="{{asset('storage/uploads/projects/'.$project->image)}}">
                                        </div>
                                        <div class="work-cont">
                                            <div class="head-title">{{$project->translated()->name}}</div>
                                            <div class="info-text">{{$project->translated()->brief}}</div>
                                            <a class="custom-btn" href="{{route('site.project',['slug' => $project->slug])}}"><span>@lang('home.more')</span></a>
                                        </div>
                                    </div><!--End work Item-->
                                </div><!--End col-md-4 col-sm-6-->
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div><!--End Row-->
            </div><!--End container-->
        </section><!--End Section-->
    </div><!--End Page Content-->
@endsection