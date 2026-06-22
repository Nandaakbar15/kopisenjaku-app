<header class="top-bar">
    <div class="flex items-center justify-between px-6 py-3.5">
        <div class="flex items-center gap-4">
            <button
                class="lg:hidden w-9 h-9 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors"
                onclick="toggleSidebar()">
                <i class="fa-solid fa-bars text-sm"></i>
            </button>
            <button
                class="hidden lg:flex w-9 h-9 items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-500 hover:bg-slate-50 hover:text-slate-700 transition-all"
                onclick="toggleSidebar()" title="Toggle sidebar">
                <i class="fa-solid fa-bars-staggered text-xs"></i>
            </button>
            <div class="search-box hidden md:flex">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Cari sesuatu..." id="searchInput" class="search-input">
            </div>
        </div>

        <div class="flex items-center gap-2.5">
            <button class="notif-btn">
                <i class="fa-regular fa-bell text-sm"></i>
                <span class="notif-dot"></span>
            </button>
            <button class="notif-btn hidden sm:flex">
                <i class="fa-regular fa-envelope text-sm"></i>
            </button>

            <!-- User Dropdown with Alpine.js Animation -->
            <div x-data="{ dropdownOpen: false }" class="relative hidden sm:block">
                <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false"
                    class="user-pill flex transition-all duration-200">
                    <div class="text-right user-info">
                        <p class="text-sm font-semibold text-slate-800 leading-tight">{{ $username ?? 'Admin' }}</p>
                        <p class="text-xs text-slate-400 leading-tight">Admin</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face"
                        alt="Profile">
                    <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 mr-1 transition-transform duration-200"
                        :class="{ 'rotate-180': dropdownOpen }"></i>
                </button>

                <!-- Dropdown menu with Animation -->
                <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                    class="absolute right-0 mt-2 w-44 bg-white divide-y divide-gray-100 rounded-lg shadow-lg dark:bg-gray-700 dark:divide-gray-600 z-50">

                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>{{ $username ?? 'Admin' }}</div>
                        <div class="font-medium truncate">Admin</div>
                    </div>

                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition-colors duration-150">
                                <i class="fa-solid fa-user mr-2"></i>Profile
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition-colors duration-150">
                                <i class="fa-solid fa-gear mr-2"></i>Settings
                            </a>
                        </li>
                    </ul>

                    <div class="py-1">
                        <form action="/logout" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit"
                                class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white transition-colors duration-150">
                                <i class="fa-solid fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
