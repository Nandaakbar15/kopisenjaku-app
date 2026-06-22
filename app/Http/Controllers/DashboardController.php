<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        $username = Auth::user()->name;
        return view("dashboardAdmin.layouts.home", [
            'username' => $username
        ]);
    }
}
