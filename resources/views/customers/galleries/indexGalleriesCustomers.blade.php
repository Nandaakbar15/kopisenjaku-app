@extends('customers.layouts.main')

@section('title', 'Galeri - Kopi Senjaku')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 border-b border-gray-200 anim-fade-up" style="animation-delay: 0.05s">
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
                        <span class="inline-flex items-center text-sm font-medium text-gray-500">Galeri</span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Gallery Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-amber-900 mb-4">Galeri Kami</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Lihat koleksi foto dan suasana nyaman di kafe Kopi Senjaku
                </p>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @forelse($galleries as $gallery)
                    <div
                        class="relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 group h-64 bg-gray-200">
                        <img src="{{ $gallery->image ? asset($gallery->image) : 'https://images.unsplash.com/photo-1495474472645-4d71bcdd2085?w=400&h=400&fit=crop' }}"
                            alt="{{ $gallery->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">

                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                            <div class="w-full p-6 text-white">
                                <h3 class="text-xl font-bold">{{ $gallery->title }}</h3>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <i class="fas fa-image text-gray-400 text-6xl mb-4 block"></i>
                        <p class="text-gray-500 text-lg">Galeri belum tersedia</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($galleries->hasPages())
                <div class="flex justify-center mt-12">
                    <div class="inline-flex">
                        {{ $galleries->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-amber-800 to-yellow-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ingin Melihat Langsung?</h2>
            <p class="text-lg text-yellow-100 mb-8 max-w-2xl mx-auto">
                Kunjungi kafe kami dan rasakan sendiri suasana yang menyenangkan bersama kopi terbaik
            </p>
            <a href="#kontak"
                class="inline-block px-8 py-3 bg-white text-amber-900 font-bold rounded-lg hover:bg-yellow-100 transition">
                <i class="fas fa-map-marker-alt mr-2"></i>Temukan Lokasi Kami
            </a>
        </div>
    </section>
@endsection
