<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    {{-- head tags --}}
    @include('admin::layouts.head-tag')
    @yield('head-tag')

    {{-- title --}}
    <title>@yield('title', 'قالب مدیریتی ولکس')</title>

</head>

<body class="main-body app sidebar-mini">
    <!-- switcher -->
{{--    @include('admin::layouts.switcher')--}}
    <!-- switcher -->

    <!-- Loader -->
    @include('admin::layouts.loader')
    <!-- /Loader -->

    <div class="page">

        <!-- main-sidebar -->
        @include('admin::layouts.sidebar')
        <!-- main-content -->
        <div class='main-content app-content'>

            <!-- main-header -->
            @include('admin::layouts.header')

            <!-- Container open -->
            <div class="container-fluid">

                @yield('content')
{{--                {{ $slot }}--}}

            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->

        <!-- sidebar-left -->
{{--        @include('admin::layouts.left-sidebar')--}}
        <!-- footer -->
        @include('admin::layouts.footer')
        <!-- modal -->
    </div>
    <!-- Page closed -->

    {{-- scripts --}}
    @include('admin::layouts.scripts')
    @yield('script')

    {{-- sweetalert2 from realrashid.github.io --}}
    @include('sweetalert::alert')
</body>

</html>

