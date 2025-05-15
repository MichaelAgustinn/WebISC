    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('LogoIsc.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">ISC UNSULBAR</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset(Auth::user()->foto ? 'storage/' . Auth::user()->foto : 'storage/photo_profil/default.jpg') }}"
                        class="img-circle elevation-2" alt="profil">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    @if (Auth::user()->role === 'Admin' || Auth::user()->role === 'Pengurus')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Forms
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('landingpage.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Landing Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('editor') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Blog</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('addMember') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User | Add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Information
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('listuser') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Member Information</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('validate') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Member Activation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('faqadmin') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>FAQ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
