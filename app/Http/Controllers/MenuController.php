<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $username = Auth::user()->name;
        $menu = Menu::with('categories')->paginate(5);

        return view("dashboardAdmin.menu.IndexMenu", [
            'username' => $username,
            'menu' => $menu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $username = Auth::user()->name;
        $categories = Categories::all();

        return view("dashboardAdmin.menu.AddMenu", [
            'username' => $username,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category_id' => 'required|exists:tb_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        try {
            DB::beginTransaction();

            // Handle file upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $path = $file->storeAs('menu', $fileName, 'public');
                $validateData['image'] = '/storage/' . $path;
            }

            // Create menu record
            Menu::create($validateData);

            DB::commit();

            return redirect('/dashboard/menu/menu_data')->with('success', 'Menu berhasil ditambahkan!');
        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Add Menu Error : ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'data' => $validateData
            ]);

            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $username = Auth::user()->name;
        $categories = Categories::all();

        return view("dashboardAdmin.menu.EditMenu", [
            'username' => $username,
            'categories' => $categories,
            'menu' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validateData = $request->validate([
            'category_id' => 'required|exists:tb_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        try {
            DB::beginTransaction();

            if($request->hasFile('image')) {

                if($request->gambarLama) {
                    Storage::disk('public')->delete($request->gambarLama);
                }

                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('images', $fileName, 'public');
                $validateData['image'] = '/storage/' . $path;
            }

            Menu::create($validateData);

            DB::commit();

            return redirect('/dashboardAdmin/menu/menu_data')->with('success', 'Berhasil mengubah data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Add Menu Error : ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'data' => $validateData
            ]);

            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
