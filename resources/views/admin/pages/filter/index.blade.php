@extends('admin.layouts.master')
@section('title')
    filters
@endsection
@section('models')
    <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this filter ?</h5>
                </div>
                <form class="modal-footer text-center">
                    <a style="cursor: pointer;" class="custom-btn modalDLTBTN">Delete</a>
                    <a style="cursor: pointer;" class="custom-btn red-bc" data-dismiss="modal">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>filters</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">filters</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.filters')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group col-md-6">
                    <label>filter name in arabic</label>
                    <input class="form-control" type="text" name="name_ar">
                </div>
                <div class="form-group col-md-6">
                    <label>filter name in english</label>
                    <input class="form-control" type="text" name="name_en">
                </div>
                <div class="form-group col-md-6">
                    <label>Filter main category</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">Main category</option>
                        @foreach($filters as $filter)
                            @if($filter->parent_id == 0)
                                <option value="{{$filter->id}}">{{$filter->english()->name}}</option>
                            @endif
                        @endforeach
                    </select>
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
                <div class="load-spinner" style="display: none;">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
                <div class="spacer-15"></div>
                <div class="table-responsive">
                    @include('admin.pages.filter.templates.table')
                </div>
            </div>
        </div>
    </div>
@endsection