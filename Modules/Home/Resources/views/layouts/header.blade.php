<!--Header Start-->
<header>
    <!--Top Header Start-->
    <div class="top-header d-flex align-items-center">
        <div class="container d-flex justify-content-between">
            <div class="header-date">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span id="txt" class="small"></span>
            </div>
            <div class="top-header-social">
                <a href="#"><i class="fa-brands fa-telegram"></i><span>تلگرام</span></a>
                <a href="#"><i class="fa-brands fa-instagram"></i><span>اینستاگرام</span></a>
                <a href="#"><i class="fa-brands fa-twitter"></i><span>توییتر</span></a>
            </div>
        </div>
    </div>
    <!--Top Header End-->
    <!--Main Header Start-->
    <div class="main-header">
        <div class="container d-flex justify-content-between">
            <div class="main-header-right d-flex">
                <div class="mobile-menu-toggle">
                    <button onclick="openMobileMenu()">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
                <!--Logo Start-->
                <div>
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('modules/home/img/logo-black.png') }}" alt="Logo" class="img-fluid">
                    </a>
                </div>
                <!--Logo End-->
            </div>
            <!--Nav Start-->
            <div class="top-navbar d-flex align-items-center navbar-expand-xl">
                <ul class="navbar-list p-0 m-0 navbar-collapse collapse">
                    <li>
                        <a href="{{ route('home') }}">
                            <span>خانه</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('post') }}">
                            <span>مجله و خبرنامه</span>
                        </a>
                    </li>

                    <li class="top-dropdown">
                        <a href="#" class="top-dropdown-link">
                            <span>روابط عمومی</span>
                        </a>
                        <ul class="top-dropdown-menu">
                            <li>
                                <a href="#">
                                    <span>تبلیغات</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>شرایط استفاده</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--Nav End-->
            <!--Search and icons Start-->
            <div class="main-header-left d-flex align-items-center">
                <div class="search-and-icons d-flex align-items-center">
                    <div class="top-search d-none d-lg-block">
                        <label for="top-search" class="d-flex align-items-center">
                            <i class="fa-solid fa-search"></i>
                        </label>
                        <input type="text" class="form-control" id="top-search" placeholder="جستجو ...">
                    </div>
                    <div class="top-search-mobile d-block d-lg-none">
                        <button onclick="openMobileSearch()">
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </div>
                    <div class="top-notifications">
                        @admin<a href="{{ route('admin') }}">مدیریت</a>@endadmin
                        <div class="notifications-div">

                        </div>
                    </div>

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-dark mx-1">
                            <span>ورود </span>
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-outline-dark mx-1">
                            <span>ثبت نام </span>
                        </a>
                    @endguest

                    @auth
                        <div class="top-header-menu">
                            <button id="header-menu-btn" onclick="openHeaderMenuPanel()">
                                <i class="fa-solid fa-grid"></i>
                            </button>
                            <div class="top-header-menu-div">
                                <!-- <div id="overlay" class="overlay"></div> -->
                                <ul class="top-header-menu-list">
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <i class="fa-solid fa-house grid-ic"></i>
                                            <span>خانه</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('profile.show') }}">
                                            <i class="fa-solid fa-user grid-ic"></i>
                                            <span>حساب کاربری</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    @endauth

                </div>
            </div>
            <!--Search and icons End-->
        </div>
    </div>
    <!--Top Header End-->
    <!--Mobile Search Field Start-->
    <div class="mobile-search-field d-flex align-items-center d-lg-none">
        <input type="text" class="form-control" id="mobile-top-search" placeholder="جستجو ...">
    </div>
    <!--Mobile Search Field End-->
</header><!--Header End-->