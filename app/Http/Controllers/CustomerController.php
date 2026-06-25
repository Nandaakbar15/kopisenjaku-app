<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Contacts;
use App\Models\Galleries;

class CustomerController extends Controller
{
    public function home()
    {
        return view("customers.layouts.home");
    }

    public function galleries()
    {
        $galleries = Galleries::paginate(5);

        return view("customers.galleries.indexGalleriesCustomers", [
            'galleries' => $galleries
        ]);
    }

    public function menu()
    {
        $menu = Menu::with('categories')->paginate(5);

        return view("customers.menu.indexMenuCustomers", [
            'menu' => $menu
        ]);
    }

    public function detailMenu(Menu $menu)
    {
        $relatedMenus = Menu::where('category_id', $menu->category_id)
            ->where('id', '!=', $menu->id)
            ->limit(3)
            ->get();

        return view("customers.menu.detailMenuCustomers", [
            'menu' => $menu,
            'relatedMenus' => $relatedMenus
        ]);
    }

    public function contacts()
    {
        $contacts = Contacts::paginate(5);

        return view('customers.contacts.indexContactsCustomers', [
            'contacts' => $contacts
        ]);
    }
}
