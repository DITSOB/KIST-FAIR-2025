<!-- navbar -->
<nav>
        <ul class="sidebar">
            <div style="width: 100%; display: flex; justify-content: center; align-items: center; flex-direction:column;">
                <li onclick="hideSidebar()"><a href="#"><i class="bi bi-x-lg"></i></a></li>
                <li><a href="{{ route('index'); }}">Home</a></li>
                <li><a href="{{ route('blogs'); }}">Blogs</a></li>
                <li><a href="{{ route('recipes'); }}">Recipes</a></li>
                <li><a href="{{ route('about'); }}">About</a></li>
                @auth 
                    @if(Auth::user()->role === 'admin')
                        <li><a href="{{ route('admin-dashboard'); }}" style="text-align: center; margin-bottom: 10px;">Admin Dashboard</a></li>
                    @elseif(Auth::user()->role === 'user')
                        <li><a href="{{ route('dashboard'); }}" style="margin-bottom: 10px;"><i class="bi bi-person-circle"></i>&nbsp;Profile</a></li>
                    @endif
                        <li><a href="{{ route('logout'); }}" id="login" style="text-align: center; margin-bottom: 10px;">Logout</a></li>
                    @else
                        <li><a href="{{ route('login'); }}" id="login" style="margin-bottom: 10px;">Login<i class="bi bi-box-arrow-in-right"></i></a></li>
                        <li><a href="{{ route('signup'); }}" id="signin" style="margin-bottom: 10px;">Sign Up</a></li>
                @endauth
            </div>
        </ul>
        <ul>
            <li><a href="{{ route('index'); }}">Tasty Tidbits</a></li>
            <div class="box-container" class="hdieOnMobile">
                <div class="box">
                <div class="search-box">
                <form action="{{ route('search-recipes') }}" method="GET" class="mb-4">
                    <input type="text" name="query" placeholder="Search for recipe." style="font-weight: normal; color: grey;" required>
                    <button for="" type="submit" class="icon"><i class="bi bi-search"></i></button>
                    </button>
                </form>
                    
                </div>
                </div>
            </div>
            <li class="hideOnMobile"><a href="{{ route('index'); }}">Home</a></li>
            <li class="hideOnMobile"><a href="{{ route('blogs'); }}">Blogs</a></li>
            <li class="hideOnMobile"><a href="{{ route('recipes'); }}">Recipes</a></li>
            <li class="hideOnMobile"><a href="{{ route('about'); }}">About</a></li>
            @auth 
                @if(Auth::user()->role === 'admin')
                    <li class="hideOnMobile"><a href="{{ route('admin-dashboard'); }}">Admin Dashboard</a></li>
                @elseif(Auth::user()->role === 'user')
                    <li class="hideOnMobile"><a href="{{ route('dashboard'); }}"><i class="bi bi-person-circle"></i>&nbsp;{{ Auth::user()->name }}</a></li>
                @endif
                    <li class="hideOnMobile"><a href="{{ route('logout'); }}" id="login">Logout</a></li>
                @else
                    <li class="hideOnMobile"><a href="{{ route('login'); }}" id="login">Login<i class="bi bi-box-arrow-in-right"></i></a></li>
                    <li class="hideOnMobile"><a href="{{ route('signup'); }}" id="signin">Sign Up</a></li>
            @endauth
            <li class="menu-button" onclick=showSidebar()><a href="#"><i class="bi bi-list"></i></a></li>
        </ul>
    </nav>
<!-- navbar end -->