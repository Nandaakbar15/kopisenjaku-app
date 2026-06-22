@extends('dashboardAdmin.layouts.main')

@section('content')
    <div class="space-y-8">
        <div class="anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Halaman data kategori</h1>
        </div>

        <div class="w-full max-w-full bg-white rounded-lg shadow-lg p-6 sm:p-8 anim-fade-up">
            <form action="/dashboard/categories/add_categories" method="POST">
                @csrf
                <div class="max-w-2xl space-y-6">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-heading">Name Categories <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg focus:ring-brand focus:border-brand block w-full px-4 py-3 shadow-xs placeholder:text-body focus:outline-none"
                            placeholder="masukan nama kategori" required />
                    </div>

                    <div>
                        <button type="submit"
                            class="text-white bg-blue-500 box-border border border-transparent hover:bg-blue-700 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-lg text-sm px-5 py-2.5 focus:outline-none transition-colors">
                            Tambah!
                        </button>
                    </div>

                    <div>
                        <a href="/dashboard/categories/categories_data"
                            class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-slate-500 hover:bg-slate-700">
                            Kembali
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
