@extends('layout')
@section('content')
@if(session('message'))
<div class="toast toast-success mb-2">
    {{ session('message') }}
</div>
@endif

@if(session('warning'))
<div class="toast toast-warning mb-2">
    {{ session('warning') }}
    <p>Would you like to <a href="/discover">discover</a> other people's projects?</p>
</div>
@endif

@if(session('error'))
<div class="toast toast-error mb-2">
    {{ session('error') }}
    <p>Would you like to <a href="/stripe">buy creunits?</a></p>
</div>
@endif

<a class="btn" href="/discover">
    <i class="icon icon-1x" data-feather="arrow-left"></i>
    Back
</a>
<div class="card">
    <div class="card-image">
        <div class="carousel">
            @foreach($images as $index => $image)
            <input class="carousel-locator" id="slide-{{$index + 1}}" type="radio" name="carousel-radio" hidden="" checked="">
            @endforeach
            <div class="carousel-container">
                @foreach($images as $index => $image)
                <figure class="carousel-item">
                <label class="item-prev btn btn-action btn-lg" for="slide-{{$index + 2}}"><i class="icon icon-arrow-left"></i></label>
                <label class="item-next btn btn-action btn-lg" for="slide-{{$index + 0}}"><i class="icon icon-arrow-right"></i></label>
                <img class="img-responsive rounded" src="{{ $image->filepath }}">
                </figure>
                @endforeach
            </div>
            <div class="carousel-nav">
            @foreach($images as $index => $image)
            <label class="nav-item text-hide c-hand" for="slide-{{$index + 1}}">{{ $index + 1}}</label>
            @endforeach
            </div>
        </div>
    </div>
    <div class="card-header">
        <a class="btn float-right" href="/{{ Request::path() }}/pdf"><i class="icon icon-x2" data-feather="download"></i> pdf</a>
        @if($project->pledged > 0)
        <a class="btn float-right" href="/{{ Request::path() }}/pledge-history">Pledge history</a>
        @endif
        <h3 class="card-title">{{$project->title}}</h3>
        <p class="card-subtitle text-gray">{{$project->description}}</p>
        <p class="float-left">{{$project->created_at->format('d M y')}}</p>
        <p class="float-right">{{ $project->deadline->format('d M y') }}</p>
        <meter class="meter" low="{{ $project->goal / 4 }}" high="{{ $project->goal / 2 }}" optimum="{{ $project->goal }}" value="{{ $project->pledged }}" min="0" max="{{ $project->goal }}"></meter>
        <small>{{ (int)($project->pledged/$project->goal *100) }}% funded</small>
    </div>
    <div class="card-body">
    </div>
    <div class="card-footer">
        <form method="post" action="/projects/{{ $project->id }}/pledge">
            @method('PATCH')
            @csrf
            <div class="input-group">
                <span class="input-group-addon addon-lg">
                    <i class="icon icon-2x text-secondary" data-feather="package"></i>
                </span>
                <input type="number" placeholder="0" class="form-input input-lg @error('pledged') is-error @enderror" name="pledged" value="{{ old('pledged') }}" />
                <button class="btn btn-primary input-group-btn btn-lg" type="submit">Fund</button>
            </div>
        </form>
    </div>
</div>
<div class="mt-2 panel">
    <div class="panel-header">
        <div class="panel-title">Comments</div>
    </div>
    <div class="panel-body">
        @foreach($project->comments as $comment)
        <div class="tile">
            <div class="tile-icon tooltip tooltip-right" data-tooltip="{{ $comment->created_at->format("M j Y | g:i") }}">
                <div class="example-tile-icon">
                    <figure class="avatar avatar-md"> <img src="/storage/avatars/{{ $comment->sender->avatar }}" /></figure>
                </div>
            </div>
            <div class="tile-content">
                <p class="tile-title text-bold">{{ $comment->sender->email }}</p>
                <p class="tile-subtitle">{{ $comment->message}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="panel-footer">
        @auth
        <div class="input-group">
            <input class="form-input" type="text" placeholder="Leave a comment...">
            <a class="btn btn-primary input-group-btn">Send</a>
        </div>
        @endauth
    </div>
@endsection