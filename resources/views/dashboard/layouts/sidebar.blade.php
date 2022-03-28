<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : null }}" aria-current="page"
                    href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
        </ul>

        @if (auth()->user()->hasAnyRole(['admin', 'author']))
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Author</span>
            </h6>
            <ul class="nav flex-column">

                @can('posts-access')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : null }}"
                            href="/dashboard/posts">
                            <span data-feather="file-text"></span>
                            My News
                        </a>
                    </li>
                @endcan

            </ul>
        @endif

        @if (auth()->user()->hasAnyRole(['admin']))
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">

                @can('categories-access')
                    <li class="nav-item">
                        <a href="/dashboard/categories"
                            class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : null }}">
                            <span data-feather="grid"></span>
                            Post Categories
                        </a>
                    </li>
                @endcan

                @can('users-access')
                    <li class="nav-item">
                        <a href="{{ route('dashboard.users.index') }}"
                            class="nav-link {{ Request::is('dashboard/users*') ? 'active' : null }}">
                            <span data-feather="grid"></span>
                            Manage Users
                        </a>
                    </li>
                @endcan

            </ul>
        @endif

        @can('edit-profile')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Profile</span>
            </h6>
            <ul class="nav flex-column">
                @can('edit-profile')
                    <li class="nav-item">
                        <a href="{{ route('dashboard.profile.index', ['user' => auth()->user()->username]) }}"
                            class="nav-link {{ Request::is('dashboard/profile*') ? 'active' : null }}">
                            <span data-feather="grid"></span>
                            Manage Profile
                        </a>
                    </li>
                @endcan
            </ul>
        @endcan
    </div>
</nav>
