<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();
        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_mapel' => 'required']);
        Mapel::create($request->all());

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil ditambahkan');
    }

    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        $request->validate(['nama_mapel' => 'required']);
        $mapel->update($request->all());

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil diperbarui');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil dihapus');
    }

    public function show(Mapel $mapel)
{
    return view('mapel.show', compact('mapel'));
}
}
