<style>
    .active{
        color: brown
    }
</style>
<nav class="sidebar" id="sidebar">
    <div class="sidebar-header text-center py-4 border-bottom">
        <a href="{{ route('dashboard') }}">
            <div>
                <img class="logo img-fluid" src="{{ asset('admin/images/logo.png') }}" alt="Logo">
                <span class="logo-text fs-1 black-color">sash</span>
            </div>
        </a>
    </div>

    <div class="sidebar-content">

        <div class="menu-group">
            <h5 class="menu-group-title">main</h5>
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <span class="menu-icon">
                            <i class="fa-solid fa-house-chimney"></i>
                        </span>
                        <span class="menu-name">dashboard</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="menu-group">
            <h5 class="menu-group-title">Product Managment</h5>
            <ul>
                <li class="dropdown__menu">
                    <span class="dropdown__chevron">
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                    <a data-bs-toggle="collapse" href="#dropdown__side__menu__1" role="button" id="{{ (request()->is('admins/category*')) ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="fa-brands fa-app-store"></i>
                        </span>
                        <span class="menu-name">Category Managment</span>
                    </a>

                    <div class="submenu collapse" id="dropdown__side__menu__1">
                        <ul>
                            <li>
                                <a href="{{ route('category') }}" id="{{ request()->is('admins/category*') ? 'active':'' }}">
                                    <span class="submenu-icon">
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span class="submenu-name">Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('sub.category') }}">
                                    <span class="submenu-icon">
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span class="submenu-name">Sub Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('child.category') }}">
                                    <span class="submenu-icon">
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span class="submenu-name">Child Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Brand -->
                <li>
                    <a href="{{ route('brand.index') }}">
                        <span class="menu-icon">
                            <i class="fa-brands fa-buffer"></i>
                        </span>
                        <span class="menu-name">brand</span>
                    </a>
                </li>

                <!-- Product --->
                <li>
                    <a href="{{ route('product.index') }}" id="{{ (request()->is('admin/product')) ? 'active' : '' }}">
                        <span class="menu-icon" id="menuIcons">
                            <i class="fa-brands fa-slack"></i>
                        </span>
                        <span class="menu-name">Product</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="menu-group">
            <h5 class="menu-group-title">Assets</h5>
            <ul>
                <!-- Pages --->
                <li>
                    <a href="{{ route('page.index') }}" id="{{ (request()->is('admin/page')) ? 'active' : '' }}">
                        <span class="menu-icon" id="menuIcons">
                            <i class="fa-regular fa-file-lines"></i>
                        </span>
                        <span class="menu-name">Pages</span>
                    </a>
                </li>

                <!-- Order --->
                <li class="dropdown__menu">
                    <a data-bs-toggle="collapse" href="#dropdown__side__menu__4" role="button" id="">
                        <span class="menu-icon" id="menuIcons">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="menu-name">Order</span>
                    </a>

                    <div class="submenu collapse" id="dropdown__side__menu__4">
                        <ul>
                            <li>
                                <a href="{{ route('pending.order.index') }}">
                                    <span class="submenu-icon">
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span class="submenu-name">Pending Order</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all.complete.order') }}">
                                    <span class="submenu-icon">
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span class="submenu-name">Completed Order</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Customers --->
                <li>
                    <a href="" id="{{ (request()->is('admin/product')) ? 'active' : '' }}">
                        <span class="menu-icon" id="menuIcons">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="menu-name">Customer</span>
                    </a>
                </li>

                <!-- Stock managment --->
                <li class="dropdown__menu">
                    <span class="dropdown__chevron">
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                    <a data-bs-toggle="collapse" href="#dropdown__side__menu__2" role="button">
                        <span class="menu-icon">
                            <i class="fa-solid fa-gear"></i>
                        </span>
                        <span class="menu-name">Settings</span>
                    </a>

                    <div class="submenu collapse" id="dropdown__side__menu__2">
                        <ul>
                            <!--settings module-->
                            <li>
                                <a href="{{ route('payment.index') }}">
                                    <span class="submenu-icon">
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span class="submenu-name">Payment Method (API)</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('currency.index') }}" id="{{ (request()->is('admin/setting/currency')) ? 'active' : '' }}">
                                    <span class="submenu-icon">
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span class="submenu-name">Currency</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('footer.index') }}" id="{{ (request()->is('admin/setting')) ? 'active' : '' }}">
                                    <span class="submenu-icon">
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span class="submenu-name">Setting</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>


    </div>
</nav>
