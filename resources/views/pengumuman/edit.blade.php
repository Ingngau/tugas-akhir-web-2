@extends('layouts.app')

@section('title', 'Edit Pengumuman')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-yellow-600 text-white p-6">
                <h1 class="text-2xl font-bold">Edit Pengumuman</h1>
                <p class="text-yellow-100">Edit pengumuman: {{ $pengumuman->judul }}</p>
            </div>

            <div class="p-6">
                <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Pengumuman</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $pengumuman->judul) }}" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500"
                                placeholder="Masukkan judul pengumuman">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                                <select name="kategori" id="kategori" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                                    <option value="">Pilih Kategori</option>
                                    <option value="Umum" {{ old('kategori', $pengumuman->kategori) == 'Umum' ? 'selected' : '' }}>Umum</option>
                                    <option value="Akademik" {{ old('kategori', $pengumuman->kategori) == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                    <option value="Kegiatan" {{ old('kategori', $pengumuman->kategori) == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                    <option value="Lomba" {{ old('kategori', $pengumuman->kategori) == 'Lomba' ? 'selected' : '' }}>Lomba</option>
                                    <option value="Lainnya" {{ old('kategori', $pengumuman->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <div>
                                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                                <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $pengumuman->penulis) }}" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500"
                                    placeholder="Nama penulis">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $pengumuman->tanggal->format('Y-m-d')) }}" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                                    <option value="Aktif" {{ old('status', $pengumuman->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Nonaktif" {{ old('status', $pengumuman->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="isi" class="block text-sm font-medium text-gray-700">Isi Pengumuman</label>
                            <textarea name="isi" id="isi" rows="8" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500"
                                placeholder="Tulis isi pengumuman di sini...">{{ old('isi', $pengumuman->isi) }}</textarea>
                        </div>

                        <div>
                            <label for="lampiran" class="block text-sm font-medium text-gray-700">Lampiran (URL)</label>
                            <input type="url" name="lampiran" id="lampiran" value="{{ old('lampiran', $pengumuman->lampiran) }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500"
                                placeholder="https://example.com/file.pdf">
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="penting" id="penting" value="1" 
                                {{ old('penting', $pengumuman->penting) ? 'checked' : '' }}
                                class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded">
                            <label for="penting" class="ml-2 block text-sm text-gray-700">
                                Tandai sebagai pengumuman penting
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('pengumuman.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                            Batal
                        </a>
                        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700 transition">
                            Update Pengumuman
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection