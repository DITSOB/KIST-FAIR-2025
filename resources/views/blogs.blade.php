@extends('Layout.master')
@section('content')

@foreach($blogs as $blog)
    <div class="card mb-3">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $blog->title }}</h5>
            <p class="card-text">{{ $blog->description }}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
@endforeach

@endsection