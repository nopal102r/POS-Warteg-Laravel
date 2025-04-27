<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Pelanggan;
use App\Models\Makanan;
use App\Models\Minuman;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    /**
     * Tampilkan daftar semua pesanan dalam HTML.
     */
    public function index()
    {
        $pesanan = Pesan::with(['pelanggan', 'makanan', 'minuman'])->get();
        $pelanggan = Pelanggan::all();
        $makanan = Makanan::all();
        $minuman = Minuman::all();

        return view('pesan.index', compact('pesanan', 'pelanggan', 'makanan', 'minuman'));
    }

    /**
     * Simpan pesanan baru dari form HTML.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'makanan_id' => 'nullable|exists:makanan,id',
            'minuman_id' => 'nullable|exists:minuman,id',
        ]);

        Pesan::create($validated);
        return redirect()->route('pesan.index')->with('success', 'Pesanan berhasil ditambahkan');
    }

    /**
     * Hapus pesanan tertentu.
     */
    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();

        return redirect()->route('pesan.index')->with('success', 'Pesanan berhasil dihapus');
    }
}
