<div class="side-menu">
    <div class="logo">
        <div class="main-logo"><img src="{{asset('assets/admin/images/logo.png')}}"></div>
    </div><!--End Logo-->
    <aside class="sidebar">
        <ul class="side-menu-links">
            <li class="@if(Request::route()->getName() == 'admin.dashboard'){{'active'}}@endif"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="@if(Request::route()->getName() == 'admin.settings'){{'active'}}@endif"><a href="{{route('admin.settings')}}">Site settings</a></li>
            <li class="sub-menu @if(Request::route()->getName() == 'admin.sliders' || Request::route()->getName() == 'admin.sections' || Request::route()->getName() == 'admin.partners'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="javascript:void(0);">
                    Home page
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul>
                    <li class="@if(Request::route()->getName() == 'admin.sections'){{'active'}}@endif">
                        <a rel="nofollow" rel="noreferrer" href="{{route('admin.sections')}}">sections</a>
                    </li>
                    <li class="@if(Request::route()->getName() == 'admin.sliders'){{'active'}}@endif">
                        <a rel="nofollow" rel="noreferrer" href="{{route('admin.sliders')}}">Slideshow</a>
                    </li>
                    <li class="@if(Request::route()->getName() == 'admin.partners'){{'active'}}@endif">
                        <a rel="nofollow" rel="noreferrer" href="{{route('admin.partners')}}">Partners</a>
                    </li>
                </ul>
            </li>
            <li class="@if(Request::route()->getName() == 'admin.about'){{'active'}}@endif"><a href="{{route('admin.about')}}">About us</a></li>
            <li class="@if(Request::route()->getName() == 'admin.articles'){{'active'}}@endif"><a href="{{route('admin.articles')}}">Articles</a></li>
            <li class="@if(Request::route()->getName() == 'admin.services'){{'active'}}@endif"><a href="{{route('admin.services')}}">Services</a></li>
            <li class="@if(Request::route()->getName() == 'admin.filters'){{'active'}}@endif"><a href="{{route('admin.filters')}}">Projects filter</a></li>
            <li class="@if(Request::route()->getName() == 'admin.projects'){{'active'}}@endif"><a href="{{route('admin.projects')}}">Projects</a></li>
            <li class="@if(Request::route()->getName() == 'admin.certificates'){{'active'}}@endif"><a href="{{route('admin.certificates')}}">Certificates</a></li>
            <li class="@if(Request::route()->getName() == 'admin.candidates'){{'active'}}@endif"><a href="{{route('admin.candidates')}}">Candidates</a></li>
            <li class="@if(Request::route()->getName() == 'admin.messages'){{'active'}}@endif"><a href="{{route('admin.messages')}}">Messages</a></li>
        </ul>
    </aside>
</div>