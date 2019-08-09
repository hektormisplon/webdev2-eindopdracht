@extends('layout')
@section('title', 'About us')
@section('content')
<h3>{{ $page->title }}</h3>
<div class="divider" data-content="{{ $page->subtitle }}"></div>
<div class="hero hero-lg bg-primary">
    <div class="hero-body">
        <p>{{ $page->body }}</p>
    </div>
</div>
@endsection