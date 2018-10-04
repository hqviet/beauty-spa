<!-- Left side column. contains the logo and sidebar -->
@php
$menus = [
    [
        'title' => 'Dashboard',
        'slug' => 'dashboard',
        'url' => route('admin.dashboard'),
        'icon' => 'fa fa-dashboard',
        'child' => null
    ],
    [
        'title' => 'Product',
        'slug' => 'product',
        'url' => '#',
        'icon' => 'fa fa-archive',
        'child' => [
            [
                'title' => 'List Product',
                'url' => route('admin.product.list'),
                'child' => null
            ],
            [
                'title' => 'Add Product',
                'icon' => '',
                'url' => route('admin.product.add.show'),
                'child' => null,
            ]
        ]
    ],
    [
        'title' => 'User',
        'slug' => 'user',
        'icon' => 'fa fa-user',
        'url' => '#',
        'child' => [
            [
                'title' => 'List User',
                'url' => '#',
                'child' => null
            ],
            [
                'title' => 'Add User',
                'url' => '#',
                'child' => null
            ]
        ]
    ],
    [
        'title' => 'Service',
        'slug' => 'service',
        'icon' => 'fa fa-list',
        'url' => '#',
        'child' => [
            [
                'title' => 'List Service',
                'url' => route('admin.service.index'),
                'child' => null
            ],
            [
                'title' => 'Add Service',
                'url' => route('admin.service.create'),
                'child' => null
            ]
        ]
    ],
    [
        'title' => 'Schedule',
        'slug' => 'schedule',
        'icon' => '	fa fa-calendar',
        'url' => '#',
        'child' => [
            [
                'title' => 'List Schedule',
                'url' => route('admin.schedule.index'),
                'child' => null
            ],
            [
                'title' => 'Add Schedule',
                'url' => route('admin.schedule.create'),
                'child' => null
            ]
        ]
    ]
];
$active = isset($active) ? $active : '';
@endphp

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $authUser->first_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
            @forelse ($menus as $menu)
            <li class="{{ $menu['child'] ? 'treeview' : '' }} {{ $active == $menu['slug'] ? 'active' : '' }} ">
                <a href="{{ $menu['url'] }}">
                    <i class="{{ $menu['icon'] }}"></i> <span>{{ $menu['title'] }}</span>
                    @if ($menu['child'])
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    @endif
                </a>
                @if ($menu['child'])
                <ul class="treeview-menu">
                    @forelse ($menu['child'] as $child)
                    <li class=""><a href="{{ $child['url'] }}"><i class="fa fa-circle-o"></i> {{ $child['title'] }} </a></li>
                    @empty
                    @endforelse
                </ul>
                @endif
            </li>
            @empty
            @endforelse
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
