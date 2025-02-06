@extends('Layout.master')
@section('content')

@foreach($blogs as $blog)
    <div class="post-container">
        <h1 style="margin-top: 20px;">{{ $blog->title }}</h1>
    </div>
    <div class="post-container">
        <div class="card" style="width: 1000px;">
            <img class="card-img-top" src="{{ asset('img/' . $blog->image ); }}" alt="Card image cap" style="object-fit: cover;">
            <div class="card-body">
                <p class="card-text"><small class="text-muted"><i class="bi bi-person"></i>{{ $blog->author }}</small></p>
                <p class="card-text"><small class="text-muted"><i class="bi bi-clock"></i>Last updated {{ $blog->updated_at->diffForHumans(); }}</small></p>
                <!-- <p class="card-text">{!! nl2br(e($blog->description)) !!}</p> -->
            </div>
            <div style="display: flex; justify-content: flex-start;">
            <button type="button" class="btn btn-success" style="width: 100px; margin-left:20px; margin-bottom: 5px;">Edit <i class="bi bi-pencil-fill"></i></button>
                <button type="button" class="btn btn-danger" style="width: 100px; margin-left:20px; margin-bottom: 5px;">Delete <i class="bi bi-trash-fill"></i></button>
            </div>
        </div>
    </div>
@endforeach

@endsection