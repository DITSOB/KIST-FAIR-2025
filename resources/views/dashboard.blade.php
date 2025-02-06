@extends('Layout.master')
@section('content')

<div class="post-container">
    <div class="post-wrapper">
        <section class="post">
            <header>Create Post</header>
            <form action="{{ route('blogs'); }}" method="POST">
                @csrf
                <div class="content">
                    <div class="details">
                        <p><i class="bi bi-person-circle"></i>Rohan Sunuwar</p>
                    </div>
                </div>
                <textarea name="description" placeholder="Create Post?"></textarea>
                <div class="emoji">
                    <i class="bi bi-emoji-smile"></i>
                </div>
                <div class="options">
                    <p>Add Image to Your Post</p>
                    <i class="bi bi-card-image"></i>
                </div>
                <button type="submit">Post</button>
            </form>
        </section>
    </div>
</div>


@endsection