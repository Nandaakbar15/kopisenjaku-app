@extends('dashboardAdmin.layouts.main')

@section('content')
<div class="space-y-8">
    <!-- Page Header -->
    <div class="anim-fade-up" style="animation-delay: 0.05s;">
        <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Dashboard</h1>
        <p class="text-slate-600 mt-2">Selamat datang kembali, <span class="font-semibold">{{ $username ?? 'Admin' }}</span>!</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 anim-scale-in" style="animation-delay: 0.1s;">
        <!-- Total Menu Card -->
        <div class="stat-card primary">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-slate-600 font-medium mb-1">Total Menu</p>
                    <p class="text-2xl font-bold text-slate-900 count-up" data-target="24" data-decimal="0">0</p>
                </div>
                <div class="stat-icon-wrap">
                    <i class="fa-solid fa-utensils"></i>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="trend-badge trend-up">
                    <i class="fa-solid fa-arrow-up text-xs"></i>
                    12%
                </span>
                <span class="text-xs text-slate-500">dari bulan lalu</span>
            </div>
        </div>

        <!-- Total Kategori Card -->
        <div class="stat-card success">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-slate-600 font-medium mb-1">Total Kategori</p>
                    <p class="text-2xl font-bold text-slate-900 count-up" data-target="8" data-decimal="0">0</p>
                </div>
                <div class="stat-icon-wrap">
                    <i class="fa-solid fa-tags"></i>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="trend-badge trend-up">
                    <i class="fa-solid fa-arrow-up text-xs"></i>
                    8%
                </span>
                <span class="text-xs text-slate-500">dari bulan lalu</span>
            </div>
        </div>

        <!-- Total Galeri Card -->
        <div class="stat-card warning">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-slate-600 font-medium mb-1">Total Galeri</p>
                    <p class="text-2xl font-bold text-slate-900 count-up" data-target="15" data-decimal="0">0</p>
                </div>
                <div class="stat-icon-wrap">
                    <i class="fa-solid fa-images"></i>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="trend-badge trend-down">
                    <i class="fa-solid fa-arrow-down text-xs"></i>
                    5%
                </span>
                <span class="text-xs text-slate-500">dari bulan lalu</span>
            </div>
        </div>

        <!-- Total Kontak Card -->
        <div class="stat-card danger">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm text-slate-600 font-medium mb-1">Total Kontak</p>
                    <p class="text-2xl font-bold text-slate-900 count-up" data-target="42" data-decimal="0">0</p>
                </div>
                <div class="stat-icon-wrap">
                    <i class="fa-solid fa-envelope"></i>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="trend-badge trend-up">
                    <i class="fa-solid fa-arrow-up text-xs"></i>
                    3%
                </span>
                <span class="text-xs text-slate-500">dari bulan lalu</span>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="panel anim-slide-right" style="animation-delay: 0.15s;">
        <div class="panel-header">
            <h2 class="text-lg font-semibold text-slate-900">Informasi Aplikasi</h2>
        </div>
        <div class="panel-body">
            <p class="text-slate-600 text-sm leading-relaxed">
                Selamat datang di Dashboard Admin Kopi Senjaku. Gunakan menu di sebelah kiri untuk mengelola data menu, kategori, galeri, dan pesan kontak dari pengunjung.
            </p>
        </div>
    </div>
</div>
@endsection
