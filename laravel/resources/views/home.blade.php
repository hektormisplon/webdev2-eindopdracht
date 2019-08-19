@extends('layout')
@section('content')
<h3 class="text-bold">
    Hello {{ auth()->user()->first_name }}
</h3>
<h5>
    @if(auth()->user()->isAdmin())
    <i class="icon icon-2x" data-feather="zap"></i>
    @endif
    {{ auth()->user()->email }}
</h5>
<div class="divider" data-content="What would you like to do?"></div>
<div class="d-flex">
    <a href="/projects">
        <div class="tile tile-centered">
            <div class="tile-icon">
                <i class="icon icon-2x" data-feather="briefcase"></i>
            </div>
            <div class="tile-content">
                <div class="tile-title">My projects</div>
            </div>
            <div class="tile-action">
            </div>
        </div>
    </a>
    
    <a href="/credits">
        <div class="tile tile-centered">
            <div class="tile-icon">
                <i class="icon icon-2x" data-feather="package"></i>
            </div>
            <div class="tile-content">
                <div class="tile-title">My creunits</div>
            </div>
            <div class="tile-action">
            </div>
        </div>
    </a>
    
    <a href="/discover">
        <div class="tile tile-centered">
            <div class="tile-icon">
                <i class="icon icon-2x" data-feather="wind"></i>
            </div>
            <div class="tile-content">
                <div class="tile-title">Discover</div>
            </div>
            <div class="tile-action">
            </div>
        </div>
    </a>

    <a href="/projects/create">
        <div class="tile tile-centered">
            <div class="tile-icon">
                <i class="icon icon-2x" data-feather="plus"></i>
            </div>
            <div class="tile-content">
                <div class="tile-title">New project</div>
            </div>
            <div class="tile-action">
            </div>
        </div>
    </a>
</div>
@endsection