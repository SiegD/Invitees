<nav class="navbar navbar-expand-lg navbar-light">

    <div class="container-fluid">
        <a class="navbar-brand mx-3" href="/home">Invitees</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end ms-5" id="navbarNav">
            <ul class="navbar-nav px-3">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page"
                        href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home#features') ? 'active' : '' }}"
                        href="/home#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home#price') ? 'active' : '' }}" href="/home#price">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home#contact') ? 'active' : '' }}" href="/home#contact">Contact
                        Us</a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Halo, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu border-0" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/dashboard"> <i
                                        class="bi bi-layout-text-window-reverse"></i>
                                    Dashboard saya</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-cart3"></i> Paket saya</a>
                            </li>
                            <hr>
                            <li>
                                <button data-toggle="modal" data-target="#logoutmodal" class="dropdown-item"
                                    id="modal-logout"><i class="bi bi-box-arrow-right"></i>
                                    Logout</button>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('Login') ? 'active' : '' }}" href="/login">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
