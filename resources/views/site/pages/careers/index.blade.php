@extends('site.layouts.master')
@section('title')
    @lang('home.careers')
@endsection
@section('content')
    <!-- Section [ page-heading ]
            ==========================================-->
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>يسعدنا انضمامك لفريق رابية الحديقة</h2>
                </div><!--End col-md-6-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i>@lang('home.home')</a></li>
                        <li class="active">@lang('home.careers')</li>
                    </ul>
                </div><!--End col-md-12-->
            </div>
        </div>
    </div><!--End page-heading -->
    <!-- Section [ Page content ]
    ==========================================-->
    <div class="page-content">
        <!-- Section [ Contact ]
        ==========================================-->
        <section class="section-setting">
            <div class="container">
                <div class="row">
                    <form class="contact-form" action="{{route('site.careers')}}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="col-md-12 col-sm-12 head-title">
                            @lang('home.join')
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" placeholder="@lang('home.name')" name="name">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="email" class="form-control" placeholder="@lang('home.email')" name="email">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" placeholder="@lang('home.phone')" name="phone">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" placeholder="@lang('home.mobile')" name="mobile">
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="form-control" name="gender">
                                <option value="0"> -- @lang('home.gender') --</option>
                                <option value="@lang('home.male')">@lang('home.male')</option>
                                <option value="@lang('home.female')">@lang('home.female')</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <div class="input-group date form_date" data-date="" data-date-format="dd yyyy MM" data-link-field="dtp_input" data-link-format="dd-yyyy-mm">
                                <input class="form-control" size="16" type="text" readonly placeholder="@lang('home.birthdate')" name="birthdate">
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <select class="form-control" name="country">
                                <option value="0">-- @lang('home.country') ---</option>
                                <option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua">Antigua</option><option value="  Barbuda">  Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <input type="text" class="form-control" placeholder="@lang('home.city')" name="city">
                        </div>
                        <div class="col-md-12 col-sm-12 form-group">
                            <label>@lang('home.fields')</label>
                            <select multiple class="form-control tags" name="fields[]">
                                @if(app()->getLocale() == 'en')
                                    <option value="Human Resources ">Design department </option>
                                    <option value="Procurement and Contracts">projects and studies department </option>
                                    <option value="Finance">Hardscape department</option>
                                    <option value="Marketing">Financial department </option>
                                    <option value="IT">Managerial department</option>
                                    <option value="Design & Technical Office">IT </option>
                                    
                                @else
                                    <option value="الموارد البشرية">  قسم التصامٌيم </option>
                                    <option value="المشتريات والعقود"> قسم المشارٌيع والدراسات </option>
                                    <option value="الحسابات"> قسم الهاردسكٌيب </option>
                                    <option value="التسويق"> قسم المالٌية </option>
                                    <option value="تكنولوجيا المعلومات "> قسم الشئون الادارٌية  </option>
                                    <option value="التصميم و المكتب الفني"> قسم تقنٌية المعلومات </option>
                                    
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                            <div class="input-container">
                                <input type="file" name="cv" id="cv-input">
                                <span class="cv-file-info"> @lang('home.cv') </span>
                                <button type="button" class="custom-btn cv-browse-btn">
                                    <span>
                                        <i class="fa fa-upload"></i>
                                        @lang('home.file')
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 form-group">
                            <button type="submit" class="custom-btn"><span>@lang('home.send')</span></button>
                        </div>
                    </form>
                </div><!--End Row-->
            </div><!--End container-->
        </section><!--End Section-->
    </div><!--End Page Content-->
@endsection
@section('js')
    <script>
        $('.contact-form').ajaxForm({

            beforeSend: function() {
            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function(response) {
                if (response.status === 'success'){
                    $(".contact-form")[0].reset();
                }
                $('#form-messages').modal('show');

                var messages = response.data;
                $('.response-messages').html('');
                $.each(messages, function( index, message ) {
                    $('.response-messages').append('<p>'+message+'</p>');
                });
            },
            complete: function(xhr) {
                // status.html(xhr.responseText);
            }
        });
    </script>
@endsection