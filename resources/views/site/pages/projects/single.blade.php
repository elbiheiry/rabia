@extends('site.layouts.master')
@section('title')
    {{$project->translated()->name}}
@endsection
@section('content')
    <!-- Section [ page-heading ]
            ==========================================-->
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$project->translated()->name}}</h2>
                </div><!--End col-md-6-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i>@lang('home.home')</a></li>
                        <li><a href="{{route('site.projects')}}"><i class="fa fa-briefcase"></i>@lang('home.works')</a></li>
                        <li class="active">{{$project->translated()->name}}</li>
                    </ul>
                </div><!--End col-md-12-->
            </div>
        </div>
    </div><!--End page-heading -->
    <!-- Section [ Page content ]
    ==========================================-->
    <div class="page-content">
        <!-- Section [ Works ]
        ==========================================-->
        <section class="section-setting section-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <div class="inner">
                            <div class="head-title">
                                {{$project->translated()->name}}
                            </div>
                            <span>{{$project->filter->translated()->name}}</span>
                            @foreach(explode("\n" , $project->translated()->description) as $description)
                                <div class="info-text">{{$description}}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="inner">
                            <div class="owl-carousel owl-theme work-slid">
                                @foreach($project->images as $image)
                                    <div class="carousel-item">
                                        <img src="{{asset('storage/uploads/projects/'.$image->image)}}">
                                    </div>
                                @endforeach
                            </div>
                        </div><!--End Work-->
                    </div><!--end Col-md-12-->
                </div><!--End Row-->
            </div><!--End container-->
        </section><!--End Section-->
        <!-- Section [ Works ]
        ==========================================-->
        <section class="section-setting work">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="section-title text-center">
                            <div class="head-title">{{$section->translated()->title}}</div>
                            <span><i class="fa fa-leaf"></i></span>
                            <div class="info-text">{{$section->translated()->description}}</div>
                        </div><!--End section Title-->
                    </div><!--End Col-md-12-->
                    @foreach(\App\Project::where('id' , '!=' , $project->id)->take(3)->get() as $item)
                        <div class="col-md-4 col-sm-6 wow fadeInUp">
                            <div class="work-item">
                                <div class="work-img">
                                    <span>{{$item->translated()->name}}</span>
                                    <img src="{{asset('storage/uploads/projects/'.$item->image)}}">
                                </div>
                                <div class="work-cont">
                                    <div class="head-title">{{$item->translated()->name}}</div>
                                    <div class="info-text">{{$item->translated()->brief}}</div>
                                    <a class="custom-btn" href="{{route('site.project',['slug' => $item->slug])}}"><span>@lang('home.more')</span></a>
                                </div>
                            </div><!--End work Item-->
                        </div><!--End col-md-4 col-sm-6-->
                    @endforeach
                </div><!--End Row-->
            </div><!--End container-->
        </section><!--End Section-->
    </div><!--End Page Content-->
@endsection