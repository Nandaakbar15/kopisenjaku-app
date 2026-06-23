<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $username = Auth::user()->name;
        $contacts = Contacts::paginate(5);

        return view("dashboardAdmin.contacts.IndexContacts", [
            'username' => $username,
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $username = Auth::user()->name;

        return view('dashboardAdmin.contacts.AddContacts', [
            'username' => $username
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'phone' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'maps_link' => 'required|string'
        ]);

        try {
            DB::beginTransaction();

            Contacts::create($validateData);

            DB::commit();

            return redirect('/dashboard/contacts/contacts_data')->with('success', 'Berhasil menambahkan data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Add Contacts Error : ' . $e->getMessage(), [
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
    public function edit(Contacts $contacts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacts $contacts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacts $contacts)
    {
        //
    }
}
