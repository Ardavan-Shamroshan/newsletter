<!--Footer Start-->
<footer>
    <div class="container">
        <div class="footer-social">
            <ul class="d-flex flex-wrap">
                <li>
                    <a href="https://instagram.com/fc_pars_borazjan"><i class="fa-brands fa-instagram"></i></a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="mailto:{{ $setting->email }}">
                        <i class="fa-brands fa-google"></i>
                    </a>
                </li>
                <li>
                    <a href="https://t.me/fc_parseh_academy"><i class="fa-brands fa-telegram"></i></a>
                </li>
            </ul>
        </div>
        <div class="footer-nav-menu mt-4">
            <ul class="d-flex flex-wrap">
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

            </ul>
        </div>
        <hr>
        @include('home::layouts.copyright', ['copyright' => $setting->copyright])
    </div>
</footer>
<!--Footer End-->