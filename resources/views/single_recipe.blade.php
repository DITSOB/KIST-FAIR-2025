@extends('Layout.master')
@section('content')


    <div class="post-container">
        <h1 style="margin-top: 20px;">{{ $blogs->title }}</h1>
    </div>
    <div class="post-container">
        <div class="card" style="width: 1000px;">
            <img class="card-img-top" src="{{ asset('img/' . $blogs->image ); }}" alt="Card image cap" style="object-fit: cover;">
            <div class="card-body">
                <p class="card-text"><small class="text-muted"><i class="bi bi-person"></i>{{ $blogs->author }}</small></p>
                <p class="card-text"><small class="text-muted"><i class="bi bi-clock"></i>Last updated {{ $blogs->updated_at->diffForHumans(); }}</small></p>
                <p class="card-text">{!! nl2br(e($blogs->description)) !!}</p>
            </div>
            <div style="display: flex; justify-content: flex-start;">
            </div>
        </div>
    </div>

@endsection