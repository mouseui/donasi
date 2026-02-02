<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Donatur;
use App\Models\KategoriDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    public function index()
    {
        $dataDonasi = Donasi::with(['donatur', 'kategori'])->latest()->get();
        return view('donasi.index', compact('dataDonasi'));
    }

    public function create()
    {
        $kategori = KategoriDonasi::all();
        return view('donasi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_donatur' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:15',
            'kategori_id' => 'required|exists:kategori_donasi,id',
            'nominal' => 'required|numeric|min:1',
            'pesan' => 'nullable|string',
        ]);

        DB::transaction(function () use ($validated) {
            $donatur = Donatur::updateOrCreate(
                ['email' => $validated['email']],
                [
                    'nama_donatur' => $validated['nama_donatur'],
                    'no_hp' => $validated['no_hp'],
                ]
            );

            Donasi::create([
                'donatur_id' => $donatur->id,
                'kategori_id' => $validated['kategori_id'],
                'nominal' => $validated['nominal'],
                'pesan' => $validated['pesan'] ?? '',
                'tanggal_donasi' => now(),
            ]);
        });

        return redirect()->route('donasi.history')->with('success', 'Donasi berhasil disimpan!');
    }
}