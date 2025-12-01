<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::with(['siswa', 'mapel'])->get();
        return view('nilai.index', compact('nilai'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $mapel = Mapel::all();
        return view('nilai.create', compact('siswa', 'mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'mapel_id' => 'required',
            'nilai' => 'required|numeric'
        ]);

        Nilai::create($request->all());

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil ditambahkan');
    }

    public function show(Nilai $nilai)
    {
        return view('nilai.show', compact('nilai'));
    }

    public function edit(Nilai $nilai)
    {
        $siswa = Siswa::all();
        $mapel = Mapel::all();
        return view('nilai.edit', compact('nilai', 'siswa', 'mapel'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'nilai' => 'required|numeric'
        ]);

        $nilai->update($request->all());

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus');
    }
    
}
