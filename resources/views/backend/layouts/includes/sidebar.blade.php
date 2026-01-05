<aside id="layout-menu" class="layout-menu menu-vertical menu"
    style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

    <div class="app-brand demo ">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <span class="text-primary">
                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                            fill="currentColor"></path>
                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616"></path>
                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                            fill="currentColor"></path>
                    </svg>
                </span>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-3">Vuexy</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
            <i class="icon-base ti tabler-x d-block d-xl-none"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1 ps ps--active-y">
        <!-- Dashboards -->
        <li class="menu-item @if (request()->routeIs('dashboard')) active @endif open">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div>Dashboards</div>
            </a>
        </li>

        <!-- pages -->
        <li class="menu-header small">
            <span class="menu-header-text">Main pages</span>
        </li>
        <!-- Forms -->
        @if(hasPermission(['categories.index', 'categories.create', 'categories.edit', 'categories.delete']))
            <li class="menu-item @if (request()->routeIs('categories.index')) active @endif">
                <a href="{{ route('categories.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-category"></i>
                    <div>Category</div>
                </a>
            </li>
        @endif

        @if(hasPermission(['products.index', 'products.create', 'products.edit', 'products.delete']))
            <li class="menu-item @if (request()->routeIs('products.index')) active @endif">
                <a href="{{ route('products.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-shopping-cart"></i>
                    <div>Products</div>
                </a>
            </li>
        @endif

        {{-- purchase --}}
        @if(hasPermission(['purchases.index', 'purchases.create', 'purchases.edit', 'purchases.delete']))
            <li class="menu-item @if (request()->routeIs('purchases.index')) active @endif">
                <a href="{{ route('purchases.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-shopping-cart"></i>
                    <div>Purchases</div>
                </a>
            </li>
        @endif

        {{-- sales --}}
        @if(hasPermission(['sales.index', 'sales.create', 'sales.edit', 'sales.delete']))
            <li class="menu-item @if (request()->routeIs('sales.index')) active @endif">
                <a href="{{ route('sales.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-shopping-cart"></i>
                    <div>Sales</div>
                </a>
            </li>
        @endif

        @if(hasPermission(['suppliers.index', 'suppliers.create', 'suppliers.edit', 'suppliers.delete']))
            <li class="menu-item @if (request()->routeIs('suppliers.index')) active @endif">
                <a href="{{ route('suppliers.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-users-group"></i>
                    <div>Suppliers</div>
                </a>
            </li>
        @endif

        @if(hasPermission(['contacts.index', 'contacts.delete']))
            <li class="menu-item {{ request()->routeIs('contacts.index') ? 'active' : '' }} ">
                <a href="{{ route('contacts.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-message"></i>
                    <div>Contact Us</div>
                </a>
            </li>
        @endif

        <li class="menu-header small">
            <span class="menu-header-text">Role & Permission</span>
        </li>

        @if(hasPermission(['roles.index', 'roles.create', 'roles.edit', 'roles.delete']))
            <li class="menu-item {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                <a href="{{ route('roles.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-users"></i>
                    <div>Roles</div>
                </a>
            </li>
        @endif

        @if(hasPermission(['users.index', 'users.create', 'users.edit', 'users.delete']))
            <li class="menu-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-user"></i>
                    <div>Users</div>
                </a>
            </li>
        @endif

        <!-- pages -->

        <li class="menu-header small">
            <span class="menu-header-text">Recycle Bin</span>
        </li>
        <!-- Forms -->
        <li class="menu-item {{ request()->routeIs('*.recycleBin') ? 'open active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-recycle"></i>
                <div>Recycle Bin</div>
            </a>
            <ul class="menu-sub">
                @if (hasPermission(['categories.destroy'])) 
                    <li class="menu-item {{ request()->routeIs('categories.recycleBin') ? 'active' : '' }}">
                        <a href="{{ route('categories.recycleBin') }}" class="menu-link">
                            <div>Category</div>
                        </a>
                    </li>
                @endif
                @if (hasPermission(['suppliers.destroy'])) 
                    <li class="menu-item {{ request()->routeIs('suppliers.recycleBin') ? 'active' : '' }}">
                        <a href="{{ route('suppliers.recycleBin') }}" class="menu-link">
                            <div>Supplier</div>
                        </a>
                    </li>
                @endif
                @if (hasPermission(['purchases.destroy'])) 
                    <li class="menu-item {{ request()->routeIs('purchases.recycleBin') ? 'active' : '' }}">
                        <a href="{{ route('purchases.recycleBin') }}" class="menu-link">
                            <div>Purchases</div>
                        </a>
                    </li>
                @endif
                @if (hasPermission(['sales.destroy'])) 
                    <li class="menu-item {{ request()->routeIs('sales.recycleBin') ? 'active' : '' }}">
                        <a href="{{ route('sales.recycleBin') }}" class="menu-link">
                            <div>Sales</div>
                        </a>
                    </li>
                @endif
                @if (hasPermission(['contacts.destroy'])) 
                    <li class="menu-item {{ request()->routeIs('contacts.recycleBin') ? 'open active' : '' }}">
                        <a href="{{ route('contacts.recycleBin') }}" class="menu-link">
                            <div>Contacts</div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    </ul>
</aside>

<div class="menu-mobile-toggler d-xl-none rounded-1">
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
        <i class="ti tabler-menu icon-base"></i>
        <i class="ti tabler-chevron-right icon-base"></i>
    </a>
</div>
