<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Berita::latest();
        
        // Filter by kategori jika ada
        if ($request->has('kategori') && $request->kategori) {
            $query->where('kategori', $request->kategori);
        }
        
        $beritas = $query->paginate(9);
        
        return view('berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'penulis' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_anonymous' => 'nullable|boolean',
            'status' => 'required|in:draft,published'
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('berita', 'public');
            $validated['gambar'] = $imagePath;
        }

        // Override penulis jika anonim dipilih
        if ($request->boolean('is_anonymous')) {
            $validated['penulis'] = 'Anonymous';
        }

        // Set default values
        $validated['views'] = 0;

        Berita::create($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $berita = Berita::findOrFail($id);
        
        // Tambah jumlah views
        $berita->increment('views');

        // Ambil berita terkait berdasarkan kategori
        $relatedBeritas = Berita::where('kategori', $berita->kategori)
            ->where('id', '!=', $berita->id)
            ->latest()
            ->take(2)
            ->get();

        return view('berita.show', compact('berita', 'relatedBeritas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita): View
    {
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'penulis' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_anonymous' => 'nullable|boolean',
            'status' => 'required|in:draft,published'
        ]);

        // Handle image removal
        if ($request->has('remove_image') && $berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
            $validated['gambar'] = null;
        }

        // Handle new image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            
            // Store new image
            $imagePath = $request->file('gambar')->store('berita', 'public');
            $validated['gambar'] = $imagePath;
        }

        // Override penulis jika anonim dipilih
        if ($request->boolean('is_anonymous')) {
            $validated['penulis'] = 'Anonymous';
        }

        $berita->update($validated);

        return redirect()->route('berita.show', $berita)
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita): RedirectResponse
    {
        // Delete image if exists
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Filter berita berdasarkan kategori.
     */
    public function byKategori(string $kategori): View
    {
        $beritas = Berita::where('kategori', $kategori)
                        ->where('status', 'published')
                        ->latest()
                        ->paginate(10);
        $kategoriName = ucfirst($kategori);

        return view('berita.kategori', compact('beritas', 'kategoriName'));
    }

    /**
     * Toggle status berita (draft/published)
     */
    public function toggleStatus(Berita $berita): RedirectResponse
    {
        $berita->update([
            'status' => $berita->status === 'published' ? 'draft' : 'published'
        ]);

        $message = $berita->status === 'published' 
            ? 'Berita berhasil dipublikasikan' 
            : 'Berita berhasil dijadikan draft';

        return back()->with('success', $message);
    }
}