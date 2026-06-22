@extends('dashboardAdmin.layouts.main')

@section('content')
    <div class="space-y-8">
        <!-- Page Header -->
        <div class="anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Halaman data menu</h1>
        </div>

        <h2 class="anim-fade-up" style="animation-delay: 0.05s;">
            <a href="/dashboard/menu/add_menu_form"
                class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-blue-500 hover:bg-blue-700">Tambah
                Menu</a>
        </h2>

        <div class="relative overflow-x-auto bg-white shadow-lg rounded-lg border border-default">
            <table class="w-full text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-medium">
                            ID Menu
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Menu Image
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Categories
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menu as $item)
                        <tr class="bg-neutral-primary border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $item->id }}
                            </th>
                            <td class="px-6 py-4">
                                <div
                                    class="w-24 h-14 overflow-hidden rounded-lg border border-white/10 bg-slate-900 flex items-center justify-center">
                                    <img src="{{ asset($item->image) }}" alt="Foto menu" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $item->name }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $item->categories->name }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Rp. {{ $item->price }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $item->status }}
                            </th>
                            <td class="space-x-2 px-6 py-4">
                                <a href="/dashboard/menu/edit_menu_form/{{ $item->id }}"
                                    class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-blue-500 hover:bg-blue-700">
                                    Edit
                                </a>

                                <form action="/dashboard/menu/delete_menu/{{ $item->id }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-red-500 hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-center mt-6">
                {{ $menu->links() }}
            </div>
        </div>
    </div>
@endsection
