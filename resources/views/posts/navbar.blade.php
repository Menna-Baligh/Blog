<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand mx-auto" href="{{ route('posts.index') }}">Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            @if (Auth::check())
                                <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">logout</a>
                            @else
                                <a class="nav-link active" aria-current="page" href="{{ route('login') }}">login</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('posts.likes.index') }}" style="margin-top:6px;">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
</nav>