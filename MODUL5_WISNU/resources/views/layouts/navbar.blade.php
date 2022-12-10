<nav id="navbar" class="{{ $_COOKIE['navcol'] }}">
    <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    {{-- logged in --}}
                    @auth
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('showroom*') ? 'active' : '' }}" href="/showroom">MyCar</a>
                    </li>
                </ul>
                <div class="d-flex justify-content-end">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-auto">
                                <a href="/showroom/create" class="btn btn-light"><i class="bi bi-plus-lg"></i> Add Car</a>
                            </div>
                            <div class="col-md-auto">
                                <div class="dropdown">
                                    <a class="btn btn-light dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill"></i>
                                        {{ mb_strimwidth(auth()->user()->name, 0, 10, '...')}}</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/profile"><i class="bi bi-gear-fill"></i>
                                                Profile</a></li>
                                        <li>
                                            <form action="/logout" method="GET">
                                                @csrf
                                                <button name="logout" class="dropdown-item text-danger" type="submit"
                                                    onclick="return confirm('Apakah anda ingin Logout?')"><i class="bi bi-arrow-bar-left"></i> Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- not logged in --}}
            @else
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                </ul>
                <div class="d-flex justify-content-end">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-auto">
                                <a class="nav-link text-white" href="/login"><i class="bi bi-box-arrow-in-right"></i>
                                    Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
