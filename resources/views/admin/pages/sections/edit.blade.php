@extends('admin.layouts.master')
@section('title')
    section us
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>section us</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"> Dashboard</a></li>
                    <li class="active">section us</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.sections.edit',['id' => $section->id])}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#menu1">English</a></li>
                    <li><a data-toggle="tab" href="#menu2">Arabic</a></li>
                </ul>

                <div class="tab-content">
                    <div id="menu1" class="tab-pane fade in active">
                        <div class="tab-data">
                            <div class="form-group col-md-6">
                                <label>section title in english</label>
                                <input class="form-control" type="text" name="title_en" value="{{$section->english()->title}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>section description in english</label>
                                <textarea class="form-control" name="description_en">{{$section->english()->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="tab-data">
                            
                            <div class="form-group col-md-6">
                                <label>section title in arabic</label>
                                <input class="form-control" type="text" name="title_ar" value="{{$section->arabic()->title}}">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>section description in arabic</label>
                                <textarea class="form-control" name="description_ar">{{$section->arabic()->description}}</textarea>
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