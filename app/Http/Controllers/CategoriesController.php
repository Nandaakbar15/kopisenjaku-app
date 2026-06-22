<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $username = Auth::user()->name;
        $categories = Categories::paginate(5);

        return view("dashboardAdmin.categories.IndexCategories", [
            'username' => $username,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $username = Auth::user()->name;

        return view('dashboardAdmin.categories.AddCategories', [
            'username' => $username
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string'
        ]);

        try {
            DB::beginTransaction();

            Categories::create($validateData);

            DB::commit();

            return redirect('/dashboard/categories/categories_data')->with('success', 'Berhasil menambahkan data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Add Categories Error : ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'data' => $validateData
            ]);

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem! ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        $username = Auth::user()->name;

        return view('dashboardAdmin.categories.EditCategories', [
            'username' => $username,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        $validateData = $request->validate([
            'name' => 'required|string'
        ]);

        try {
            DB::beginTransaction();

            $categories->update($validateData);

            DB::commit();

            return redirect('/dashboard/categories/categories_data')->with('success', 'Berhasil mengubah data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Edit Categories Error : ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'data' => $validateData
            ]);

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem! ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        $categories->delete();

        return redirect('/dashboard/categories/categories_data')->with('success', 'Berhasil menghapus data!');
    }
}
