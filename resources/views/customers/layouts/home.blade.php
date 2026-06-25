@extends('customers.layouts.main')

@section('title', 'Home - Kopi Senjaku')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-amber-800 via-yellow-800 to-amber-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-400 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="space-y-6 animate-fade-up">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                        Nikmati Kopi Terbaik Indonesia
                    </h1>
                    <p class="text-lg md:text-xl text-yellow-100">
                        Kopi Senjaku menghadirkan pengalaman kopi premium dengan biji pilihan dari berbagai daerah di Indonesia.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="/customers/menu" class="px-8 py-3 bg-yellow-400 text-amber-900 font-bold rounded-lg hover:bg-white transition inline-flex items-center justify-center gap-2">
                            <i class="fas fa-coffee"></i>Lihat Menu
                        </a>
                        <a href="#tentang" class="px-8 py-3 bg-transparent border-2 border-yellow-400 text-white font-bold rounded-lg hover:bg-yellow-400 hover:text-amber-900 transition inline-flex items-center justify-center gap-2">
                            <i class="fas fa-info-circle"></i>Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
                <div class="animate-fade-in">
                    <img src="https://images.unsplash.com/photo-1559056199-641a0ac8b3f7?w=500&h=500&fit=crop" alt="Kopi Premium" class="w-full rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-amber-900 mb-3">Menu Pilihan</h2>
                <p class="text-gray-600 text-lg">Rasakan kelezatan kopi dengan varian yang beragam</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @php
                    $featuredMenus = \App\Models\Menu::where('status', 'active')->limit(3)->get();
                @endphp
                
                @forelse($featuredMenus as $menu)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:scale-105 duration-300">
                        <div class="relative overflow-hidden h-48">
                            <img src="{{ $menu->image ? asset($menu->image) : 'https://images.unsplash.com/photo-1559056199-641a0ac8b3f7?w=400&h=400&fit=crop' }}" 
                                 alt="{{ $menu->name }}" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                            <span class="absolute top-4 right-4 bg-amber-800 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $menu->categories?->name ?? 'Uncategorized' }}
                            </span>
                        </div>
                        <div class="p-5">
                            <h5 class="text-xl font-bold text-gray-900 mb-2">{{ $menu->name }}</h5>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($menu->description, 80) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-amber-800">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                                <a href="/customers/detailMenu/{{ $menu->id }}" class="w-10 h-10 bg-gradient-to-r from-amber-800 to-yellow-800 text-white rounded-full flex items-center justify-center hover:shadow-lg transition">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-gray-500">Menu belum tersedia</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center">
                <a href="/customers/menu" class="inline-block px-8 py-3 bg-amber-800 text-white font-bold rounded-lg hover:bg-amber-900 transition">
                    Lihat Semua Menu <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-20" id="gallery">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-amber-900 mb-3">Galeri Kami</h2>
                <p class="text-gray-600 text-lg">Lihat suasana nyaman di kafe kami</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @php
                    $galleries = \App\Models\Galleries::limit(6)->get();
                @endphp

                @forelse($galleries as $gallery)
                    <div class="relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition group h-64">
                        <img src="{{ $gallery->image ? asset($gallery->image) : 'https://images.unsplash.com/photo-1495474472645-4d71bcdd2085?w=400&h=400&fit=crop' }}" 
                             alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <div class="text-center">
                                <h5 class="text-xl font-bold text-white">{{ $gallery->title }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-gray-500">Galeri belum tersedia</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center">
                <a href="/customers/galleries" class="inline-block px-8 py-3 bg-amber-800 text-white font-bold rounded-lg hover:bg-amber-900 transition">
                    Lihat Semua Galeri <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-gray-50" id="tentang">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1447933601403-0c6688950566?w=500&h=500&fit=crop" alt="Tentang Kopi Senjaku" class="w-full rounded-xl shadow-xl">
                </div>
                <div class="space-y-6">
                    <h2 class="text-3xl md:text-4xl font-bold text-amber-900">Tentang Kopi Senjaku</h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Kopi Senjaku adalah kafé premium yang didirikan dengan misi untuk membawa pengalaman kopi terbaik kepada masyarakat Indonesia. Kami memilih biji kopi dari berbagai daerah penghasil kopi terbaik di nusantara.
                    </p>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Setiap secangkir kopi yang kami sajikan adalah hasil dari proses seleksi ketat, pemanggangan sempurna, dan penyajian dengan teknik terkini. Kami berkomitmen untuk memberikan pengalaman kopi yang tak terlupakan.
                    </p>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-star text-yellow-500 text-2xl"></i>
                            <span class="text-gray-700 font-semibold">Biji Kopi Premium</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-leaf text-green-600 text-2xl"></i>
                            <span class="text-gray-700 font-semibold">100% Alami</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-heartbeat text-red-500 text-2xl"></i>
                            <span class="text-gray-700 font-semibold">Kesehatan Terjaga</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-16 bg-gradient-to-r from-amber-800 to-yellow-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-yellow-400 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Merasakan Kopi Istimewa?</h2>
            <p class="text-lg text-yellow-100 mb-8 max-w-2xl mx-auto">
                Kunjungi kafe kami atau pesan online untuk pengalaman terbaik
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('customers') }}/menu" class="px-8 py-3 bg-white text-amber-900 font-bold rounded-lg hover:bg-yellow-100 transition inline-flex items-center justify-center gap-2">
                    <i class="fas fa-shopping-cart"></i>Pesan Sekarang
                </a>
                <a href="#kontak" class="px-8 py-3 bg-transparent border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-amber-900 transition inline-flex items-center justify-center gap-2">
                    <i class="fas fa-phone"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-gradient-to-r from-amber-900 to-yellow-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center p-6 bg-white bg-opacity-10 rounded-lg backdrop-blur-sm">
                    <h3 class="text-4xl font-bold text-yellow-400 mb-2">500+</h3>
                    <p class="text-lg text-yellow-100">Pelanggan Puas</p>
                </div>
                <div class="text-center p-6 bg-white bg-opacity-10 rounded-lg backdrop-blur-sm">
                    <h3 class="text-4xl font-bold text-yellow-400 mb-2">50+</h3>
                    <p class="text-lg text-yellow-100">Menu Pilihan</p>
                </div>
                <div class="text-center p-6 bg-white bg-opacity-10 rounded-lg backdrop-blur-sm">
                    <h3 class="text-4xl font-bold text-yellow-400 mb-2">10+</h3>
                    <p class="text-lg text-yellow-100">Tahun Berpengalaman</p>
                </div>
                <div class="text-center p-6 bg-white bg-opacity-10 rounded-lg backdrop-blur-sm">
                    <h3 class="text-4xl font-bold text-yellow-400 mb-2">100%</h3>
                    <p class="text-lg text-yellow-100">Kepuasan Dijamin</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.8s ease-out forwards;
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out 0.2s forwards;
            opacity: 0;
        }
    </style>
@endsection
