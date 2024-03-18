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
                                    <a href="#tab{{$filter->id}}" data-toggle="tab">
                                        {{$filter->translated()->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tab-content">
                        @foreach($filters as $index => $filter)
                            <div class="tab-pane @if($index == 0){{'active'}}@endif" id="tab{{$filter->id}}">
                                <!--government tab content-->
                                @if(sizeof($filter->subs) > 0)
                                    <ul class="nav nav-tabs2 inline-tab">
                                        @foreach($filter->subs as $value => $sub)
                                            <li class="@if($value == 0){{'active'}}@endif">
                                                <a href="#tab{{$sub->id}}" data-toggle="tab">
                                                    {{$sub->translated()->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="clearfix"></div>
                                <div class="tab-content">
                                    @if(sizeof($filter->subs) > 0)
                                        @foreach($filter->subs as $value => $sub)
                                            <div class="tab-pane @if($value == 0){{'active'}}@endif "
                                                 id="tab{{$sub->id}}">
                                                @foreach($sub->projects as $project)
                                                    <div class="col-md-4 col-sm-6">
                                                        <div class="work-item">
                                                            <div class="work-img">
                                                                <span>{{$sub->translated()->name}}</span>
                                                                <img src="{{asset('storage/uploads/projects/'.$project->image)}}"/>
                                                            </div>
                                                            <div class="work-cont">
                                                                <div class="head-title">{{$project->translated()->name}}</div>
                                                                <div class="info-text">{{$project->translated()->brief}}</div>
                                                            </div>
                                                        </div><!--End work Item-->
                                                    </div><!--End col-md-4 col-sm-6-->
                                                @endforeach
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="tab-pane @if($index != 0){{'active'}}@endif" id="tab{{$filter->id}}">
                                            @foreach($filter->projects as $project)
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="work-item">
                                                        <div class="work-img">
                                                            <span>{{$filter->translated()->name}}</span>
                                                            <img src="{{asset('storage/uploads/projects/'.$project->image)}}"/>
                                                        </div>
                                                        <div class="work-cont">
                                                            <div class="head-title">{{$project->translated()->name}}</div>
                                                            <div class="info-text">{{$project->translated()->brief}}</div>
                                                        </div>
                                                    </div><!--End work Item-->
                                                </div><!--End col-md-4 col-sm-6-->
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div><!--government tab content-->
                        @endforeach
                    </div>
                </div>
            </div><!--End Row-->
        </section><!--End Section-->
    </div><!--End Page Content-->
@endsection