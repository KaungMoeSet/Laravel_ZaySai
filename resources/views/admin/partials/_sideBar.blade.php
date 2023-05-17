<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex justify-content-center">
            <div class="info">
                <a href="/admin">
                    <h2 class="website_name">ZaySai <i class="fas fa-store"></i></h2>
                    </li>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item {{ request()->is('product')
                        ? 'menu-is-opening menu-open'
                        : (request()->is('product/create')
                            ? 'menu-is-opening menu-open'
                            : (request()->is('category')
                                ? 'menu-is-opening menu-open'
                                : (request()->is('category/create')
                                    ? 'menu-is-opening menu-open'
                                    : (request()->is('paymentMethod')
                                        ? 'menu-is-opening menu-open'
                                        : (request()->is('paymentMethod/create')
                                            ? 'menu-is-opening menu-open'
                                                    : ''))))) }}">
                    <a href="#"
                        class="nav-link {{ request()->is('product')
                            ? 'active'
                            : (request()->is('category')
                                ? 'active'
                                : (request()->is('paymentMethod')
                                    ? 'active'
                                    : '')) }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Catalog
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('product') }}"
                                class="nav-link {{ request()->is('product') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('category') }}"
                                class="nav-link {{ request()->is('category') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('paymentMethod') }}"
                                class="nav-link {{ request()->is('paymentMethod') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Method List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('user')
                        ? 'menu-is-opening menu-open'
                        : (request()->is('admin/show-all-admins')
                            ? 'menu-is-opening menu-open'
                            : '') }}">
                    <a href="#"
                        class="nav-link {{ request()->is('user') ? 'active' : (request()->is('admin') ? 'menu-is-opening menu-open' : '') }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Account
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('user') }}"
                                class="nav-link {{ request()->is('user') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Account List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.show-all-admins') }}"
                                class="nav-link {{ request()->is('admin/show-all-admins') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin Account List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('adminOrders')
                        ? 'menu-is-opening menu-open'
                        : (request()->is('paymentConfirm')
                            ? 'menu-is-opening menu-open'
                            : '') }}">
                    <a href="#"
                        class="nav-link {{ request()->is('adminOrders') ? 'active' : (request()->is('paymentConfirm') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Order management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('paymentConfirm') }}"
                                class="nav-link {{ request()->is('paymentConfirm') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('adminOrders') }}"
                                class="nav-link {{ request()->is('adminOrders') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order List</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
