@extends('site.layouts.master')
@section('title')
@lang('home.blogs')
@endsection
@section('content')
    <!-- Section [ page-heading ]
            ==========================================-->
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>@lang('home.blogs')</h2>
                </div><!--End col-md-6-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i>@lang('home.home')</a></li>
                        <li class="active">@lang('home.blogs')</li>
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
        <section class="section-setting section-color">
            <div class="container">
                <div class="row">
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