<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset(company()->photo) }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(userAuth()->photo) }}"
                     class="rounded-circle"
                     style="width: 35px; height: 35px;"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ userAuth()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if(auth()->user()->id == 1)
                <li class="nav-item">
                    <a href="{{ route('admin.permission') }}" class="nav-link {{ request()->route()->getName() == 'admin.permission' || request()->route()->getName() == 'admin.permission.create' || request()->route()->getName() == 'admin.permission.edit' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-user-check"></i>
                        <p>
                            {{ __('Permission') }}
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ request()->route()->getName() == 'admin.home' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{ __('lb.Dashboard') }}
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                @if(checkPermission('banner','view'))
                <li class="nav-item">
                    <a href="{{ route('admin.banner') }}" class="nav-link {{ request()->route()->getName() == 'admin.banner' ||
                    request()->route()->getName() == 'admin.banner.edit' ||
                    request()->route()->getName() == 'admin.banner.create' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{ __('Banner') }}
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                @endif
                @php
                    $productManagements = [
                        'admin.product.category',
                        'admin.product',
                        'admin.product_category.create',
                        'admin.product_category.edit',
                        'admin.product.create',
                        'admin.product.edit',
                    ];
                @endphp
                <li class="nav-item {{  in_array(request()->route()->getName(), $productManagements) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link
                        {{ in_array(request()->route()->getName(), $productManagements) ? 'active' : '' }}
                    ">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            {{  __('lb.product_management') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(checkPermission('product_category','view'))
                            <li class="nav-item">
                                <a href="{{ route('admin.product.category') }}" class="nav-link {{ request()->route()->getName() == 'admin.product.category' ||
                                request()->route()->getName() == 'admin.product_category.create' ||
                                request()->route()->getName() == 'admin.product_category.edit' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                                    <p>
                                    {{ __('lb.product_category') }}
                                        {{-- <span class="right badge badge-danger">New</span> --}}
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if(checkPermission('product','view'))
                        <li class="nav-item">
                            <a href="{{ route('admin.product') }}" class="nav-link {{ request()->route()->getName() == 'admin.product' ||
                            request()->route()->getName() == 'admin.product.create' ||
                            request()->route()->getName() == 'admin.product.edit' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                                <p>
                                    {{ __('lb.product') }}
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @php
                    $settingManagements = [
                        'admin.role',
                        'admin.role.create',
                        'admin.role.edit',
                        'admin.role.permission',
                        'admin.user',
                        'admin.user.create',
                        'admin.user.edit',
                        'admin.company',
                        'admin.company.edit'
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
                        @if(checkPermission('role','view'))
                        <li class="nav-item">
                            <a href="{{ route('admin.role') }}" class="nav-link {{
                                request()->route()->getName() == 'admin.role' ||
                                 request()->route()->getName() == 'admin.role.create' ||
                                 request()->route()->getName() == 'admin.role.edit' ||
                                 request()->route()->getName() == 'admin.role.permission' ? 'active' : ''
                            }}">
                                <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                                <p>
                                   {{ __('Role') }}
                                </p>
                            </a>
                        </li>
                        @endif
                        @if(checkPermission('user','view'))
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
                        @endif
                        @if(checkPermission('company','view'))
                        <li class="nav-item">
                            <a href="{{ route('admin.company') }}" class="nav-link {{
                                request()->route()->getName() == 'admin.company' ||
                                request()->route()->getName() == 'admin.company.edit' ? 'active' : ''
                            }}">
                                <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                                <p>
                                   {{ __('Company') }}
                                </p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
