@extends('dashboardAdmin.layouts.main')

@section('content')
    <div class="space-y-8">
        <div class="anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Halaman form tambah kontak</h1>
        </div>

        <div class="w-full max-w-full bg-white rounded-lg shadow-lg p-6 sm:p-8 anim-fade-up">
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
            <form action="/dashboard/contacts/add_contacts" method="POST">
                @csrf
                <div class="max-w-2xl space-y-6">
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-heading">Phone Number <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="phone" name="phone"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg w-full focus:ring-brand focus:border-brand @error('phone') border-red-500 @enderror"
                            placeholder="masukan nomor telepon" required />
                        @error('phone')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-heading">Email <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="email" name="email"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-lg w-full focus:ring-brand focus:border-brand @error('email') border-red-500 @enderror"
                            placeholder="masukan email" required />
                        @error('email')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="address" class="block mb-2 text-sm font-medium text-slate-900">
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        <textarea id="address" name="address" rows="4"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('address') border-red-500 @enderror"
                            placeholder="Masukan alamat"></textarea>
                        @error('address')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="maps_link" class="block mb-2 text-sm font-medium text-slate-900">
                            Google Maps Link <span class="text-red-500">*</span>
                        </label>
                        <textarea id="maps_link" name="maps_link" rows="4"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('maps_link') border-red-500 @enderror"
                            placeholder="Masukan link google maps"></textarea>
                        @error('maps_link')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>


                    <div>
                        <button type="submit"
                            class="text-white bg-blue-500 box-border border border-transparent hover:bg-blue-700 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-lg text-sm px-5 py-2.5 focus:outline-none transition-colors">
                            Tambah!
                        </button>
                    </div>

                    <div>
                        <a href="/dashboard/contacts/contacts_data"
                            class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-slate-500 hover:bg-slate-700">
                            Kembali
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
