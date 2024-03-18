@extends('admin.layouts.master')
@section('title')
    Videos
@endsection
@section('models')

    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Videos</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">Videos</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.services.videos',['id' => $id])}}" method="post" enctype="multipart/form-data" id="my-dropzone">
                {!! csrf_field() !!}

                <div class="form-group col-md-12">
                    <label>Video link</label>
                    <input class="form-control" type="text" name="link">
                </div>
                <div class="form-group col-md-6">
                    <label>title in english</label>
                    <input class="form-control" type="text" name="title_en">
                </div>
                <div class="form-group col-md-6">
                    <label>title in arabic</label>
                    <input class="form-control" type="text" name="title_ar">
                </div>
                <div class="form-group col-md-6">
                    <label>description in english</label>
                    <textarea class="form-control" name="description_en"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label>description in arabic</label>
                    <textarea class="form-control" name="description_ar"></textarea>
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
            </form>
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <form method="post" action="{{route('admin.services.videos.delete',['id' => $id])}}" class="ajax-form">
                    {!! csrf_field() !!}
                    <div class="col-sm-12">
                        <button type="submit" class="icon-btn red-bc">
                            <i class="fa fa-trash-o"></i>
                            Delete
                        </button>
                    </div>
                    <div class="load-spinner" style="display: none;">
                        <i class="fa fa-spinner fa-spin"></i>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="table-responsive">
                        @include('admin.pages.services.videos.templates.table')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
