@extends('home::layouts.master')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('modules/home/assets/css/archive.css') }}">
@endsection
@section('title')
    مجله و خبرنامه
@endsection
@section('content')

    <div class="first-row row g-3 mt-3">
        <div class="archive-main-col col-12 col-lg-9">
            <div class="archive-breadcrumb">
                <div class="archive-bread-crumb">
                    <a href="{{ route('home') }}"> <span class="breadcrumb-selected">خانه</span></a>
                    @if(isset($postcategory))
                        <a href="{{ route('post') }}"> <span class="breadcrumb-selected">مجله و خبرنامه</span></a>
                        <a><span>{{ $postcategory->name }}</span></a>
                    @else
                        <a><span>مجله و خبرنامه</span></a>
                    @endif
                </div>
            </div>

            <div class="archive-section mt-3">
                <div class="archive-news">
                    @forelse($posts as $post)
                        <div class="archive-news-card">
                            <div class="archive-news-card-thumbnail">
                                <a href="{{ route('post.show', $post) }}">
                                    @if($post->image)
                                        <img src="{{ asset($post->image['indexArray']['medium']) }}" alt="{{ $post->title }}">
                                    @else
                                        <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="{{ $post->title }}">
                                    @endif</a>
                            </div>
                            <div class="col ps-3">
                                <div class="archive-news-top-title d-none d-md-block">
                                    <p>دسته {{ $post->category->name }} - بازدید {{ $post->views }}</p>
                                </div>
                                <div class="archive-news-card-title mt-1 mt-sm-0">
                                    <a href="{{ route('post.show', $post) }}">

                                        <p>{{ $post->title }}</p>
                                    </a>
                                </div>
                                <div class="archive-news-card-except">
                                    <p><?= html_entity_decode($post->summary) ?></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @empty
                        <div class="archive-news-card">
                            <div class="archive-news-card-thumbnail">
                                <a href="#">
                                    <img src="{{ asset('modules/home/img/404-football.gif') }}" alt="عنوان">
                                </a>
                            </div>
                            <div class="col ps-3">
                                <div class="archive-news-top-title d-none d-md-block">
                                    <p>دسته بندی - تعداد بازدید</p>
                                </div>
                                <div class="archive-news-card-title mt-1 mt-sm-0">
                                    <a href="#">
                                        <p>عنوان خبر</p>
                                    </a>
                                </div>
                                <div class="archive-news-card-except">
                                    <p>خلاصه خبر</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            {{ $posts->links('vendor.pagination.morn-news') }}

        </div>

        @include('post::layouts.sidebar', ['latestPosts' => $latestPosts, 'categories' => $categories])

    </div>
@endsection