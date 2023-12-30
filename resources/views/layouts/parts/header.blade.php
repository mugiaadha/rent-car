<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
        <img src="/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Rentoto</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">
        <form action="" method="GET" class="search-form d-flex align-items-center" >
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
            </a>
        </li>

        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/assets/img/profile-img-2.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ session('user_data')->ud_nama }}</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <h6>{{ session('user_data')->ud_nama }}</h6>
                <span>{{ session('user_data')->ud_level }}</span>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('do-logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
                </a>
            </li>

            </ul>
        </li>

        </ul>
    </nav>
</header>