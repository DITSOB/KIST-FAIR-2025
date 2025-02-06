@extends('Layout.master')
@section('content')

<div class="post-container">
    <div class="post-wrapper">
        <section class="post">
            <header>Edit Post</header>
            <form action="{{ route('blogs.updateAdmin', $blogs->id); }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="content">
                    <div class="details">
                        <p><i class="bi bi-person-circle"></i>{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <textarea style="height: 30px; min-height: 30px;" name="title" placeholder="Title Here" required>{{ old('title', $blogs->title); }}</textarea>
                <textarea name="description" placeholder="Description" required>{{ old('description', $blogs->description); }}</textarea>
                <input type="hidden" value="{{ old('author_id', $blogs->author_id); }}" name="author_id">
                <textarea style="height: 30px; min-height: 30px;" name="author" placeholder="Author" required>{{ old('author', $blogs->author); }}</textarea>
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
                <button type="submit" class="submit">Update</button>
            </form>
        </section>
    </div>
</div>

@endsection