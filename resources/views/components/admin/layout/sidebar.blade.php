<aside id="sidebar" class="sidebar-toggle">
    <div class="sidebar-logo mb-2 w-100 d-flex justify-content-center align-items-center">
        <img src="{{ asset('assets/images/college.jpg') }}" alt="library-logo">
    </div>

    <!-- Sidebar Navigation -->
    <ul class="sidebar-nav m-0 p-0">
        <li class="sidebar-item">
            <a href="{{ route('admin.profile') }}"
                class="profile-link {{ request()->routeIs('admin.profile') ? 'active' : '' }} d-flex position-relative overflow-hidden">
                <img src="{{ asset($user->image_url) }}" alt="user-profile" class="user-profile">
                <div class="flex flex-col overflow-hidden" style="max-width: 70%;">
                    <p class="user-name m-0 text-capitalize" style="white-space: nowrap !important; text-overflow: ellipsis !important;">{{$user->firstname}} {{$user->lastname}}</p>
                    <p class="user-role m-0 text-uppercase">{{ $user->role }}</p>
                </div>
                <i class="bi bi-chevron-right position-absolute fs-5" style="right: 5%; top: 27.5%; "></i>
            </a>
        </li>

        <li class="sidebar-header text-uppercase">
            Main Navigation
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin.dashboard') }}"
                class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-box-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin.book') }}"
                class="sidebar-link {{ request()->routeIs('admin.book') ? 'active' : '' }}">
                <i class="bi bi-book-fill"></i>
                <span>Books</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('admin.member') }}"
                class="sidebar-link {{ request()->routeIs('admin.member') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i>
                <span>Members</span>
            </a>
        </li>

  

        <li class="sidebar-header text-uppercase">
            Sub menu
        </li>

        @if (Auth::check() && Auth::user()->role == 'admin')
            <li class="sidebar-item">
                <a href="{{ route('admin.report') }}"
                    class="sidebar-link {{ request()->routeIs('admin.report') ? 'active' : '' }}">
                    <i class="bi bi-graph-up-arrow"></i>
                    <span>Reports</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a href="{{ route('admin.archive') }}"
                    class="sidebar-link {{ request()->routeIs('admin.archive') ? 'active' : '' }}">
                    <i class="bi bi-archive"></i>
                    <span>Archives</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('admin.manage.account') }}"
                    class="sidebar-link {{ request()->routeIs('admin.manage.account') ? 'active' : '' }}">
                    <i class="bi bi-person-gear"></i>
                    <span>Manage Accounts</span>
                </a>
            </li>
        @endif

        <li class="sidebar-item">
            <a href="{{ route('admin.auditLog') }}"
                class="sidebar-link {{ request()->routeIs('admin.auditLog') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i>
                Audit Logs
            </a>
        </li>

        <li class="sidebar-item">
            <a href="{{ route('admin.notification') }}"
                class="sidebar-link {{ request()->routeIs('admin.notification') ? 'active' : '' }}">
                <i class="bi bi-bell"></i>
                <span>Notifications</span>
            </a>
        </li>

        <li class="sidebar-item logout-sidebar" style="cursor: pointer;">
            <form action="{{ route('auth.logout') }}" id="logoutForm" method="post" class="ps-3">
                @csrf
                @method('POST')

                <button class="btn p-2 text-center sidebar-link" type="submit">
                    <i class="bi bi-box-arrow-in-left fs-5"></i>
                    <span style="font-size: .96rem;">Log Out</span>
                </button>
            </form>
        </li>

        <script>
            document.querySelector('.logout-sidebar').addEventListener('click', () => {
                document.getElementById('logoutForm').submit();
            });
        </script>
    </ul>
</aside>