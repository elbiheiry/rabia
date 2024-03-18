@extends('admin.layouts.master')
@section('title')
    Main page
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12">
            <div class="widget">
                <div class="widget-content">
                    <div class="col-sm-12">
                        <img src="{{asset('assets/admin/images/logo.png')}}" class="intro-logo">
                    </div>
                    <div class="funfact-lists">
                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Article::count()}}" data-speed="2000">0</h3>
                                <div class="count-name">Articles</div>
                            </div>
                        </div>
                    </div>
                    <div class="funfact-lists">
                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Project::count()}}" data-speed="2000">0</h3>
                                <div class="count-name">Projects</div>
                            </div>
                        </div>
                    </div>
                    <div class="funfact-lists">
                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Service::count()}}" data-speed="2000">0</h3>
                                <div class="count-name">Services</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
