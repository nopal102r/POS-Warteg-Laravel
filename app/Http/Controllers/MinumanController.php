<?php

namespace App\Http\Controllers;

use App\Models\Minuman;
use Illuminate\Http\Request;

class MinumanController extends Controller
{
    /**
     * Tampilkan semua data minuman ke view.
     */
    public function index()
    {
        $data = Minuman::all();
        return view('minuman.index', compact('data'));
    }

    /**
     * Simpan data minuman baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_minuman' => 'required|string|max:255',
            'harga_minuman' => 'required|numeric',
        ]);

        Minuman::create($validated);
        return redirect()->back()->with('success', 'Minuman berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail minuman.
     */
    public function show($id)
    {
        $minuman = Minuman::findOrFail($id);
        return view('minuman.show', compact('minuman'));
    }

    /**
     * Perbarui data minuman.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_minuman' => 'required|string|max:255',
            'harga_minuman' => 'required|numeric',
        ]);

        $minuman = Minuman::findOrFail($id);
        $minuman->update($validated);

        return redirect()->back()->with('success', 'Minuman berhasil diperbarui!');
    }

    /**
     * Hapus data minuman.
     */
    public function destroy($id)
    {
        $minuman = Minuman::findOrFail($id);
        $minuman->delete();

        return redirect()->back()->with('success', 'Minuman berhasil dihapus!');
    }
}