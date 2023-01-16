<div class="archive-second-col col-12 col-lg-3">
    <div class="news-list">
        <div class="social-section">
            <div class="social-section-header">
                <i class="fa-duotone fa-hashtag"></i>
                <span>راه های ارتباطی</span>
            </div>
            <div class="social-section-cols row gx-3">
                <div class="col-6">
                    <a href="https://instagram.com/fc_pars_borazjan">
                        <div class="social-btns social-instagram">
                            <i class="fa-brands fa-instagram"></i>
                            <span>اینستاگرام</span>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="https://t.me/fc_parseh_academy">
                        <div class="social-btns social-telegram">
                            <i class="fa-brands fa-telegram"></i>
                            <span>تلگرام</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="news-box col-12 mt-3">
            <div class="news-box-card-mini">
                <div class="news-box-header">
                    <i class="fa-duotone fa-newspaper"></i>
                    <span>آخرین اخبار</span>
                </div>
                <div class="new-box-news">
                    <ul>

                        <!-- latest posts -->
                        @forelse($latestPosts as $latest)
                            <li>
                                <a href="{{ route('post.show', $latest) }}">
                                    {{ $latest->title }}
                                </a>
                            </li>
                        @empty
                            <li>
                                @admin
                                <span>درحال حاظر خبری وجود ندارد.</span>
                                <a href="{{ route('admin.post') }}" class="btn-link">وارد کردن خبر </a>
                                @endadmin
                                @guest
                                    <span class="text-muted">درحال حاظر خبری وجود ندارد.</span>
                                @endguest
                            </li>
                        @endforelse

                    </ul>
                </div>
            </div>
        </div>
        <div class="new-box-news col-12 mt-3">
            <div class="news-box col-12">
                <div class="news-box-card-mini">
                    <div class="news-box-header">
                        <i class="fa-duotone fa-newspaper"></i>
                        <span>دسته بندی ها</span>
                    </div>
                    <div class="new-box-news">
                        <ul>

                            @forelse($categories as $category)
                                <li>
                                    <a href="{{ route('postcategory', $category) }}">
                                        <span>{{ $category->name }}</span>
                                    </a>
                                </li>
                            @empty
                                <li>
                                    @admin
                                    <span>درحال حاظر خبری وجود ندارد.</span>
                                    <a href="{{ route('admin.post') }}" class="btn-link">وارد کردن خبر </a>
                                    @endadmin
                                    @guest
                                        <span class="text-muted">درحال حاظر خبری وجود ندارد.</span>
                                    @endguest
                                </li>
                            @endforelse

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>