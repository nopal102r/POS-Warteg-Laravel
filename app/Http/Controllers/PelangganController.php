<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Tampilkan daftar pelanggan (HTML view).
     */
    public function index()
    {
        $pelanggan = Pelanggan::with('pesan')->get();
        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Simpan pelanggan baru dari form HTML.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_tlp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        Pelanggan::create($validated);
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    /**
     * Tampilkan satu pelanggan.
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::with('pesan')->findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Hapus pelanggan.
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus');
    }
}
