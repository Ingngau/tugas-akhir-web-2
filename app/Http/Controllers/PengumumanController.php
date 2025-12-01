<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);
        return view('pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'penulis' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'status' => 'required|in:Aktif,Nonaktif',
            'lampiran' => 'nullable|url',
            'penting' => 'boolean'
        ]);

        Pengumuman::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'isi' => $request->isi,
            'status' => $request->status,
            'lampiran' => $request->lampiran,
            'penting' => $request->penting ?? false,
            'dilihat' => 0
        ]);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function show(Pengumuman $pengumuman)
    {
        // Increment view count
        $pengumuman->increment('dilihat');
        
        return view('pengumuman.show', compact('pengumuman'));
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'penulis' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'status' => 'required|in:Aktif,Nonaktif',
            'lampiran' => 'nullable|url',
            'penting' => 'boolean'
        ]);

        $pengumuman->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'isi' => $request->isi,
            'status' => $request->status,
            'lampiran' => $request->lampiran,
            'penting' => $request->penting ?? false
        ]);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus!');
    }
}