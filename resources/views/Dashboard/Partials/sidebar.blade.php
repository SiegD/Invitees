<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 mt-5">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/home">
                            <span data-feather="home"></span>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                            <span data-feather="layout"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/undanganku') ? 'active' : '' }}"
                            href="/dashboard/undanganku">
                            <span data-feather="mail"></span>
                            Undanganku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="upload"></span>
                            Data Tamu
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="camera"></span>
                            Barcode Scanner
                        </a>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-toggle="modal" data-target="#logoutmodal"><span
                                data-feather="log-out"></span>
                            Logout</button>
                    </li>
                </ul>

                @can('admin')
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>---Admin---</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}"
                                href="/dashboard/users">
                                <span data-feather="settings"></span>
                                Clients
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/events*') ? 'active' : '' }}"
                                href="/dashboard/events">
                                <span data-feather="user"></span>
                                Events
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/event_type*') ? 'active' : '' }}"
                                href="/dashboard/event_type">
                                <span data-feather="columns"></span>
                                Event Type
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/location*') ? 'active' : '' }}"
                                href="/dashboard/location">
                                <span data-feather="map-pin"></span>
                                Venue
                            </a>
                        </li>

                    </ul>
                @endcan
            </div>
        </nav>
