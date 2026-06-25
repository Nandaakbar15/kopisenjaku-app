<nav class="sticky top-0 z-50 bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="{{ route('customers') }}" class="flex items-center gap-2 font-bold text-xl">
                <i class="fas fa-coffee text-amber-800"></i>
                <span class="text-amber-800">Kopi Senjaku</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('customers') }}"
                    class="text-gray-800 hover:text-amber-800 font-medium transition">Beranda</a>
                <a href="/customers/menu" class="text-gray-800 hover:text-amber-800 font-medium transition">Menu</a>
                <a href="/customers/galleries"
                    class="text-gray-800 hover:text-amber-800 font-medium transition">Galeri</a>
                <a href="/customers/tentang"
                    class="text-gray-800 hover:text-amber-800 font-medium transition">Tentang</a>
                <a href="/customers/contacts"
                    class="text-gray-800 hover:text-amber-800 font-medium transition">Kontak</a>
            </div>

            <!-- Auth Buttons -->
            <div class="hidden md:flex items-center gap-3">
                <a href="{{ url('/loginPage') }}"
                    class="px-4 py-2 text-amber-800 border border-amber-800 rounded-lg hover:bg-amber-50 transition font-medium">
                    Login
                </a>
                <a href="/customers/menu/orders"
                    class="px-4 py-2 bg-amber-800 text-white rounded-lg hover:bg-amber-900 transition font-medium">
                    <i class="fas fa-shopping-cart mr-1"></i>Pesan
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-gray-800" id="mobileMenuBtn">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden pb-4 space-y-2">
            <a href="{{ route('customers') }}"
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 rounded">Beranda</a>
            <a href="{{ route('customers') }}/menu"
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 rounded">Menu</a>
            <a href="{{ route('customers') }}/galleries"
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 rounded">Galeri</a>
            <a href="#tentang" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 rounded">Tentang</a>
            <a href="#kontak" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 rounded">Kontak</a>
            <div class="px-4 py-2 space-y-2">
                <a href="{{ url('/loginPage') }}"
                    class="block px-4 py-2 text-center text-amber-800 border border-amber-800 rounded-lg hover:bg-amber-50 transition font-medium">
                    Login
                </a>
                <a href="{{ route('customers') }}/menu"
                    class="block px-4 py-2 text-center bg-amber-800 text-white rounded-lg hover:bg-amber-900 transition font-medium">
                    <i class="fas fa-shopping-cart mr-1"></i>Pesan
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
