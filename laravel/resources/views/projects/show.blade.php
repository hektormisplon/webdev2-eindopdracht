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