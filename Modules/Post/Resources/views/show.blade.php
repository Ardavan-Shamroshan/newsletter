@extends('home::layouts.master')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('modules/home/assets/css/single.css') }}">
@endsection
@section('title')
    مجله و خبرنامه
@endsection
@section('content')
    <div class="first-row row g-3 mt-3">
        <div class="single-main-col col-12 col-lg-9">
            <div class="single-section">
                <div class="single-tools-breadcrumb">
                    <div class="single-bread-crumb">
                        <a href="{{ route('home') }}"><span>خانه</span></a>
                        <a href="{{ route('post')  }}"><span>مجله و خبر نامه</span></a>
                        <a><span>{{ $post->title }}</span></a>

                    </div>
                    <div class="single-tools">
                       <i class="fa-solid fa-eye"></i>
                        <p>
                            <span>{{ $post->views }}</span>
                        </p>
                    </div>
                </div>
                <div class="single-title mt-4">
                    <h1>{{ $post->title }}. </h1>
                </div>
                <hr>

                <div class="comments-user-name mt-3">
                    <p>
                        <svg class="svg-inline--fa fa-user" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <g class="fa-duotone-group">
                                <path class="fa-secondary" fill="currentColor" d="M352 128c0 70.69-57.3 128-128 128C153.3 256 96 198.7 96 128s57.31-128 128-128C294.7 0 352 57.31 352 128z"></path>
                                <path class="fa-primary" fill="currentColor" d="M274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                            </g>
                        </svg><!-- <i class="fa-duotone fa-user"></i> -->
                        <span class="text-black-50 small">{{ $post->author->fullname ?? $post->author->name ?? '-' }}</span>
                    </p>
                </div>

                <div class="single-abstract mt-3">
                    <p><?= html_entity_decode($post->summary) ?>.</p>
                </div>
                <div class="single-image mt-3">
                    @if($post->image)
                    <img src="{{ asset($post->image['indexArray']['medium']) }}" alt="{{ $post->title }}">
                    @else
                        <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="{{ $post->title }}">
                    @endif
                </div>

                <hr>
                <div class="single-content mt-3">
                    <?= html_entity_decode($post->body) ?>
                </div>
                <hr>


            </div>
            <div class="share-post mt-3">
                <div class="share-post-title">
                    <span>اشتراک گذاری</span>
                </div>
                <div class="share-post-buttons-link">

                    <div class="share-post-buttons">
                        <button class="share-twitter">
                            <a href="https://twitter.com/intent/tweet?text=Awesome%20Blog!&url={{ route('post.show', $post) }}">
                                <svg class="svg-inline--fa fa-twitter" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path>
                                </svg><!-- <i class="fa-brands fa-twitter"></i> -->
                            </a>
                        </button>
                        <button class="share-telegram">
                            <a href="https://t.me/share/url?url={{ route('post.show', $post) }}&text=Awesome%20blog!">
                                <svg class="svg-inline--fa fa-telegram" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="telegram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M248 8C111 8 0 119 0 256S111 504 248 504 496 392.1 496 256 384.1 8 248 8zM362.1 176.7c-3.732 39.22-19.88 134.4-28.1 178.3-3.476 18.58-10.32 24.82-16.95 25.42-14.4 1.326-25.34-9.517-39.29-18.66-21.83-14.31-34.16-23.22-55.35-37.18-24.49-16.14-8.612-25 5.342-39.5 3.652-3.793 67.11-61.51 68.33-66.75 .153-.655 .3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283 .746-104.6 69.14-14.85 10.19-26.89 9.934c-8.855-.191-25.89-5.006-38.55-9.123-15.53-5.048-27.88-7.717-26.8-16.29q.84-6.7 18.45-13.7 108.4-47.25 144.6-62.3c68.87-28.65 83.18-33.62 92.51-33.79 2.052-.034 6.639 .474 9.61 2.885a10.45 10.45 0 0 1 3.53 6.716A43.76 43.76 0 0 1 362.1 176.7z"></path>
                                </svg><!-- <i class="fa-brands fa-telegram"></i> -->
                            </a>
                        </button>
                        <button class="share-whatsapp">
                            <a href="https://wa.me/?text=Awesome%20Blog!%5Cn%20{{ route('post.show', $post) }}">
                                <svg class="svg-inline--fa fa-whatsapp" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                                </svg><!-- <i class="fa-brands fa-whatsapp"></i> -->
                            </a>
                        </button>
                        <button class="share-facebook">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('post.show', $post) }}&quote=Awesome%20Blog!">
                                <svg class="svg-inline--fa fa-facebook" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z"></path>
                                </svg><!-- <i class="fa-brands fa-facebook"></i> -->
                            </a>
                        </button>
                    </div>
                </div>
            </div>

                @guest
                    <div class="single-user-comments-title mt-3">
                        <span>دیدگاه ها</span>
                    </div>
                    <div class="alert alert-warning  d-flex align-items-center gap-2 mt-3" role="alert">
                        <span><i class="fa-duotone fa-info-circle"></i></span>
                        <span>جهت ارسال نظر و دیدگاه خود باید ابتدا وارد سایت شوید. جهت ورود به سایت  <a href="{{ route('login') }}" class="alert-link btn-link"> اینجا </a> را کلیک کنید
                       </span>
                    </div>
                @endguest
                @auth
                    <div class="single-comment-section mt-3">
                        <div class="single-comment-section-header">
                            <span>دیدگاه خود را بنویسید</span>
                        </div>
                        <div class="single-comment-section-form">
                            <form action="#" method="post">
                                @csrf

                                <div class="col-12 px-3">
                                    <textarea name="body" id="single-comments" class="single-comments" cols="30" rows="10" placeholder="دیدگاه خود را در این قسمت بنویسید"></textarea>
                                </div>
                                <div class="col-12 px-3 d-flex justify-content-end">
                                    <button id="comment-submit" class="comment-submit" type="submit">
                                        <span>ارسال</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endauth

                <div class="single-user-comments mt-3">
                    <div class="single-user-comments-title">
                        <span>دیدگاه کاربران</span>
                    </div>


                        <div class="alert alert-warning  d-flex align-items-center gap-2 mt-3" role="alert">
                            <span><i class="fa-duotone fa-info-circle"></i></span>
                            <span>دیدگاهی وارد نشده است. دیدگاه خود را در قسمت بالا وارد کنید </span>
                        </div>


                </div>


        </div>

        @include('post::layouts.sidebar', ['latestPosts' => $latestPosts, 'categories' => $categories])

    </div>
@endsection