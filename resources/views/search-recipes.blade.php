@extends('Layout.master')
@section('content')

<div class="recipe-container">
    
@if(!empty($recipes))
        
    <h1 class="heading">Search: {{ Session::get('search')}}</h1>

    <div class="box-container">
        @foreach($recipes as $recipe)
            <div class="box1">
                <a href="" style="text-decoration: none;"><h3>{{ $recipe['title'] }}</h3></a>
                <img src="{{ $recipe['image_url'] }}" alt="{{ $recipe['title'] }}" style="width: 300px; height: 400px; object-fit: cover; border-radius: 10px;">
                <p class="card-text"><small class="text-muted"><i class="bi bi-person"></i>{{ $recipe['servings'] }}</small></p>
                <a href="#" class="btn btn-success" style="color: white; text-decoration: none;">View Recipe</a>
                <!-- <p class="card-text"><small class="text-muted"><h4 style="font-weight: bold; color: black;">Ingredients</h4><br>{!! nl2br(e($recipe['ingredients'])) !!}</small></p>
                <p class="card-text"><small class="text-muted"><h4>Instructions</h4><br>{!! nl2br(e($recipe['instructions'])) !!}</small></p> -->
            </div>
        @endforeach
    </div>
@else
    <p>No recipes found.</p>
@endif
</div>

@endsection