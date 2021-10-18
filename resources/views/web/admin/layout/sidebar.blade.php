<!-- Brand Logo -->
<a href="{{ url('/') }}" class="brand-link">
    <img src="{{asset('dist/img/icemine.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name', 'ICEMINE') }}</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('dist/img/profile-default.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Admin</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Main</li>
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('admin.dashboard.index')}}"
                    class="nav-link {{request()->routeIs('admin.dashboard.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li
                class="nav-item {{request()->routeIs('admin.active-users.*') || request()->routeIs('admin.new-users.*') ? 'menu-open' : ''}}">
                <a href="#"
                    class="nav-link {{request()->routeIs('admin.active-users.*') || request()->routeIs('admin.new-users.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Users
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class=" nav-item">
                        <a href="{{route('admin.active-users.index')}}"
                            class="nav-link {{request()->routeIs('admin.active-users.*') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Active Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.new-users.index')}}"
                            class="nav-link {{request()->routeIs('admin.new-users.*') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>New Users</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.reviewers.index')}}"
                    class="nav-link {{request()->routeIs('admin.reviewers.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>
                        Reviewers
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.submissions.index')}}"
                    class="nav-link {{request()->routeIs('admin.submissions.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-file-archive"></i>
                    <p>
                        Submissions
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{route('admin.abstracts.index')}}"
            class="nav-link {{request()->routeIs('admin.abstracts.*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
                Abstracts
            </p>
            </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{route('admin.papers.index')}}"
                    class="nav-link {{request()->routeIs('admin.papers.*') ? 'active' : ''}}">
                    <i class="nav-icon far fa-file-alt"></i>
                    <p>
                        Full Papers
                    </p>
                </a>
            </li>
            <li class="nav-item {{request()->routeIs('admin.admin-review.*') ? 'menu-open' : ''}}">
                <a href="#" class="nav-link {{request()->routeIs('admin.admin-review.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-user-secret"></i>
                    <p>
                        Admin Review
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class=" nav-item">
                        <a href="{{route('admin.admin-review.unreviews.index')}}"
                            class="nav-link {{request()->routeIs('admin.admin-review.unreviews.*') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Unreview Papers</p>
                        </a>
                    </li>
                    <li class=" nav-item">
                        <a href="{{route('admin.admin-review.review-results.index')}}"
                            class="nav-link {{request()->routeIs('admin.admin-review.review-results.*') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Review Result</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{request()->routeIs('admin.reviewer-reviews.*') ? 'menu-open' : ''}}">
                <a href="#" class="nav-link {{request()->routeIs('admin.reviewer-reviews.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>
                        Reviewer Reviews
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class=" nav-item">
                        <a href="{{route('admin.reviewer-reviews.manage-reviews.index')}}"
                            class="nav-link {{request()->routeIs('admin.reviewer-reviews.manage-reviews.*') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Reviews</p>
                        </a>
                    </li>
                    <li class=" nav-item">
                        <a href="{{route('admin.reviewer-reviews.review-results.index')}}"
                            class="nav-link {{request()->routeIs('admin.reviewer-reviews.review-results.*') ? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Review Result</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.final-papers.index')}}"
                    class="nav-link  {{request()->routeIs('admin.final-papers.*') ? 'active' : ''}}">
                    <i class="nav-icon far fa-file-archive"></i>
                    <p>
                        Final Papers
                    </p>
                </a>
            </li>
            <li class="nav-header">Config</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Configuration
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->