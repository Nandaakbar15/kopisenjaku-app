<footer class="bg-gradient-to-r from-amber-900 to-yellow-900 text-white" id="kontak">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Brand Section -->
            <div>
                <h5 class="text-xl font-bold text-yellow-400 mb-4">Kopi Senjaku</h5>
                <p class="text-gray-200 text-sm leading-relaxed mb-4">
                    Pengalaman kopi premium dengan biji pilihan terbaik dari seluruh Indonesia.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="w-10 h-10 rounded-full bg-yellow-400 text-amber-900 flex items-center justify-center hover:bg-white transition" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-yellow-400 text-amber-900 flex items-center justify-center hover:bg-white transition" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-yellow-400 text-amber-900 flex items-center justify-center hover:bg-white transition" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-yellow-400 text-amber-900 flex items-center justify-center hover:bg-white transition" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h5 class="text-lg font-bold text-yellow-400 mb-4">Menu Cepat</h5>
                <ul class="space-y-2">
                    <li><a href="{{ route('customers') }}" class="text-gray-200 hover:text-yellow-400 transition">Beranda</a></li>
                    <li><a href="{{ route('customers') }}/menu" class="text-gray-200 hover:text-yellow-400 transition">Menu</a></li>
                    <li><a href="{{ route('customers') }}/galleries" class="text-gray-200 hover:text-yellow-400 transition">Galeri</a></li>
                    <li><a href="#tentang" class="text-gray-200 hover:text-yellow-400 transition">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h5 class="text-lg font-bold text-yellow-400 mb-4">Hubungi Kami</h5>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-2">
                        <i class="fas fa-map-marker-alt text-yellow-400 mt-1 flex-shrink-0"></i>
                        <span class="text-gray-200">Jl. Kopi Sejati No. 123, Jakarta</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-phone text-yellow-400"></i>
                        <a href="tel:+62812345678" class="text-gray-200 hover:text-yellow-400 transition">+62 812 345 678</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-envelope text-yellow-400"></i>
                        <a href="mailto:info@kopisenjaku.com" class="text-gray-200 hover:text-yellow-400 transition">info@kopisenjaku.com</a>
                    </li>
                </ul>
            </div>

            <!-- Operating Hours -->
            <div>
                <h5 class="text-lg font-bold text-yellow-400 mb-4">Jam Operasional</h5>
                <ul class="space-y-2 text-sm text-gray-200">
                    <li>Senin - Jumat: 07:00 - 22:00</li>
                    <li>Sabtu: 08:00 - 23:00</li>
                    <li>Minggu: 08:00 - 22:00</li>
                    <li class="text-green-300 mt-3">
                        <i class="fas fa-check-circle"></i> Buka Sekarang
                    </li>
                </ul>
            </div>
        </div>

        <hr class="border-amber-800 my-8">

        <!-- Bottom Footer -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center text-sm">
            <p class="text-center md:text-left text-gray-200">&copy; 2026 Kopi Senjaku. Semua hak cipta dilindungi.</p>
            <div class="flex flex-wrap justify-center md:justify-end gap-4 text-gray-200">
                <a href="#" class="hover:text-yellow-400 transition">Kebijakan Privasi</a>
                <a href="#" class="hover:text-yellow-400 transition">Syarat & Ketentuan</a>
                <a href="#" class="hover:text-yellow-400 transition">Hubungi Kami</a>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-r from-amber-800 to-yellow-800 text-white rounded-full shadow-lg hover:shadow-xl transition opacity-0 invisible" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>

<script>
    const backToTopBtn = document.getElementById('backToTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.remove('opacity-0', 'invisible');
            backToTopBtn.classList.add('opacity-100', 'visible');
        } else {
            backToTopBtn.classList.add('opacity-0', 'invisible');
            backToTopBtn.classList.remove('opacity-100', 'visible');
        }
    });
    
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
