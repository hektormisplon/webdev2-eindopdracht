@extends('layout')
@section('title', 'About us')
@section('content')
<h3 class="text-bold">{{ $page->title }}</h3>
<div class="divider" data-content="{{ $page->subtitle }}"></div>
  <p>{{ $page->body }}</p>
@endsection