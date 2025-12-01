<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mapel;
use App\Models\Guru;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['mapel', 'guru'])->get();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $mapel = Mapel::all();
        $guru = Guru::all();
        return view('jadwal.create', compact('mapel', 'guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'mapel_id' => 'required',
            'guru_id' => 'required',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit(Jadwal $jadwal)
    {
        $mapel = Mapel::all();
        $guru = Guru::all();
        return view('jadwal.edit', compact('jadwal', 'mapel', 'guru'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'kelas' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'mapel_id' => 'required',
            'guru_id' => 'required',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
