<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ request()->route()->getName() == 'admin.home' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{ __('lb.Dashboard') }}
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                @php
                    $productManagements = [
                        'admin.product.category',
                        'admin.product'
                    ];
                @endphp
                <li class="nav-item {{  in_array(request()->route()->getName(), $productManagements) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link
                        {{ in_array(request()->route()->getName(), $productManagements) ? 'active' : '' }}
                    ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{  __('lb.product_management') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.product.category') }}" class="nav-link {{ request()->route()->getName() == 'admin.product.category' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                   {{ __('lb.product_category') }}
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product') }}" class="nav-link {{ request()->route()->getName() == 'admin.product' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    {{ __('lb.product') }}
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @php
                    $settingManagements = [
                        'admin.role',
                        'admin.role.create',
                        'admin.role.edit',
                        'admin.user',
                        'admin.user.create',
                        'admin.user.edit'
                    ];
                @endphp
                <li class="nav-item {{  in_array(request()->route()->getName(), $settingManagements) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link
                        {{ in_array(request()->route()->getName(), $settingManagements) ? 'active' : '' }}
                    ">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            {{  __('Settings') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.role') }}" class="nav-link {{
                                request()->route()->getName() == 'admin.role' ||
                                 request()->route()->getName() == 'admin.role.create' ||
                                 request()->route()->getName() == 'admin.role.edit' ? 'active' : ''
                            }}">
                                <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                                <p>
                                   {{ __('Role') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user') }}" class="nav-link {{
                                request()->route()->getName() == 'admin.user' ||
                                 request()->route()->getName() == 'admin.user.create' ||
                                 request()->route()->getName() == 'admin.user.edit' ? 'active' : ''
                            }}">
                                <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                                <p>
                                   {{ __('User') }}
                                </p>
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
