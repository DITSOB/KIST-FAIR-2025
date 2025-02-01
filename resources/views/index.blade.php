<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <title>Tasty Tidbits</title>
</head>
<body>
    <nav>
        <ul class="sidebar">
            <li onclick="hideSidebar()"><a href="#"><i class="bi bi-x-lg"></i></a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Recipes</a></li>
            <li><a href="#" class="login">Login<i class="bi bi-box-arrow-in-right"></i></a></li>
            <li><a href="#" class="signup">Sign Up</a></li>
        </ul>
        <ul>
            <li><a href="#">Tasty Tidbits</a></li>
            <li class="hideOnMobile"><a href="#">Home</a></li>
            <li class="hideOnMobile"><a href="#">Blogs</a></li>
            <li class="hideOnMobile"><a href="#">Recipes</a></li>
            <li class="hideOnMobile login"><a href="#">Login<i class="bi bi-box-arrow-in-right"></i></a></li>
            <li><a href="#" class="hideOnMobile signup">Sign Up</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><i class="bi bi-list"></i></a></li>
        </ul>
    </nav>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>