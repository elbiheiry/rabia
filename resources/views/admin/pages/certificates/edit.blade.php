@extends('admin.layouts.master')
@section('title')
    certificates
@endsection
@section('models')
    <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this certificate ?<h5>
                </div>
                <form class="modal-footer text-center">
                    <a style="cursor: pointer;" class="custom-btn modalDLTBTN">Delete</a>
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
                <h2>certificates</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
                    <li class="active">certificates</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.certificates.edit',['id' => $certificate->id])}}" method="post" enctype="multipart/form-data">
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
                                <img src="{{asset('storage/uploads/certificates/'.$certificate->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                                <input type="file" name="image" style="display: none;">
                                <div class="text-danger text-center">Please click on image to change it</div>
                                <div class="text-danger text-center">Image resolution should be : 600 * 436</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Type</label>
                                <select class="form-control" name="type">
                                    <option value="0">-- select type --</option>
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}" @if($certificate->type == $type->id){{'selected'}}@endif>{{$type->name_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="tab-data">
                            <div class="form-group col-md-6">
                                <label>certificate name in english</label>
                                <input class="form-control" type="text" name="name_en" value="{{$certificate->english()->name}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>certificate destination in english</label>
                                <input class="form-control" type="text" name="destination_en" value="{{$certificate->english()->destination}}">
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="tab-data">
                            
                            <div class="form-group col-md-6">
                                <label>certificate name in arabic</label>
                                <input class="form-control" type="text" name="name_ar" value="{{$certificate->arabic()->name}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>certificate destination in arabic</label>
                                <input class="form-control" type="text" name="destination_ar" value="{{$certificate->arabic()->destination}}">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
                <div class="progress-wrap" style="display: none;">
                    <div class="progress">
                        <div class="bar"></div >
                        <div class="percent">0%</div >
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection