@extends('dashboardAdmin.layouts.main')

@section('content')
    <div class="space-y-8">
        <div class="anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Edit Menu</h1>
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

            <form action="/dashboard/menu/add_menu" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="gambarLama" value="{{ $menu->image }}">
                @csrf
                <div class="space-y-6">
                    <!-- Kategori -->
                    <div>
                        <label for="category_id" class="block mb-2 text-sm font-medium text-slate-900">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select id="category_id" name="category_id"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category_id') border-red-500 @enderror"
                            required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('category_id', $menu->id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nama Menu -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-slate-900">
                            Nama Menu <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                            placeholder="Contoh: Cappuccino, Espresso, etc" required
                            value="{{ old('name', $menu->name) }}" />
                        @error('name')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-slate-900">
                            Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" rows="4"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                            placeholder="Jelaskan detail menu...">{{ old('description', $menu->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-slate-900">
                            Harga (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="price" name="price" value="{{ old('price', $menu->price) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('price') border-red-500 @enderror"
                            placeholder="Contoh: 25000" min="0" step="1000" required />
                        @error('price')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Foto Menu -->
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-slate-900">
                            Foto Menu <span class="text-red-500">*</span>
                        </label>
                        <div class="mb-3">
                            <div
                                class="w-40 h-24 overflow-hidden rounded-lg border border-white/10 bg-slate-900 flex items-center justify-center shadow-inner">
                                @if ($menu->image)
                                    <img src="{{ asset($menu->image) }}" class="img-preview w-full h-full object-cover">
                                @else
                                    <img class="img-preview w-full h-full object-cover hidden">
                                    <span id="no-photo-text" class="text-xs text-gray-500 italic">Belum ada
                                        foto</span>
                                @endif
                            </div>
                        </div>
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
                                    accept=".jpg,.jpeg,.png,.gif" onchange="previewImage()" />
                            </label>
                        </div>
                        @error('image')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-slate-900">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select id="status" name="status"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror"
                            required>
                            <option value="active" @selected(old('status') == 'active')>Aktif</option>
                            <option value="inactive" @selected(old('status') == 'inactive')>Tidak Aktif</option>
                        </select>
                        @error('status')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="mt-5">
                        <button type="submit"
                            class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2.5 px-4 rounded-lg transition-colors">
                            <i class="fa-solid fa-check mr-2"></i>Edit Menu
                        </button>
                    </div>

                    <div class="mt-5">
                        <a href="/dashboard/menu/menu_data"
                            class="flex-1 bg-slate-400 hover:bg-slate-500 text-white font-medium py-2.5 px-4 rounded-lg transition-colors text-center">
                            <i class="fa-solid fa-arrow-left mr-2"></i>Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            const noPhotoText = document.querySelector('#no-photo-text');

            if (image.files && image.files[0]) {
                imgPreview.classList.remove('hidden');
                if (noPhotoText) noPhotoText.classList.add('hidden');

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        }
    </script>
@endsection
