@extends('Layout.master')
@section('content')

<div style="display: flex; justify-content: center; align-items: center;">
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

@foreach($blogs as $blog)
    <div class="post-container">
        <div class="card" style="width: 1000px;">
            <img class="card-img-top" src="{{ asset('img/' . $blog->image ); }}" alt="Card image cap" style="object-fit: cover;">
            <div class="card-body">
                <h4><a style="font-size: 34px;" href="{{ route('single_recipe', $blog->id); }}">{{ $blog->title }}</a></h4>
                <p class="card-text"><small class="text-muted"><i class="bi bi-person"></i>{{ $blog->author }}</small></p>
                <p class="card-text"><small class="text-muted"><i class="bi bi-clock"></i>Last updated {{ $blog->updated_at->diffForHumans(); }}</small></p>
            </div>
        </div>
    </div>
@endforeach

@endsection