@extends('admin.layouts.master')
@section('title')
    About us
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>About us</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
                    <li class="active">About us</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content edit-form" action="{{route('admin.about.edit',['id' => $about->id])}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <ul class="nav nav-tabs">
                    @if($about->image || $about->brochure)
                        <li class="active"><a data-toggle="tab" href="#home">Main data</a></li>
                    @endif
                    <li class="@if(!$about->image){{'active'}}@endif"><a data-toggle="tab" href="#menu1">English</a></li>
                    <li><a data-toggle="tab" href="#menu2">Arabic</a></li>
                </ul>

                <div class="tab-content">
                    @if($about->image || $about->brochure)
                        <div id="home" class="tab-pane fade in active">
                        <div class="tab-data">
                            <div class="img-block col-md-6" style="margin-right: 15px;">
                                <label>Main image</label>
                                <img src="{{asset('storage/uploads/about/'.$about->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                                <input type="file" name="image" style="display: none;">
                                <div class="text-danger text-center">Please click on image to change it</div>
                            </div>
                            <!--@if($about->id == 1)-->
                            <!--    <div class="form-group col-md-6">-->
                            <!--        <label>Company brochure</label>-->
                            <!--        <input class="form-control" type="file" name="brochure" >-->
                            <!--    </div>-->
                            <!--@endif-->
                        </div>
                    </div>
                    @endif
                    <div id="menu1" class="tab-pane fade @if(!$about->image){{'in active'}}@endif">
                        <div class="tab-data">
                            <div class="form-group col-md-6">
                                <label>about title in english</label>
                                <input class="form-control" type="text" name="title_en" value="{{$about->english()->title}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>about first description in english</label>
                                <textarea class="form-control" name="description1_en">{{$about->english()->description1}}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label>about second description in english</label>
                                <textarea class="form-control" name="description2_en">{{$about->english()->description2}}</textarea>
                                <div class="text-danger">This field can be null</div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="tab-data">
                            
                            <div class="form-group col-md-6">
                                <label>about title in arabic</label>
                                <input class="form-control" type="text" name="title_ar" value="{{$about->arabic()->title}}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>about first description in arabic</label>
                                <textarea class="form-control" name="description1_ar">{{$about->arabic()->description1}}</textarea>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>about second description in arabic</label>
                                <textarea class="form-control" name="description2_ar">{{$about->arabic()->description2}}</textarea>
                                <div class="text-danger">This field can be null</div>
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