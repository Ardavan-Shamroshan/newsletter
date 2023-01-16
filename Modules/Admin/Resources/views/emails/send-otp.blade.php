@extends('admin::emails.layouts.master')

@section('content')

    <h3>{{ $details['title'] }}</h3>

    <h5>{{ $details['subject'] }}</h5>
    <p>{{ $details['message'] }}</p>


    <p class="border p-2 my-2">{{ $details['response'] }}</p>

@endsection