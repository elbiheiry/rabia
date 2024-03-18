@extends('site.layouts.master')
@section('title')
    {{$blog->translated()->name}}
@endsection
@section('content')
    <!-- Section [ page-heading ]
            ==========================================-->
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$blog->translated()->name}}</h2>
                </div><!--End col-md-6-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i>@lang('home.home')</a></li>
                        <li><a href="{{route('site.blogs')}}"><i class="fa fa-newspaper"></i>@lang('home.blogs')</a></li>
                        <li class="active">{{$blog->translated()->name}}</li>
                    </ul>
                </div><!--End col-md-12-->
            </div>
        </div>
    </div><!--End page-heading -->
    <!-- Section [ Page content ]
    ==========================================-->
    <div class="page-content">
        <!-- Section [ Blogs ]
        ==========================================-->
        <section class="section-setting">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="blog">
                            <div class="head-title">{{$blog->translated()->name}}</div>
                            <div class="date">
                                <i class="fa fa-calendar"></i>
                                {{$blog->created_at->format('d - m - Y')}}
                            </div>
                            <div class="blog-img">
                                <img src="{{asset('storage/uploads/articles/'.$blog->inner_image)}}">
                            </div>
                            @foreach(explode("\n" , $blog->translated()->description1) as $descsription)
                                <div class="info-text">{{$descsription}}</div>
                            @endforeach

                            <div class="clearfix"></div>
                            <div class="col-md-7 col-sm-12 info-text">
                                @foreach(explode("\n" , $blog->translated()->description2) as $descsription)
                                    {{$descsription}}<br>
                                @endforeach
                            </div>
                            <div class="col-md-5 col-sm-12 blog-img">
                                <img src="{{asset('storage/uploads/articles/'.$blog->image)}}">
                            </div>
                            <div class="clearfix"></div>
                            @foreach(explode("\n" , $blog->translated()->description3) as $descsription)
                                <div class="info-text">{{$descsription}}</div>
                            @endforeach
                        </div>
                    </div><!--End col-md-9-->
                </div><!--End Row-->
            </div><!--End container-->
        </section><!--End Section-->
        <!-- Section [ Blogs ]
        ==========================================-->
        <section class="section-setting section-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="section-title text-center">
                            <div class="head-title">{{$section->translated()->title}}</div>
                            <span><i class="fa fa-leaf"></i></span>
                            <div class="info-text">{{$section->translated()->description}}</div>
                        </div><!--End section Title-->
                    </div><!--End Col-md-12-->
                    @foreach(\App\Article::where('id' , '!=' , $blog->id)->take(3)->inRandomOrder()->get() as $blog)
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
                                    <a href="{{route('site.blog',['slug' => $blog->slug])}}" class="custom-btn"><span>@lang('home.more')</span></a>
                                </div><!--End Blog Cont-->
                            </div><!--End Blog Item-->
                        </div><!--End Col-md-4-->
                    @endforeach
                </div><!--End Row-->
            </div><!--End container-->
        </section><!--End Section-->
    </div><!--End Page Content-->
@endsection