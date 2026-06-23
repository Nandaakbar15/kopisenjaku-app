@extends('dashboardAdmin.layouts.main')

@section('content')
    <div class="space-y-8">
        <!-- Page Header -->
        <div class="anim-fade-up" style="animation-delay: 0.05s;">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Halaman data pesanan</h1>
        </div>

        <div class="relative overflow-x-auto bg-white shadow-lg rounded-lg border border-default anim-fade-up"
            style="animation-delay: 0.1s">
            <table class="w-full text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-medium">
                            ID Orders
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Customer Name
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Total Price
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
                    @foreach ($orders as $item)
                        <tr class="bg-neutral-primary border-b border-default">
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $item->id }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $item->customer_name }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                Rp. {{ $item->total_price }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                {{ $item->status }}
                            </th>
                            <td class="space-x-2 px-6 py-4">
                                <a href="/dashboard/orders/details_orders/{{ $item->id }}"
                                    class="inline-block text-white rounded-lg shadow-lg px-4 py-2 bg-blue-500 hover:bg-blue-700">
                                    Detail
                                </a>

                                <form action="/dashboard/orders/delete_orders/{{ $item->id }}" method="POST"
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
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
