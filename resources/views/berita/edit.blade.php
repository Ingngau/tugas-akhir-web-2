@extends('layouts.app')

@section('title', 'Edit Berita - ' . $berita->judul)

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Berita</h1> <!-- Fixed: text-3x1 → text-3xl -->

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('berita.update', $berita) }}" method="POST" enctype="multipart/form-data"> <!-- Fixed: POS} → POST -->
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Informasi Berita -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <div class="lg:col-span-2 space-y-4">
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Berita *</label>
                            <input type="text" name="judul" id="judul" 
                                value="{{ old('judul', $berita->judul) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-lg font-semibold"
                                placeholder="Masukkan judul berita yang menarik...">
                            @error('judul')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="konten" class="block text-sm font-medium text-gray-700">Konten Berita *</label>
                            <textarea name="konten" id="konten" rows="12" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Tulis isi berita di sini...">{{ old('konten', $berita->konten) }}</textarea>
                            @error('konten')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Informasi Penulis & Kategori -->
                        <div class="bg-gray-50 rounded-lg p-4 space-y-4">
                            <h3 class="text-lg font-semibold text-gray-800">Informasi Berita</h3>
                            
                            <div>
                                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis *</label>
                                <input type="text" name="penulis" id="penulis" 
                                    value="{{ old('penulis', $berita->penulis) }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('penulis')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori *</label>
                                <select name="kategori" id="kategori" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Pilih Kategori</option>
                                    <option value="Pengumuman" {{ old('kategori', $berita->kategori) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                    <option value="Prestasi" {{ old('kategori', $berita->kategori) == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                                    <option value="Kegiatan" {{ old('kategori', $berita->kategori) == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                    <option value="Lainnya" {{ old('kategori', $berita->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('kategori')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                                <select name="status" id="status" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status', $berita->status) == 'published' ? 'selected' : '' }}>Published</option>
                                </select>
                                @error('status')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" name="is_anonymous" id="is_anonymous" value="1" 
                                    {{ old('is_anonymous', $berita->is_anonymous) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <label for="is_anonymous" class="ml-2 text-sm text-gray-700">
                                    Tampilkan sebagai Anonymous
                                </label>
                            </div>
                        </div>

                        <!-- Current Image -->
                        @if($berita->gambar)
                        <div class="bg-gray-50 rounded-lg p-4 space-y-4">
                            <h3 class="text-lg font-semibold text-gray-800">Gambar Saat Ini</h3>

                            <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                 alt="{{ $berita->judul }}" 
                                 class="w-full h-32 object-cover rounded-lg">

                            <div class="flex items-center">
                                <input type="checkbox" name="remove_image" id="remove_image" value="1"
                                    class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                <label for="remove_image" class="ml-2 text-sm text-red-700">
                                    Hapus gambar ini
                                </label>
                            </div>
                        </div>
                        @endif

                        <!-- Statistik -->
                        <div class="bg-blue-50 rounded-lg p-4">
                            <h4 class="font-semibold text-blue-800 mb-2">Statistik Berita:</h4>
                            <div class="text-sm text-blue-700 space-y-1">
                                <p>• Dilihat: {{ $berita->views }} kali</p>
                                <p>• Dibuat: {{ $berita->created_at->format('d M Y') }}</p>
                                <p>• Diupdate: {{ $berita->updated_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 pt-6 border-t">
                    <a href="{{ route('berita.show', $berita) }}" 
                       class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                        <i class="fas fa-save mr-2"></i>Update Berita
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('gambar');
    const imagePreview = document.getElementById('image-preview');
    const preview = document.getElementById('preview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                imagePreview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.classList.add('hidden');
        }
    });

    // Auto-resize textarea
    const textarea = document.getElementById('konten');
    textarea.style.height = textarea.scrollHeight + 'px';
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });
});
</script>
@endsection