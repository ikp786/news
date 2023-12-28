<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
                <span style="color:var(--bs-primary);">
                    <img width="132px" style="margin-left:5px" src="{{asset('/public/backend/img/highfly_logo.pnga')}}"
                        alt="">
                </span>
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">

        <li class="menu-item {{ \Str::is('admin.dashboard', request()->route()->getName()) ? 'active open' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <li class="menu-item {{ \Str::is('admin.categories.*', request()->route()->getName()) ? 'active open' : '' }}">
            <a href="javascript:;" class="menu-link menu-toggle">
                <i class="fa-regular menu-icon fa-handshake" style="wight: 10px"></i>
                <div>Categories</div>
            </a>
            <ul class="menu-sub">
                <li
                    class="menu-item {{ \Str::is('admin.categories.create', request()->route()->getName()) ? 'active open' : '' }}">
                    <a href="{{ route('admin.categories.create') }}" class="menu-link">
                        <div>Add Category</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ \Str::is('admin.categories.index', request()->route()->getName()) ? 'active open' : '' }}">
                    <a href="{{ route('admin.categories.index') }}" class="menu-link">
                        <div>Category List</div>
                    </a>
                </li>               
            </ul>
        </li>

        {{-- <li class="menu-item {{ \Str::is('admin.cities.*', request()->route()->getName()) ? 'active open' : '' }}">
            <a href="javascript:;" class="menu-link menu-toggle">
                <i class="fa-solid menu-icon fa-gear"></i>
                <div>Settings</div>
            </a>
            <ul class="menu-sub">
                <li
                    class="menu-item {{ \Str::is('admin.cities.index', request()->route()->getName()) ? 'active open' : '' }}">
                    <a href="{{ route('admin.cities.index') }}" class="menu-link">
                        <div> City Master</div>
                    </a>
                </li>

            </ul>
        </li> --}}

    </ul>
</aside>