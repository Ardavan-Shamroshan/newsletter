<!doctype html>
<html lang="fa" dir="rtl">
<head>

    @include('admin::emails.layouts.head-tag')
    @yield('head-tag')

</head>
<body>

    <!-- start header -->
    @include('admin::emails.layouts.header')
    <!-- end header -->


    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">
        @yield('content')
    </main>
    <!-- end main one col -->


    <!-- start footer -->
    @include('admin::emails.layouts.footer')
    <!-- end footer -->

</body>
</html>