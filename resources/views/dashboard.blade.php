@extends('Layout.master')
@section('content')

<div style="display: flex; justify-content: center; align-items: center;">
    @if(session('success'))
        <div style="color: lime;">
            {{ session('success'); }}
        </div>
    @else
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="post-container">
    <div class="post-wrapper">
        <section class="post">
            <header>Create Post</header>
            <form action="{{ route('blogs'); }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="content">
                    <div class="details">
                        <p><i class="bi bi-person-circle"></i>{{ Session::get('username') }}</p>
                    </div>
                </div>
                <textarea style="height: 30px; min-height: 30px;" name="title" placeholder="Title Here" required></textarea>
                <textarea name="description" placeholder="Description" required></textarea>
                <div class="emoji">
                    <i class="bi bi-emoji-smile"></i>
                </div>
                <label for="role">Select Category: </label>
                <select name="category" id="category" style="border: none;">
                    <option value="breakfast">Breakfast</option>
                    <option value="breakfast">Lunch</option>
                    <option value="breakfast">Dinner</option>
                    <option value="breakfast">Dessert</option>
                    <option value="breakfast">Vegan</option>
                    <option value="breakfast">Keto</option>
                </select>
                <div class="options" onclick="document.getElementById('file').click();">
                    <p>Add Image to Your Post</p>
                    <input type="file" name="image" id="file" hidden>
                    <i class="bi bi-card-image"></i>
                </div>
                <button type="submit" class="submit">Post</button>
            </form>
        </section>
    </div>
</div>

<div class="post-container">
    <h1 style="margin-top: 20px;">Your Blogs</h1>
</div>
@foreach($blogs as $blog)
    @if($blog->author_id === Auth::user()->id)
    <div class="post-container">
        <div class="card" style="width: 1000px;">
            <img class="card-img-top" src="{{ asset('img/' . $blog->image ); }}" alt="Card image cap" style="object-fit: cover;">
            <div class="card-body">
                <h4><a style="font-size: 34px;" href="{{ route('single_recipe',['id' => $blog->id]); }}">{{ $blog->title }}</a></h4>
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
    @endif
@endforeach

@endsection