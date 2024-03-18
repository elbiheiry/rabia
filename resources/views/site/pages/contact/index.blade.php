@extends('site.layouts.master')
@section('title')
    @lang('home.contact')
@endsection
@section('content')
    <!-- Section [ page-heading ]
            ==========================================-->
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h2 class="text-center">يسعدنا تواصلكم معنا</h2>

                    <!--<h2>@lang('home.contact')</h2>-->
                </div><!--End col-md-6-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.index')}}"><i class="fa fa-home"></i>@lang('home.home')</a></li>
                        <li class="active">@lang('home.contact')</li>
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
                    <form class="contact-form" action="{{route('site.contact')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="col-md-12 col-sm-12 head-title">
                            {{app()->getLocale() == 'en' ? 'Get Un Touch' : 'كنا على تواصل معنا'}}
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
                            <input type="text" class="form-control" placeholder="@lang('home.subject')" name="subject">
                        </div>
                        <div class="col-md-12 col-sm-12 form-group">
                            <textarea class="form-control" placeholder="@lang('home.message')" name="message"></textarea>
                        </div>
                        <div class="col-md-12 col-sm-12 form-group">
                            <button class="custom-btn" type="submit"><span>@lang('home.send')</span></button>
                        </div>
                    </form>
                </div><!--End Row-->
            </div><!--End container-->
        </section><!--End Section-->
        <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4310.1784239310555!2d46.65865055524477!3d24.712677561679257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee2f16a1c6709%3A0x6aa7ce59c063b9f5!2sTakhassusi+St%2C+Riyadh+Saudi+Arabia!5e0!3m2!1sen!2seg!4v1559002255204!5m2!1sen!2seg" width="100%" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
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