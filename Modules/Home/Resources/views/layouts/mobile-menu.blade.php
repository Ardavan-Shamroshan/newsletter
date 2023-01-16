<div class="mobile-menu-overlay"></div>
<div class="mobile-menu">
    <button class="mobile-menu-close">
        <i class="fa-solid fa-x"></i>
    </button>
    <ul class="mobile-menu-list">
        <li>
            <a href="{{ route('post') }}">
                <span>مجله و خبرنامه</span>
            </a>
        </li>

        <li>
            <a href="{{ route('home.about-us') }}">
                <span>درباره ما</span>
            </a>
        </li>


        <li class="mobile-dropdown">
            <a class="mobile-dropdown-link">
                <span>روابط عمومی</span>
            </a>
            <ul class="mobile-dropdown-menu">
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
        <li class="mobile-dropdown">
            <a class="mobile-dropdown-link">
                <span>دراپ داون</span>
            </a>
            <ul class="mobile-dropdown-menu">
                <li>
                    <a href="#">
                        <span>لورم</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>لورم</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>