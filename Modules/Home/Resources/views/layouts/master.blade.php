<!DOCTYPE html>
<html lang="en">

<head>
    {{-- head tags --}}
    @include('home::layouts.head-tag')
    @yield('head-tag')

    {{-- title --}}
    <title>@yield('title', 'باشگاه فوتبال پارس برازجان')</title>
</head>

<body onload=startTime()>

    {{-- get notification --}}
    {{--    @include('home::layouts.get-notifications')--}}

    {{-- loader --}}
    {{--    @include('home::layouts.loader')--}}

    {{-- header --}}
    @include('home::layouts.header')

    <!--Mobile Menu Start-->
    @include('home::layouts.mobile-menu')
    <!--Mobile Menu End-->
    <!--Main Content Start-->
    <div id="main-overlay" class="main-overlay"></div>
    <main>
        <div class="back-to-top">
            <button>
                <i class="fa-solid fa-chevron-up"></i>
            </button>
        </div>

        <div class="container">
            @yield('content')
        </div>

        {{-- footer --}}
        @include('home::layouts.footer')
    </main>
    <!--Main Content End-->

    {{-- script --}}
    @include('home::layouts.script')
    @yield('script')


    {{-- sweetalert2 from realrashid.github.io --}}
    @include('sweetalert::alert')
</body>
</html>