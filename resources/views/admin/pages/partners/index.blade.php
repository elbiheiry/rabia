@extends('admin.layouts.master')
@section('title')
    partners
@endsection
@section('models')
    <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this partner ?<h5>
                </div>
                <form class="modal-footer text-center">
                    <a style="cursor: pointer;" class="custom-btn green-bc modalDLTBTN">Delete</a>
                    <a style="cursor: pointer;" class="custom-btn red-bc" data-dismiss="modal">Close</a>
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
                <h2>partners</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
                    <li class="active">partners</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.partners')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="img-block col-md-6" style="margin-right: 15px;">
                    <label>Main image</label>
                    <img src="{{asset('assets/admin/images/download.png')}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                    <input type="file" name="image" style="display: none;">
                    <div class="text-danger text-center">Please click on image to change it</div>
                    <div class="text-danger text-center">Image resolution should be : 130 * 130</div>
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
                    @include('admin.pages.partners.templates.table')
                </div>
            </div>
        </div>
    </div>
@endsection