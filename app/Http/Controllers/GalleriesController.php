<?php

namespace App\Http\Controllers;

use App\Models\Galleries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $username = Auth::user()->name;
        $galleries = Galleries::paginate(5);

        return view("dashboardAdmin.galleries.IndexGalleries", [
            'username' => $username,
            'galleries' => $galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $username = Auth::user()->name;

        return view("dashboardAdmin.galleries.AddGalleries", [
            'username' => $username
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
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

            Galleries::create($validateData);

            DB::commit();

            return redirect('/dashboard/galleries/galleries_data')->with('success', 'Berhasil menambahkan data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Add Galleries Error : ' . $e->getMessage(), [
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
    public function edit(Galleries $galleries)
    {
        $username = Auth::user()->name;

        return view("dashboardAdmin.galleries.EditGalleries", [
            'username' => $username,
            'galleries' => $galleries
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galleries $galleries)
    {
        $validateData = $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
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

            $galleries->update($validateData);

            DB::commit();

            return redirect('/dashboard/galleries/galleries_data')->with('success', 'Berhasil mengubah data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Edit Galleries Error : ' . $e->getMessage(), [
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
    public function destroy(Galleries $galleries)
    {
        $galleries->delete();

        return redirect('/dashboard/galleries/galleries_data')->with('success', 'Berhasil menghapus data!');
    }
}
