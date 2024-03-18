@extends('admin.layouts.master')
@section('title')
    projects
@endsection
@section('models')
    <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this project ?<h5>
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
                <h2>projects</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
                    <li class="active">projects</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.projects')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Main data</a></li>
                    <li><a data-toggle="tab" href="#menu1">English</a></li>
                    <li><a data-toggle="tab" href="#menu2">Arabic</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="tab-data">
                            <div class="img-block col-md-6" style="margin-right: 15px;">
                                <label>Main image</label>
                                <img src="{{asset('assets/admin/images/download.png')}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                                <input type="file" name="image" style="display: none;">
                                <div class="text-danger text-center">Please click on image to change it</div>
                                <div class="text-danger text-center">Image resolution should be : 372 * 370</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Service</label>
                                <select class="form-control" name="service_id">
                                    <option value="0">-- select service --</option>
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}" >{{$service->english()->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Type</label>
                                <select class="form-control" name="filter_id">
                                    <option value="0">-- select type --</option>
                                    @foreach($filters as $filter)
                                        <option value="{{$filter->id}}" >{{$filter->english()->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="tab-data">
                            <div class="form-group col-md-6">
                                <label>project name in english</label>
                                <input class="form-control" type="text" name="name_en">
                            </div>
                            <div class="form-group col-md-6">
                                <label>project brief in english</label>
                                <input class="form-control" type="text" name="brief_en">
                            </div>
                            <div class="form-group col-md-6">
                                <label>project description in english</label>
                                <textarea class="form-control" name="description_en"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="tab-data">
                            <div class="form-group col-md-6">
                                <label>project name in arabic</label>
                                <input class="form-control" type="text" name="name_ar">
                            </div>
                            <div class="form-group col-md-6">
                                <label>project brief in arabic</label>
                                <input class="form-control" type="text" name="brief_ar">
                            </div>
                            <div class="form-group col-md-6">
                                <label>project description in arabic</label>
                                <textarea class="form-control" name="description_ar"></textarea>
                            </div>
                        </div>
                    </div>
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
                    @include('admin.pages.projects.templates.table')
                </div>
            </div>
        </div>
    </div>
@endsection