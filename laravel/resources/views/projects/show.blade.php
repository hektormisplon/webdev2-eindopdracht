@extends('layout')
@section('content')
@if(session('message'))
<div class="toast toast-success mb-2">
    {{ session('message') }}
</div>
@endif
<div class="card">
    <div class="card-image">
        <div class="carousel">
            <input class="carousel-locator" id="slide-1" type="radio" name="carousel-radio" checked="" hidden="">
            <input class="carousel-locator" id="slide-2" type="radio" name="carousel-radio" hidden="">
            <input class="carousel-locator" id="slide-3" type="radio" name="carousel-radio" hidden="">
            <div class="carousel-container">
                <figure class="carousel-item">
                    <label class="item-prev btn btn-action btn-lg" for="slide-4"><i class="icon icon-arrow-left"></i></label>
                    <label class="item-next btn btn-action btn-lg" for="slide-2"><i class="icon icon-arrow-right"></i></label><img class="img-responsive rounded" src="https://images.pexels.com/photos/373543/pexels-photo-373543.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="macOS Yosemite Wallpaper">
                </figure>
                <figure class="carousel-item">
                    <label class="item-prev btn btn-action btn-lg" for="slide-1"><i class="icon icon-arrow-left"></i></label>
                    <label class="item-next btn btn-action btn-lg" for="slide-3"><i class="icon icon-arrow-right"></i></label><img class="img-responsive rounded" src="https://images.pexels.com/photos/775907/pexels-photo-775907.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="macOS Yosemite Wallpaper">
                </figure>
                <figure class="carousel-item">
                    <label class="item-prev btn btn-action btn-lg" for="slide-2"><i class="icon icon-arrow-left"></i></label>
                    <label class="item-next btn btn-action btn-lg" for="slide-4"><i class="icon icon-arrow-right"></i></label><img class="img-responsive rounded" src="https://images.pexels.com/photos/1005644/pexels-photo-1005644.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="macOS El Capitan Wallpaper">
                </figure>
            </div>
            <div class="carousel-nav">
                <label class="nav-item text-hide c-hand" for="slide-1">1</label>
                <label class="nav-item text-hide c-hand" for="slide-2">2</label>
                <label class="nav-item text-hide c-hand" for="slide-3">3</label>
            </div>
        </div>
        <!-- <img src="https://images.pexels.com/photos/158826/structure-light-led-movement-158826.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class="img-responsive"> -->
    </div>
    <div class="card-header">
        <h3 class="card-title">{{$project->title}}</h3>
        <p class="card-subtitle text-gray">{{$project->description}}</p>
        <p class="float-left">{{$project->created_at->format('d M y')}}</p>
        <p class="float-right">{{ $project->deadline->format('d M y') }}</p>
        @if($project->pledge)
        <meter class="meter" low="{{ $project->pledge->goal / 4 }}" high="{{ $project->pledge->goal / 2 }}" optimum="{{ $project->pledge->goal }}" value="{{ $project->pledge->pledged }}" min="0" max="{{ $project->pledge->goal }}"></meter>
        <small>{{ $project->pledge->pledged/$project->pledge->goal *100 }}% funded</small>
        @endif
    </div>
    <div class="card-body">
        {{ $project->info }}
    </div>
    <div class="card-footer">
        @if ($project->pledge)
        <form method="post" action="/pledges/{{ $project->pledge->id }}">
            @method('PATCH')
            @csrf
            <div class="input-group">
                <input class="form-input" type="number" name="pledged">
                <button class="btn btn-primary" type="submit">Fund</button>
            </div>
        </form>
        @endif
        <div class="btn-group btn-group-block">
            <a class="btn btn" href="{{ route('projects.edit',$project->id)}}">Edit</a>
            <form action="{{ route('projects.destroy', $project->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection