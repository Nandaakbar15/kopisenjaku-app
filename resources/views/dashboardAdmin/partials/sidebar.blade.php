<aside class="sidebar" id="sidebar">
    <div class="relative h-full flex flex-col">
        <!-- Logo -->
        <div class="flex items-center gap-3 px-5 pt-6 pb-5">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" style="background: #5a5ce8;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3" />
                    <path
                        d="M12 1v6m0 6v10m-7.07-13.93l4.24 4.24m5.66 5.66l4.24 4.24M1 12h6m6 0h10m-13.93 7.07l4.24-4.24m5.66-5.66l4.24-4.24" />
                </svg>
            </div>
            <span class="logo-text font-display font-bold text-white text-lg tracking-tight"
                style="transition: opacity 0.3s ease;">Kopi Senjaku App</span>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto px-1 pb-4" style="scrollbar-width: thin;">
            <div class="section-label">Menu Utama</div>
            <a href="/dashboard/home" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                onclick="setActive(this)">
                <i class="fa-solid fa-grid-2"></i>
                <span class="nav-text">Dashboard</span>
                <span class="nav-tooltip">Dashboard</span>
            </a>

            <div class="section-label mt-6">Data Master</div>

            <a href="/dashboard/categories/categories_data"
                class="nav-item {{ request()->is('dashboard/categories*') ? 'active' : '' }}" onclick="setActive(this)">
                <i class="fa-solid fa-tags"></i>
                <span class="nav-text">Kategori</span>
                <span class="nav-tooltip">Kategori</span>
            </a>

            <a href="/dashboard/menu/menu_data" class="nav-item {{ request()->is('dashboard/menu*') ? 'active' : '' }}"
                onclick="setActive(this)">
                <i class="fa-solid fa-utensils"></i>
                <span class="nav-text">Menu</span>
                <span class="nav-tooltip">Menu</span>
            </a>

            <a href="/dashboard/galleries/galleries_data"
                class="nav-item {{ request()->is('dashboard/galleries*') ? 'active' : '' }}" onclick="setActive(this)">
                <i class="fa-solid fa-images"></i>
                <span class="nav-text">Galeri</span>
                <span class="nav-tooltip">Galeri</span>
            </a>

            <a href="/dashboard/reservations/reservations_data"
                class="nav-item {{ request()->is('dashboard/reservations*') ? 'active' : '' }}"
                onclick="setActive(this)">
                <i class="fa-solid fa-images"></i>
                <span class="nav-text">Reservation</span>
                <span class="nav-tooltip">Reservation</span>
            </a>

            <a href="/dashboard/orders/order_data"
                class="nav-item {{ request()->is('dashboard/orders*') ? 'active' : '' }}" onclick="setActive(this)">
                <i class="fa-solid fa-images"></i>
                <span class="nav-text">Order</span>
                <span class="nav-tooltip">Order</span>
            </a>


            <div class="section-label mt-6">Komunikasi</div>
            <a href="/dashboard/contacts/contacts_data"
                class="nav-item {{ request()->is('dashboard/contacts*') ? 'active' : '' }}" onclick="setActive(this)">
                <i class="fa-solid fa-envelope"></i>
                <span class="nav-text">Informasi Kontak</span>
                <span class="nav-tooltip">Informasi Kontak</span>
            </a>
        </nav>

        <!-- User Card -->
        <div class="sidebar-user">
            <div class="flex items-center gap-3">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face"
                    alt="Admin" class="w-9 h-9 rounded-xl object-cover flex-shrink-0">
                <div class="user-info min-w-0">
                    <p class="text-white text-sm font-semibold truncate">{{ $username ?? 'Admin' }}</p>
                    <p class="text-slate-500 text-xs truncate">Administrator</p>
                </div>
                <button class="ml-auto text-slate-500 hover:text-white transition-colors flex-shrink-0"
                    onclick="toggleSidebar()" title="Collapse">
                    <i class="fa-solid fa-angles-left text-xs"></i>
                </button>
            </div>
        </div>
    </div>
</aside>
