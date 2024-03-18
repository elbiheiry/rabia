<!-- Top Header
        ==========================================-->
<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="top-contact">
                    <i class="fa fa-envelope"></i>
                    {{$settings->email}}
                </div>
                @if(app()->getLocale() == 'ar')
                    <a href="{{route('lang')}}" class="lang langSwitch" data-token="{{csrf_token()}}" data-lang="en">
                        <img src="{{asset('assets/site/images/en.png')}}">
                        English
                    </a>
                    @else
                    <a href="{{route('lang')}}" class="lang langSwitch" data-token="{{csrf_token()}}" data-lang="ar">
                        <img src="{{asset('assets/site/images/ar.png')}}">
                        العربية
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Header
==========================================-->
<header class="header">
    <div class="container">
        <a href="{{route('site.index')}}" class="logo">
            <img src="{{asset('assets/site/images/logo.png')}}">
        </a>
        <button class="icon-btn btn-responsive-nav" data-toggle="collapse" data-target=".nav-main-collapse">
            <i class="fa fa-bars"></i>
        </button>
    </div><!--End Logo-->
    <div class="navbar-collapse nav-main-collapse collapse">
        <div class="container">
            <nav class="nav-main">
                <ul class="nav navbar-nav">
                    <li class="@if(request()->route()->getName() == 'site.index'){{'active'}}@endif">
                        <a href="{{route('site.index')}}">
                            <i class="fa fa-home"></i>
                            @lang('home.home')
                        </a>
                    </li>
                    <li class="@if(request()->route()->getName() == 'site.about'){{'active'}}@endif">
                        <a href="{{route('site.about')}}">
                            <i class="fa fa-info"></i>
                            @lang('home.about')
                        </a>
                    </li>
                    <li class="dropdown @if(request()->route()->getName() == 'site.services'){{'active'}}@endif">
                        <a href="#" class="extra" data-toggle="dropdown">
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-tag"></i>
                            @lang('home.services')
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($services as $service)
                                <li><a href="{{route('site.services',['slug' => $service->slug])}}">- {{$service->translated()->name}}</a></li>
                           @endforeach
                        </ul>
                    </li>
                    <li class="@if(request()->route()->getName() == 'site.projects'){{'active'}}@endif">
                        <a href="{{route('site.projects')}}">
                            <i class="fa fa-briefcase"></i>
                            @lang('home.works')
                        </a>
                    </li>
                    <li class="@if(request()->route()->getName() == 'site.blogs'){{'active'}}@endif">
                        <a href="{{route('site.blogs')}}">
                            <i class="fa fa-newspaper"></i>
                            @lang('home.blogs')
                        </a>
                    </li>
                    <li class="@if(request()->route()->getName() == 'site.certificates'){{'active'}}@endif">
                        <a href="{{route('site.certificates')}}">
                            <i class="fas fa-certificate"></i>
                            @lang('home.certificates')
                        </a>
                    </li>
                    <li class="@if(request()->route()->getName() == 'site.careers'){{'active'}}@endif">
                        <a href="{{route('site.careers')}}">
                            <i class="fa fa-bell"></i>
                            @lang('home.careers')
                        </a>
                    </li>
                    <li class="@if(request()->route()->getName() == 'site.contact'){{'active'}}@endif">
                        <a href="{{route('site.contact')}}">
                            <i class="fa fa-envelope"></i>
                            @lang('home.contact')
                        </a>
                    </li>
                    <li class="">
                    <a href="{{asset('assets/site/images/Final Rabia Profile S.pdf')}}" target="blank"  role="button" download="">
                        <i class="fas fa-file-download"></i>
                        {{app()->getLocale() == 'en' ? 'company profile' : 'بروفايل الشركة'}}
                        </a>
                    </li>
                    <li class="">
                        <a href="http://www.tinanursery.com/?lang=en" target="blank">
                        <i class="fas fa-seedling" target="blank"></i>
                            {{app()->getLocale() == 'ar' ? 'مشاتلنا' : 'Our nurseries'}}
                        </a>
                    </li>
                </ul><!--End .nav navbar-nav -->
            </nav>
        </div><!--End Container-->
    </div><!--End navbar-collapse-->
</header><!--End Header-->