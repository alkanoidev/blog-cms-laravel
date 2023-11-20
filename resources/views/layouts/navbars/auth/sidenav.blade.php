<aside
    class="sidenav bg-gray-800 navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">

        <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
            <img src="/img/logo.svg" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 text-white text-2xl font-weight-bold">Dashboard</span>

        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <span class="material-symbols-rounded text-white">
                            desktop_mac
                        </span>
                    </div>
                    <span class="nav-link-text ms-1 text-white">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}"
                    href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <span class="material-symbols-rounded text-white">
                            face
                        </span>
                    </div>
                    <span class="nav-link-text ms-1 text-white">Profile</span>
                </a>
            </li>
            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}"
                        href="{{ route('user-management') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-symbols-rounded text-white">
                                manage_accounts
                            </span>
                        </div>
                        <span class="nav-link-text ms-1 text-white">User Management</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'create-new-post') == true ? 'active' : '' }}"
                    href="{{ route('create-new-post') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <span class="material-symbols-rounded text-white">
                            add
                        </span>
                    </div>
                    <span class="nav-link-text ms-1 text-white">Create Post</span>
                </a>
            </li>
            <li class="nav-item">
                <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                    @csrf

                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div
                            class="icon icon-shape text-white icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-symbols-rounded text-white">
                                logout
                            </span>
                        </div>
                        <span class="nav-link-text ms-1 text-white">Log out</span>
                    </a>
                </form>
            </li>
            <li class="nav-item">
                <div class="nav-link">
                    <div
                        class="avatar text-white icon-md text-center me-2 d-flex align-items-center justify-content-center">
                        {!! auth()->user()->avatar !!}
                    </div>
                    <span class="nav-link-text ms-1 text-white">{{ auth()->user()->firstname }}
                        {{ auth()->user()->lastname }}</span>
                </div>
            </li>
        </ul>
    </div>
</aside>
