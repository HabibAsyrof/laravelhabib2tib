<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('admin.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  @dd($request->all());
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone
        ];

        Pelanggan::create($data);
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil data pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);

        // Mengirim data pelanggan ke halaman edit
        return view('admin.pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { {
            // Validasi data yang dikirim
            $data = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'birthday' => 'required|date',
                'gender' => 'required',
                'email' => 'required|email',
                'phone' => 'required|string|max:30'
            ]);

            // Mencari pelanggan berdasarkan ID
            $pelanggan = Pelanggan::findOrFail($id);

            // Memperbarui data pelanggan
            $pelanggan->update($data);

            // Kembali ke halaman index
            return redirect()->route('pelanggan.index')
                ->with('success', 'Data pelanggan berhasil diperbarui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);

        // Menghapus data pelanggan dari database
        $pelanggan->delete();

        // Kembali ke halaman index
        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus.');
    }
}
