<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $username = Auth::user()->name;
        $orders = Orders::paginate(5);

        return view('dashboardAdmin.orders.IndexOrders', [
            'username' => $username,
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        $username = Auth::user()->name;

        return view("dashboardAdmin.orders.DetailsOrder", [
            'username' => $username,
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        $orders->delete();

        return redirect('/dashboard/orders/order_data')->with('success', 'Berhasil menghapus data!');
    }
}
