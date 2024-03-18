<!--<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4310.1784239310555!2d46.65865055524477!3d24.712677561679257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee2f16a1c6709%3A0x6aa7ce59c063b9f5!2sTakhassusi+St%2C+Riyadh+Saudi+Arabia!5e0!3m2!1sen!2seg!4v1559002255204!5m2!1sen!2seg" width="100%" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>-->
<footer class="footer">
    <button class="icon-btn up-btn">
        <i class="fas fa-long-arrow-alt-up"></i>
    </button>
    <div class="container">
        <div class="col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-title">
                    Follow us
                </div><!--End Widget-title-->
                <div class="widget-content">
                    <!--<p>
                        {{app()->getLocale() == 'en' ? $settings->brief : $settings->brief_ar}}
                    </p>-->
                    <ul class="social">
                        <li><a href="{{$settings->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="{{$settings->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{$settings->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/rabiahgarden/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div><!--End Widget-content-->
            </div><!---End Widget-->
        </div><!--End Col-md-4--->
        <!--<div class="col-md-4 col-sm-12">
            <div class="widget">
                <div class="widget-title">
                    @lang('home.quick')
                </div><!--End Widget-title-->
               <!-- <div class="widget-content">
                    <ul>
                        <li class="col-md-6 col-sm-4">
                            <a href="{{route('site.index')}}">
                                @lang('home.home')
                            </a>
                        </li>
                        <li class="col-md-6 col-sm-4">
                            <a href="{{route('site.about')}}">
                                @lang('home.about')
                            </a>
                        </li>
                        <li class="col-md-6 col-sm-4">
                            <a href="{{route('site.projects')}}">
                                @lang('home.works')
                            </a>
                        </li>
                        <li class="col-md-6 col-sm-4">
                            <a href="{{route('site.blogs')}}">
                                @lang('home.blogs')
                            </a>
                        </li>
                        <li class="col-md-6 col-sm-4">
                            <a href="{{route('site.certificates')}}">
                                @lang('home.certificates')
                            </a>
                        </li>
                        <li class="col-md-6 col-sm-4">
                            <a href="{{route('site.careers')}}">
                                @lang('home.careers')
                            </a>
                        </li>
                        <li class="col-md-6 col-sm-4">
                            <a href="{{route('site.contact')}}">
                                @lang('home.contact')
                            </a>
                        </li>
                    </ul><!--End .nav navbar-nav -->
                <!--</div><!--End Widget-content-->
            <!--</div><!---End Widget-->
       <!-- </div><!--End Col-md-4--->
        <div class="col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-title">
                    @lang('home.communication')
                </div><!--End Widget-title-->
                <div class="widget-content">
                    <ul class="contact-info">
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <span>{{app()->getLocale() == 'en' ? $settings->address_en : $settings->address_ar}}</span>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            {{$settings->phone}}
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            {{$settings->email}}
                        </li>
                    </ul>
                </div>
            </div><!---End Widget-->
        </div><!--End Col-md-4--->
        <div class="col-md-12 col-sm-12 copyrights">
            @if(app()->getLocale() == 'ar')
                © جميع الحقوق محفوظة لشركة رابيه الحديقة 2019
            @else
                Copyright © 2019 Rabiah Garden. All Rights Reserved.
            @endif
        </div>
    </div>
</footer>