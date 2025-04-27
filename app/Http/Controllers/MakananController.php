<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $data = Makanan::all();
        return view('makanan.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'harga_makanan' => 'required|numeric',
        ]);

        Makanan::create($validated);
        return redirect()->back()->with('success', 'Makanan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $makanan = Makanan::findOrFail($id);
        return view('makanan.show', compact('makanan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'harga_makanan' => 'required|numeric',
        ]);

        $makanan = Makanan::findOrFail($id);
        $makanan->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $makanan = Makanan::findOrFail($id);
        $makanan->delete();

        return redirect()->back()->with('success', 'Makanan berhasil dihapus!');
    }
}