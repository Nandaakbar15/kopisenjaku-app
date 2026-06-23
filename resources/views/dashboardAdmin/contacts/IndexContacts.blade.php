@extends('dashboardAdmin.layouts.main')

@section('content')
    <div class="space-y-8">
        <!-- Page Header -->
        <div class="anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Halaman data informasi kontak</h1>
        </div>

        <h2 class="anim-fade-up" style="animation-delay: 0.05s;">
            <a href="/dashboard/contacts/add_contacts_form"
                class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-blue-500 hover:bg-blue-700">Tambah
                Kontak</a>
        </h2>

        <div class="relative overflow-x-auto bg-white shadow-lg rounded-lg border border-default anim-fade-up"
            style="animation-delay: 0.1s">
            <table class="w-full text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-medium">
                            ID Contact
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Phone Number
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Maps Link
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $item)
                        <tr class="bg-neutral-primary border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $item->id }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $item->phone }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $item->email }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $item->address }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                <a href="{{ $item->maps_link }}" class="text-blue-500 underline" target="_blank"
                                    rel="noopener noreferrer">Link</a>
                            </th>
                            <td class="space-x-2 px-6 py-4">
                                <a href="/dashboard/contacts/edit_contacts_form/{{ $item->id }}"
                                    class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-blue-500 hover:bg-blue-700">
                                    Edit
                                </a>

                                <form action="/dashboard/contacts/delete_contact/{{ $item->id }}" method="POST"
                                    class="inline">
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
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@endsection
