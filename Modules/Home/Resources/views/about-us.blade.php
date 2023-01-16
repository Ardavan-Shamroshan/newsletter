@extends('home::layouts.master')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('modules/home/assets/css/about-us.css') }}">
@endsection
@section('title')
    درباره ما
@endsection
@section('content')
    <div class="first-row row g-3 mt-3">
        <div class="about-us-main-col col-12">
            <div class="about-us-section">
                <div class="about-us-section-header">
                    <p>درباره ما</p>
                </div>
                <div class="about-us-section-contents">
                    <div class="about-us-section-text mt-3">
                        <p><?= html_entity_decode($setting->description) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
