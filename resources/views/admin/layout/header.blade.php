<header class="header px-sm-4 py-4" id="header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">

            <!-- Header Left Part -->
            <div class="header-left d-flex align-items-center">
                <span class="sidebar-toggler fs-1 brand-color me-5" role="button">
                    <i class="fa-solid fa-bars-staggered"></i>
                </span>

                <form action="">
                    <div class="d-none d-lg-block search-box position-relative fs-3 overflow-hidden">
                        <input class="fs-4 w-100" type="search" name="" id="" placeholder="Search...">
                        <button type="submit"
                            class="btn fs-4 position-absolute top-0 end-0 h-100 px-4 pt-3 text-color-2">
                            <i class="fa-solid fa-magnifying-glass w-100 h-100"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Header Middle Part -->
            <a class="d-lg-none" href="index.html">
                <div>
                    <img class="logo img-fluid" src="{{ asset('admin/images/logo.png') }}" alt="Logo">
                    <span class="logo-text fs-1 black-color">sash</span>
                </div>
            </a>

            <!-- Header Right Part -->
            <div class="header-right">
                <div class="d-flex align-items-center">

                    <div class="fs-2 brand-color d-lg-none" role="button" data-bs-toggle="modal"
                        data-bs-target="#searchModal">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                    <span onclick="toggleFullScreen();" class="fullscreen-btn fs-2 brand-color ms-4 ms-sm-5"
                        role="button">
                        <i class="fa-solid fa-compress"></i>
                    </span>

                    <div class="icon-group ms-4 ms-sm-5">
                        <a class="text-color-dark brand-color" href="">
                            <div class="floating-text-icon d-inline-block position-relative fs-2">
                                <i class="fa-regular fa-bell"></i>
                                <span class="floating-num bg-green fs-6"></span>
                            </div>
                        </a>
                    </div>

                    <div class="user-profile-img ms-4 ms-sm-5">
                        <div class="btn-group">
                            <img src="{{ asset('admin/images/table-product-2.jpg') }}" type="button" class="dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" alt="">
                            <div class="dropdown-menu dropdown-menu-end rounded-4 text-capitalize">
                                <div class="dropdown-header px-5 py-4 text-nowrap text-center border-bottom">
                                    <h4 class="fs-15 text-color mb-2">{{ session()->get('admin_name') }}</h4>
                                    <h5 class="text-color-muted fs-12">senior admin</h5>
                                </div>

                                <ul>
                                    <li class="nav-item fs-14 border-bottom">
                                        <a class="nav-link p-4" href="">
                                            <span class="brand-color me-3"><i class="fa-regular fa-user"></i></span>

                                            <span>profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item fs-14">
                                        <a class="nav-link p-4" href="{{ route('admin.logout') }}">
                                            <span class="brand-color me-3"><i
                                                    class="fa-solid fa-arrow-right-from-bracket"></i></span>

                                            <span>sign out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
