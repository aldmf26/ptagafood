<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="index.html"><img src="theme/assets/images/logo/logo.svg" alt="Logo"></a>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown"
                        class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2">
                            @php
                                $idPosisi = auth()->user()->posisi->id;
                            @endphp
                            <img src="img/{{ $idPosisi == 1 ? 'kitchen' : 'server' }}.png" alt="Avatar">
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name">{{ ucwords(auth()->user()->name) }}</h6>
                            <p class="user-dropdown-status text-sm text-muted">
                                {{ ucwords(auth()->user()->posisi->nm_posisi) }}</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        <li>
                            <form id="myForm" method="post" action="{{ route('logout') }}">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="#"
                                onclick="document.getElementById('myForm').submit();">Logout</a>
                        </li>
                    </ul>
                </div>

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container font-bold">
            <ul>
                <li class="menu-item  ">
                    <a href="{{ route('dashboard') }}" class='menu-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @php
                    $subMenuGroup = [
                        'menu' => [
                            [
                                'href' => 'dashboard',
                                'nama' => 'takemori',
                            ],
                            [
                                'href' => 'dashboard',
                                'nama' => 'soondobu',
                            ],
                        ],
                        'config' => [
                            [
                                'href' => 'dashboard',
                                'nama' => 'departemen',
                            ],
                            [
                                'href' => 'dashboard',
                                'nama' => 'posisi',
                            ],
                            [
                                'href' => 'dashboard',
                                'nama' => 'distribusi',
                            ],
                            [
                                'href' => 'dashboard',
                                'nama' => 'ongkir',
                            ],
                        ],
                        'management' => [
                            [
                                'href' => 'karyawan',
                                'nama' => 'karyawan',
                            ],
                            [
                                'href' => 'users',
                                'nama' => 'user',
                            ],
                            [
                                'href' => 'dashboard',
                                'nama' => 'data kpi',
                            ],
                            [
                                'href' => 'dashboard',
                                'nama' => 'setting point',
                            ],
                        ],
                    ];
                    $menu = [
                        [
                            'href' => 'dashboard',
                            'img' => 'https://ptagafood.com/assets/img_menu/data-science.png',
                            'nama' => 'Kom Server',
                        ],
                        [
                            'href' => 'dashboard',
                            'img' => 'https://ptagafood.com/assets/img_menu/clipboard.png',
                            'nama' => 'Kom Kitchen',
                        ],
                    ];
                @endphp

                <li class="menu-item has-sub">
                    <a href="#" class='menu-link'>
                        <img width="25" src="https://ptagafood.com/assets/img_menu/server.png" alt="">
                        <span>{{ ucwords('database') }}</span>
                    </a>
                    <div class="submenu ">
                        <div class="submenu-group-wrapper">

                            <ul class="submenu-group">
                                @foreach ($subMenuGroup as $i => $d)
                                    <li class="submenu-item  has-sub">
                                        <a href="#" class='submenu-link'>{{ ucwords($i) }}</a>
                                        <ul class="subsubmenu">
                                            @foreach ($d as $m)
                                                <li class="subsubmenu-item ">
                                                    <a href="{{ route($m['href']) }}"
                                                        class="subsubmenu-link">{{ ucwords($m['nama']) }}</a>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </li>

                @foreach ($menu as $d)
                    <li class="menu-item">
                        <a href="{{ route($d['href']) }}" class='menu-link'>
                            <img width="25" src="{{ $d['img'] }}" alt="">
                            <span>{{ ucwords($d['nama']) }}</span>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </nav>

</header>
