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
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
