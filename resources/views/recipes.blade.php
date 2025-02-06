@extends('Layout.master')
@section('content')

<div class="recipe-container">
    <h1 class="heading">Recipes</h1>
    <div class="box-container">
        <div class="box">
            <img src="{{ asset('img/TastyCover1.jpg'); }}" alt="">
            <h3>Item 1</h3>
            <p class="card-text"><small class="text-muted"><i class="bi bi-person"></i>Source</small></p>
            <p class="card-text"><small class="text-muted"><i class="bi bi-clock"></i>Prep Time</small></p>
            <a href="#" class="btn btn-success" style="color: white; text-decoration: none;">Show Recipe</a>
        </div>
        <div class="box">
            <img src="{{ asset('img/TastyCover1.jpg'); }}" alt="">
            <h3>Item 2</h3>
            <p class="card-text"><small class="text-muted"><i class="bi bi-person"></i>Source</small></p>
            <p class="card-text"><small class="text-muted"><i class="bi bi-clock"></i>Prep Time</small></p>
            <a href="#" class="btn btn-success" style="color: white; text-decoration: none;">Show Recipe</a>
        </div>
        <div class="box">
            <img src="{{ asset('img/TastyCover1.jpg'); }}" alt="">
            <h3>Item 3</h3>
            <p class="card-text"><small class="text-muted"><i class="bi bi-person"></i>Source</small></p>
            <p class="card-text"><small class="text-muted"><i class="bi bi-clock"></i>Prep Time</small></p>
            <a href="#" class="btn btn-success" style="color: white; text-decoration: none;">Show Recipe</a>
        </div>
        <div class="box">
            <img src="{{ asset('img/TastyCover1.jpg'); }}" alt="">
            <h3>Item 4</h3>
            <p class="card-text"><small class="text-muted"><i class="bi bi-person"></i>Source</small></p>
            <p class="card-text"><small class="text-muted"><i class="bi bi-clock"></i>Prep Time</small></p>
            <a href="#" class="btn btn-success" style="color: white; text-decoration: none;">Show Recipe</a>
        </div>
    </div>
</div>

@if(!empty($recipes))
    <h1>Popular Recipes</h1>
    <ul>
        @foreach($recipes as $recipe)
            <li>
                
                <h2>{{ $recipe['title'] }}</h2>
                <p>{{ $recipe['ingredients'] }}</p>
                <p>{{ $recipe['servings'] }}</p>
                <p><strong>Instructions:</strong> {{ $recipe['instructions'] }}</p>
            </li>
        @endforeach
    </ul>
@else
    <p>No recipes found.</p>
@endif


@endsection