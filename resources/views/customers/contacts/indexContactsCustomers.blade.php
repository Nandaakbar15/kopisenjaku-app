@extends('customers.layouts.main')

@section('Contacts - Kopi Senjaku')

@section('content')
    <!-- Gallery Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-amber-900 mb-4">Kontak kami</h1>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @forelse($contacts as $item)
                    <!-- Pembungkus Utama per Item Kontak (Satu kolom grid penuh) -->
                    <div class="flex flex-col bg-white p-4 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">

                        <!-- Bagian Foto Profile -->
                        <div class="relative overflow-hidden rounded-xl h-64 bg-gray-200 mb-4 group">
                            <img src="{{ asset('images/profile-dummy.png') }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                alt="Profile">
                        </div>

                        <!-- Bagian Teks Detail (Sekarang aman berada di bawah foto) -->
                        <div class="px-2">
                            <h3 class="text-xl font-bold text-gray-800 break-words mb-1">{{ $item->email }}</h3>
                            <p class="text-slate-500 font-medium text-sm">{{ $item->phone }}</p>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <i class="fas fa-image text-gray-400 text-6xl mb-4 block"></i>
                        <p class="text-gray-500 text-lg">Kontak belum tersedia</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($contacts->hasPages())
                <div class="flex justify-center mt-12">
                    <div class="inline-flex">
                        {{ $contacts->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
