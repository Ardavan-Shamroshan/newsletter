<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ route('admin') }}"><img src="{{ asset('modules/admin/assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ route('admin') }}"><img src="{{ asset('modules/admin/assets/img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ route('admin') }}"><img src="{{ asset('modules/admin/assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ route('admin') }}"><img src="{{ asset('modules/admin/assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">

        <div class="app-sidebar__user clearfix">
            @auth
                <div class="dropdown user-pro-body">
                    <div>
                        @if(auth()->user()->profile_photo_path)
                            <img alt="{{ auth()->user()->fullname ?? auth()->user()->name }}" src="{{ (auth()->user()->profile_photo_url) }}" class="avatar avatar-xl brround">
                            <span class="avatar-status profile-status bg-green"></span>
                        @else
                            <img alt="{{ auth()->user()->fullname ?? auth()->user()->name }}" src="{{ (auth()->user()->profile_photo_url) }}" class="avatar avatar-xl brround">
                            <span class="avatar-status profile-status bg-green"></span>
                        @endif
                    </div>

                    <div class="user-info">
                        <h4 class="fw-semibold mt-3 mb-0">{{ auth()->user()->fullname ?? auth()->user()->name }}</h4>
                        <span class="mb-0 text-muted">مدیریت</span>
                    </div>
                </div>
            @endauth

        </div>

        <ul class="side-menu">
            <li class="side-item side-item-category">مجله و خبرنامه</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.postcategory') }}">
                    <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-list"></i></span> دسته بندی اخبار </span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.post') }}">
                    <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-newspaper-o"></i></span> اخبار </span>
                </a>
            </li>

            <li class="side-item side-item-category">تنظیمات</li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                    <span class="side-menu__label"><span class="side-menu__icon"><i class="la la-cogs"></i></span> پیشرفته</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('admin.setting') }}">تنظیمات</a></li>

                </ul>
            </li>
        </ul>
    </div>
</aside><!-- main-sidebar -->
