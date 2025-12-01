<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{

    public function index()
    {
        $prestasi = Prestasi::latest()->paginate(10);
        return view('prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('prestasi.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'peringkat' => 'required|string|max:50',
            'tanggal' => 'required|date',
        ]);

        Prestasi::create($request->all());

        return redirect()->route('prestasi.index')
                         ->with('success', 'Prestasi berhasil ditambahkan.');
    }


    public function show(Prestasi $prestasi)
    {
        return view('prestasi.show', compact('prestasi'));
    }

    public function edit(Prestasi $prestasi)
    {
        return view('prestasi.edit', compact('prestasi'));
    }


    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'peringkat' => 'required|string|max:50',
            'tanggal' => 'required|date',
        ]);

        $prestasi->update($request->all());

        return redirect()->route('prestasi.index')
                         ->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();

        return redirect()->route('prestasi.index')
                         ->with('success', 'Prestasi berhasil dihapus.');
    }
}
