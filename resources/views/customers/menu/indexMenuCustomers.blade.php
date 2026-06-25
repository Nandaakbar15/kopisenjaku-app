@extends('customers.layouts.main')

@section('title', 'Menu - Kopi Senjaku')

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
                        <span class="inline-flex items-center text-sm font-medium text-gray-500">Menu</span>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Menu Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-amber-900 mb-4">Menu Kami</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Rasakan kelezatan kopi dengan varian yang beragam dan menarik. Setiap secangkir kopi dibuat dengan penuh
                    cinta dan perhatian terhadap detail.
                </p>
            </div>

            <!-- Menu Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @forelse($menu as $item)
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden h-48 bg-gray-200">
                            <img src="{{ $item->image ? asset($item->image) : 'https://images.unsplash.com/photo-1559056199-641a0ac8b3f7?w=400&h=400&fit=crop' }}"
                                alt="{{ $item->name }}"
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                            <span
                                class="absolute top-3 right-3 bg-amber-800 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $item->categories?->name ?? 'Uncategorized' }}
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="p-5 flex flex-col h-full">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $item->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4 flex-grow line-clamp-2">
                                {{ Str::limit($item->description, 80) }}
                            </p>

                            <!-- Footer -->
                            <div class="flex justify-between items-center border-t border-gray-200 pt-4">
                                <span class="text-2xl font-bold text-amber-800">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </span>
                                <a href="{{ route('customers') }}/detailMenu/{{ $item->id }}"
                                    class="w-10 h-10 rounded-full bg-gradient-to-r from-amber-800 to-yellow-800 text-white flex items-center justify-center hover:shadow-lg transition-all">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <i class="fas fa-inbox text-gray-400 text-5xl mb-4"></i>
                        <p class="text-gray-500 text-lg">Menu belum tersedia</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-8">
                <div class="inline-flex space-x-2">
                    {{ $menu->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        /* Tailwind line-clamp polyfill if needed */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
