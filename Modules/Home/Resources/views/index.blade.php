@extends('home::layouts.master')
@section('title')
    {{ $setting->title }}
@endsection
@section('content')
    <div class="first-row row g-3 mt-3">
        <div class="main-col col-12 col-lg-6">
            @if($banner)
                <div class="main-col-card">
                    <div class="main-col-image">
                        <a href="{{ route('post.show', $banner) }}">
                            @if($banner->image)
                                <img src="{{ $banner->image['indexArray']['medium'] }}" alt="img">
                            @else
                                <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="{{ $banner->title }}">
                            @endif
                        </a>
                    </div>
                    <div class="main-col-title">
                        <a href="{{ route('post.show', $banner) }}">
                            <p><?= $banner->summary ?></p>
                        </a>
                    </div>
                </div>
            @endif

            <div class="col-12 mt-3">
                <div class="main-news">

                    @forelse($posts as $post)
                        <div class="main-news-card">
                            <div class="main-news-card-thumbnail">
                                <a href="{{ route('post.show', $post) }}">
                                    @if($post->image)
                                        <img src="{{ asset($post->image['indexArray']['medium']) }}" alt="{{ $post->title }}">
                                    @else
                                        <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="{{ $post->title }}">
                                    @endif
                                </a>
                            </div>
                            <div class="col ps-3">
                                <div class="main-news-top-title d-none d-sm-block">
                                    <p>
                                        <a href="{{ route('postcategory', $post->category) }}">{{ $post->category->name ?? 'دسته بندی' }}</a>
                                        <span>-</span>
                                        <span>بازدید {{ $post->views }} </span>
                                    </p>
                                </div>
                                <div class="main-news-card-title">
                                    <a href="{{ route('post.show', $post) }}">
                                        <p>{{ $post->title }}</p>
                                    </a>
                                </div>
                                <div class="main-news-card-except">
                                    <p><?= $post->summary ?></p>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4">
                    @empty
                        <div class="main-news-card">
                            <div class="main-news-card-thumbnail">
                                <a href="#">
                                    <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="عنوان خبر">
                                </a>
                            </div>
                            <div class="col ps-3">
                                <div class="main-news-top-title d-none d-sm-block">
                                    <p><a href="#">دسته بندی خبر</a> - <span>تعداد بازدید</span></p>
                                </div>
                                <div class="main-news-card-title">
                                    <a href="#">
                                        <p>عنوان خبر</p>
                                    </a>
                                </div>
                                <div class="main-news-card-except">
                                    <p>خلاصه خبر</p>
                                </div>
                            </div>
                        </div>
                    @endforelse

                    <div class="open-all-archive">
                        <a href="{{ route('post') }}">
                            <span>مشاهده آرشیو اخبار</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="second-col col-12 col-lg-3">
            <div class="news-list">
                <div class="news-box col-12">
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
                <div class="news-box col-12 mt-3">
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
        <div class="third-col col-12 col-lg-3">
            <div class="other-sections">
                <div class="social-section">
                    <div class="social-section-header">
                        <i class="fa-duotone fa-hashtag"></i>
                        <span>راه های ارتباطی</span>
                    </div>
                    <div class="social-section-cols row gx-3">
                        <div class="col-6">
                            <a href="#">
                                <div class="social-btns social-instagram">
                                    <i class="fa-brands fa-instagram"></i>
                                    <span>اینستاگرام</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#">
                                <div class="social-btns social-telegram">
                                    <i class="fa-brands fa-telegram"></i>
                                    <span>تلگرام</span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="ad-section mt-3">
                    <div class="ad-title">
                        <i class="fa-duotone fa-bullhorn"></i>
                        <span>تبلیغات</span>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 1.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 2.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 3.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 1.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 2.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 3.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="ad-image">
                        <a href="#">
                            <img src="{{ asset('modules/home/assets/img/ad/ad 1.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
