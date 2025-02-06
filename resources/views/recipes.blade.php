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
                <p class="card-text"><small class="text-muted">{{ $recipe['servings'] }}</small></p>
                <p class="card-text"><small class="text-muted"><h4 style="font-weight: bold; color: black;">Ingredients</h4><br>{!! nl2br(e($recipe['ingredients'])) !!}</small></p>
                <p class="card-text"><small class="text-muted"><h4>Instructions</h4><br>{!! nl2br(e($recipe['instructions'])) !!}</small></p>
            </div>
        @endforeach
    </div>
@else
    <p>No recipes found.</p>
@endif
</div>

@endsection