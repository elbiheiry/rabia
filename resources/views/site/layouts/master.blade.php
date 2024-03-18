<!DOCTYPE html>
<html>

    <head>
        <!-- Meta Tags
        ======================-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="">
        <meta name="copyright" content="">

        <!-- Title Name
        ================================-->
        <title>{{$settings->name}} | @yield('title')</title>

        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('assets/site/images/fav-icon.png')}}">

        <!-- Google Web Fonts
        ===========================-->
        <link href="https://fonts.googleapis.com/css?family=Tajawal:400,700,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700,900" rel="stylesheet">

        <!-- Css Base And Vendor
        ===================================-->
        @if(app()->getLocale() == 'ar')
            <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/bootstrap-ar.css')}}">
        @else
            <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/bootstrap-en.css')}}">
        @endif
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
              integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/owl.carousel/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/popup/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/swiper/swiper.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/datepicker/jquery.datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/select/select2.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/site/vendor/animation/animate.css')}}">

        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
        @if(app()->getLocale() == 'en')
            <link rel="stylesheet" href="{{asset('assets/site/css/ltr.css')}}">
            @endif
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>

    <body>
        <div class="modal fade" id="form-messages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header custom-modal">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('home.notes')</h5>
                    </div>
                    <div class="modal-body">
                        <div class="response-messages">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('site.layouts.header')

        <div class="main">

            @yield('content')

            @include('site.layouts.footer')
        </div>

        <div class="loading">
            <div class="loading-content">
                <img src="{{asset('assets/site/images/logo.png')}}">
                <i class="fa fa-leaf fa-spin"></i>
            </div>
        </div>
        <!-- JS Base And Vendor
        ==========================================-->
        <script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/bootstrap.js')}}"></script>
        <script src="{{asset('assets/site/vendor/owl.carousel/owl.carousel.js')}}"></script>
        <script src="{{asset('assets/site/vendor/animation/wow.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/popup/magnific-popup.js')}}"></script>
        <script src="{{asset('assets/site/vendor/swiper/swiper.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/datepicker/jquery.datetimepicker.full.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/select/select2.min.js')}}"></script>
        <script src="{{asset('assets/site/js/popup_image.js')}}"></script>
        <script src="{{asset('assets/site/js/jquery.form.js')}}"></script>
        <script src="{{asset('assets/site/js/main.js')}}"></script>
        <script>
            wow = new WOW(
                {
                    animateClass: 'animated',
                    offset: 80,
                    callback: function (box) {
                        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                    }
                }
            );
            wow.init();

            /*determine language
============================*/
            $(document).ready(function () {
                'use strict';
                $('body').on('click', '.langSwitch', function () {
                    // alert($(this).data('lang'))
                    $.ajax({
                        url: $(this).attr('href'),
                        method: 'POST',
                        data: {
                            locale: $(this).data('lang')
                        },
                        dataType: 'json',
                        cache: false,
                        success: function (data) {
                            // alert(data.lang);
                            if (data.response === 'success') {
                                location.reload();
                            }
                        }

                    });
                    return false;
                });
                $.ajaxSetup(
                    {
                        headers:
                            {
                                'X-CSRF-Token': $('.langSwitch').data('token')
                            }
                    });
            });


        </script>
        @yield('js')
    </body>
</html>
