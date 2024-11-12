@php
    $menus = [
        (object) [
            'name' => 'Dashboard',
            'icon' => 'fa-tachometer-alt',
            'path' => '/',
        ],
        (object) [
            'name' => 'Inventaris',
            'icon' => 'fa-solid fa-box',
            'path' => 'products',
        ],

        (object) [
            'name' => 'Maintenance',
            'icon' => 'fa-cogs',
            'path' => 'maintenances',
        ],
        (object) [
            'name' => 'Items',
            'icon' => 'fa-tag',
            'path' => 'items',
        ],
    ];
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
        <img src="{{ asset('templates/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @foreach ($menus as $menu)
                    <li class="nav-item">
                        <a href="{{ request()->path == '/' ? '/' : '' }}{{ $menu->path }}"
                            class="nav-link {{ request()->is($menu->path) ? 'active' : '' }} ">
                            <i class="nav-icon
                            fas {{ $menu->icon }} text-white"></i>
                            <p>
                                {{ $menu->name }}
                            </p>
                        </a>
                    </li>
                @endforeach

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
