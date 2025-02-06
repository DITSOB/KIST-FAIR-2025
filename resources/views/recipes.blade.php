@extends('Layout.master')
@section('content')

<div class="recipe-container">
    
@if(!empty($recipes))
    <h1 class="heading">Popular Recipes</h1>
    <div class="box-container">
        @foreach($recipes as $recipe)
            <div class="box">
                <h3>{{ $recipe['title'] }}</h3>
                <img src="{{ $recipe['image_url'] }}" alt="{{ $recipe['title'] }}" style="width: 300px; height: 400px; object-fit: cover; border-radius: 10px;">
                <p class="card-text"><small class="text-muted"><i class="bi bi-person"></i>{{ $recipe['servings'] }}</small></p>
                <a href="#" class="btn btn-success" style="color: white; text-decoration: none;">Show Recipe</a>
            </div>
        @endforeach
    </div>
@else
    <p>No recipes found.</p>
@endif
</div>

@endsection