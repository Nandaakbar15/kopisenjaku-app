@extends('customers.layouts.main')

@section('title', 'Detail ' . $menu->name . ' - Kopi Senjaku')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 border-b border-gray-200 animate-fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('customers') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-amber-800">
                            <i class="fas fa-home mr-2"></i>Beranda
                        </a>
                    </li>
                    <li class="inline-flex items-center">
                        <span class="inline-flex items-center text-gray-500 mx-2">/</span>
                        <a href="{{ route('customers') }}/menu"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-amber-800">
                            Menu
                        </a>
                    </li>
                    <li class="inline-flex items-center">
                        <span class="inline-flex items-center text-gray-500 mx-2">/</span>
                        <span
                            class="inline-flex items-center text-sm font-medium text-gray-500">{{ Str::limit($menu->name, 30) }}</span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Detail Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <!-- Product Image -->
                <div class="flex items-center justify-center">
                    <div class="w-full bg-gray-100 rounded-xl overflow-hidden shadow-xl p-4">
                        <img src="{{ $menu->image ? asset($menu->image) : 'https://images.unsplash.com/photo-1559056199-641a0ac8b3f7?w=600&h=600&fit=crop' }}"
                            alt="{{ $menu->name }}" class="w-full h-auto object-cover rounded-lg" id="mainImage">
                    </div>
                </div>

                <!-- Product Details -->
                <div class="space-y-6">
                    <!-- Category Badge -->
                    <div>
                        <span class="inline-block bg-amber-100 text-amber-800 px-4 py-2 rounded-full text-sm font-semibold">
                            {{ $menu->categories ? $menu->categories->name : 'Uncategorized' }}
                        </span>
                    </div>

                    <!-- Product Name -->
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-2">{{ $menu->name }}</h1>
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center gap-3">
                        <div class="flex gap-1">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star-half-alt text-yellow-400"></i>
                        </div>
                        <span class="text-gray-500 text-sm">(24 ulasan)</span>
                    </div>

                    <!-- Price -->
                    <div class="pt-4 border-t-2 border-gray-200">
                        <p class="text-gray-600 text-sm mb-2">Harga</p>
                        <h2 class="text-4xl font-bold text-amber-800">Rp {{ number_format($menu->price, 0, ',', '.') }}</h2>
                    </div>

                    <!-- Stock Status -->
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <p class="text-green-800 font-semibold">
                            <i class="fas fa-check-circle mr-2"></i>Stok Tersedia
                        </p>
                    </div>

                    <!-- Description -->
                    <div class="bg-gray-50 rounded-lg p-6 border-l-4 border-amber-800">
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Deskripsi Produk</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $menu->description }}</p>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <label class="text-gray-700 font-semibold">Jumlah:</label>
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button class="px-4 py-2 text-gray-600 hover:text-amber-800 hover:bg-gray-100 transition"
                                    id="decreaseBtn">−</button>
                                <input type="number" id="quantityInput"
                                    class="w-16 text-center border-l border-r border-gray-300 py-2 text-gray-900 outline-none"
                                    value="1" min="1">
                                <button class="px-4 py-2 text-gray-600 hover:text-amber-800 hover:bg-gray-100 transition"
                                    id="increaseBtn">+</button>
                            </div>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <button
                        class="w-full bg-gradient-to-r from-amber-800 to-yellow-800 text-white font-bold py-4 rounded-lg hover:from-amber-900 hover:to-yellow-900 transition-all duration-300 text-lg flex items-center justify-center gap-2 shadow-lg hover:shadow-xl">
                        <i class="fas fa-shopping-cart"></i>Tambah ke Keranjang
                    </button>

                    <!-- Additional Info -->
                    <div class="space-y-3 pt-6 border-t border-gray-200">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-box text-amber-800 text-xl mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-900">Berat</p>
                                <p class="text-gray-600">~250g</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-shipping-fast text-amber-800 text-xl mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-900">Pengiriman</p>
                                <p class="text-gray-600">Gratis ongkir untuk pembelian di atas Rp 50.000</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-undo text-amber-800 text-xl mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-900">Garansi</p>
                                <p class="text-gray-600">100% kepuasan atau uang kembali</p>
                            </div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="pt-6 border-t border-gray-200">
                        <a href="/customers/menu"
                            class="inline-block px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition-all duration-300 items-center gap-2">
                            <i class="fas fa-arrow-left"></i>Kembali ke Menu
                        </a>
                    </div>

                    <!-- Share Section -->
                    <div class="pt-6 border-t border-gray-200">
                        <p class="font-semibold text-gray-900 mb-3">Bagikan ke:</p>
                        <div class="flex gap-3">
                            <a href="#"
                                class="w-10 h-10 rounded-full border border-gray-300 text-gray-600 hover:text-amber-800 hover:border-amber-800 flex items-center justify-center transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-full border border-gray-300 text-gray-600 hover:text-amber-800 hover:border-amber-800 flex items-center justify-center transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-full border border-gray-300 text-gray-600 hover:text-amber-800 hover:border-amber-800 flex items-center justify-center transition">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-full border border-gray-300 text-gray-600 hover:text-amber-800 hover:border-amber-800 flex items-center justify-center transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if ($relatedMenus && count($relatedMenus) > 0)
                <div class="mt-16 pt-12 border-t-2 border-gray-200">
                    <h2 class="text-3xl font-bold text-amber-900 mb-8">Menu Sejenis Lainnya</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($relatedMenus as $related)
                            <div
                                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                <div class="relative overflow-hidden h-48 bg-gray-200">
                                    <img src="{{ $related->image ? asset($related->image) : 'https://images.unsplash.com/photo-1559056199-641a0ac8b3f7?w=400&h=400&fit=crop' }}"
                                        alt="{{ $related->name }}"
                                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                                    <span
                                        class="absolute top-3 right-3 bg-amber-800 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $related->categories?->name ?? 'Uncategorized' }}
                                    </span>
                                </div>
                                <div class="p-5 flex flex-col h-full">
                                    <h5 class="text-lg font-bold text-gray-900 mb-2">{{ $related->name }}</h5>
                                    <p class="text-gray-600 text-sm mb-4 flex-grow">
                                        {{ Str::limit($related->description, 80) }}</p>
                                    <div class="flex justify-between items-center border-t border-gray-200 pt-4">
                                        <span class="text-xl font-bold text-amber-800">Rp
                                            {{ number_format($related->price, 0, ',', '.') }}</span>
                                        <a href="{{ route('customers') }}/detailMenu/{{ $related->id }}"
                                            class="w-10 h-10 rounded-full bg-gradient-to-r from-amber-800 to-yellow-800 text-white flex items-center justify-center hover:shadow-lg transition-all">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        const decreaseBtn = document.getElementById('decreaseBtn');
        const increaseBtn = document.getElementById('increaseBtn');
        const quantityInput = document.getElementById('quantityInput');

        decreaseBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            if (value > 1) {
                quantityInput.value = value - 1;
            }
        });

        increaseBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            quantityInput.value = value + 1;
        });

        quantityInput.addEventListener('change', function() {
            if (this.value < 1) {
                this.value = 1;
            }
        });
    </script>
@endsection
