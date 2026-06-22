@extends('dashboardAdmin.layouts.main')

@section('content')
    <div class="space-y-8">
        <div class="anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Tambah Galleri Baru</h1>
            <p class="text-slate-600 mt-2">Tambahkan galleri kafe</p>
        </div>

        <div class="w-full max-w-full bg-white rounded-lg shadow-lg p-6 sm:p-8 anim-fade-up" style="animation-delay: 0.1s;">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-red-800 font-semibold mb-2">Terjadi kesalahan:</p>
                    <ul class="text-red-700 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/dashboard/galleries/add_galleries" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <!-- Judul Galleri -->
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-slate-900">
                            Judul Galleri <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="title" name="title"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                            placeholder="Masukan judul galleri" required />
                        @error('title')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Foto Menu -->
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-slate-900">
                            Foto Galleri <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center justify-center w-full">
                            <label for="image"
                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-slate-300 rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-2 text-slate-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 5.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2l2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Klik untuk
                                            upload</span></p>
                                    <p class="text-xs text-slate-500">PNG, JPG, JPEG (Max. 2MB)</p>
                                </div>
                                <input id="image" type="file" name="image" class="hidden"
                                    accept=".jpg,.jpeg,.png,.gif" required />
                            </label>
                        </div>
                        <div id="imagePreview" class="mt-3"></div>
                        @error('image')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="mt-5">
                        <button type="submit"
                            class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2.5 px-4 rounded-lg transition-colors">
                            <i class="fa-solid fa-check mr-2"></i>Tambahkan Galleri
                        </button>
                    </div>

                    <div class="mt-5">
                        <a href="/dashboard/galleries/galleries_data"
                            class="flex-1 bg-slate-400 hover:bg-slate-500 text-white font-medium py-2.5 px-4 rounded-lg transition-colors text-center">
                            <i class="fa-solid fa-arrow-left mr-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Preview image
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <div class="relative inline-block">
                            <img src="${e.target.result}" class="w-32 h-32 object-cover rounded-lg">
                            <span class="text-xs text-green-600 mt-2 block">✓ File dipilih</span>
                        </div>
                    `;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
