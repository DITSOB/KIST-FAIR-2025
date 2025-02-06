@extends('Layout.master')
@section('content')
<!-- <div class="slide-container">

    <div class="slider">
        <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">

            <div class="slide first">
                <div class="image-container">
                    <img src="{{ asset('img/TastyCover1.jpg'); }}">
                    <div class="text-overlay">
                        <p>"Welcome to Tasty Tidbits, <br>your go-to destination for delicious, easy to follow recipies that bring flavor and joy to every meal!"😊🍽️</p>
                        <a href="#" class="btn">Get Started<i class="bi bi-box-arrow-right" style="font-size: 34px;"></i></a>
                    </div>
                </div>
            </div>
            <div class="slide">
                <img src="{{ asset('img/TastyCover2.jpg'); }}">
                <div class="text-overlay">
                        <p>"Explore a world of flavors and discover exciting new recipes <br>that will inspire your next delicious meal!"😊🍽️</p>
                        <a href="#" class="btn">Get Started<i class="bi bi-box-arrow-right" style="font-size: 34px;"></i></a>
                </div>
            </div>

            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
            </div>
        </div>
        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label> 
            <label for="radio2" class="manual-btn"></label>        
        </div>

    </div>
</div> -->

<!-- carousel -->
<div class="carousel-container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="{{ asset('img/TastyCover1.jpg'); }}" alt="..." class="d-block img-fluid">
        <div class="carousel-caption d-none d-md-block">
            <h5 style="font-size: 40px; background: rgba(0, 0, 0, 0.5);">"Savor the Flavors - Discover, Cook, Enjoy!"🍽️✨</h5>
            <a href="{{ route('signup'); }}" class="btn btn-success" style="color: white; text-decoration: none;">Get Started</a>
        </div>
    </div>
    <div class="carousel-item">
        <img src="{{ asset('img/TastyCover2.jpg'); }}" alt="..." class="d-block img-fluid">
        <div class="carousel-caption d-none d-md-block">
            <h5 style="font-size: 40px; background: rgba(0, 0, 0, 0.5);">"Embark on a culinary adventure - discover, create, and savor new flavors with every click!"🍽️✨</h5>
            <a href="{{ route('recipes') }}" class="btn btn-info">Explore <i class="bi bi-search"></i></a>
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
</div>

<!-- updates -->
<h3 style="text-align: center; margin-top: 20px;">New Uploads</h3>
<div class="container-card swiper">
    <div class="wrapper-card">
        <ul class="card-list swiper-wrapper">
            @foreach($blogs as $blog)
            <li class="card-item swiper-slide">
                <a href="{{ route('single_blog', $blog->id); }}" class="card-link">
                    <img src="{{ asset('img/' . $blog->image); }}" alt="" class="card-image">
                    <p class="badge"><i class="bi bi-person"></i>&nbsp;{{ $blog->author }}</p><br>
                    <p class="badge"><i class="bi bi-clock"></i>&nbsp;Last updated {{ $blog->updated_at->diffForHumans(); }}</p>
                    <h2 class="card-title">{{ $blog->title }}</h2>
                    <button class="card-button material-symbols-rounded"><i class="bi bi-arrow-right"></i></button>
                </a>
            </li>
            @endforeach
        </ul>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
<script>
    new Swiper('.wrapper-card', {
    // Optional parameters
    loop: true,
    sapceBetween: 30,
  
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    breakpoints: {
        0:{
            slidePerView: 1
        },
        768:{
            slidePerView: 2
        },
        1024:{
            slidePerView: 3
        },
    }
});
</script>

@endsection