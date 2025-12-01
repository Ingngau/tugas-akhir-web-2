@extends('layouts.app')

@section('title', 'Edit Prestasi')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-yellow-600 text-white p-6">
                <h1 class="text-2xl font-bold">Edit Prestasi</h1>
                <p class="text-yellow-100">Edit data prestasi {{ $prestasi->judul }}</p>
            </div>

            <div class="p-6">
                <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Prestasi</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $prestasi->judul) }}" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500"
                                placeholder="Contoh: Juara 1 Olimpiade Matematika">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                                <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa', $prestasi->nama_siswa) }}" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                            </div>

                            <div>
                                <label for="peringkat" class="block text-sm font-medium text-gray-700">Peringkat</label>
                                <input type="text" name="peringkat" id="peringkat" value="{{ old('peringkat', $prestasi->peringkat) }}" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500"
                                    placeholder="Contoh: Juara 1">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="tingkat" class="block text-sm font-medium text-gray-700">Tingkat</label>
                                <select name="tingkat" id="tingkat" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                                    <option value="">Pilih Tingkat</option>
                                    <option value="Sekolah" {{ old('tingkat', $prestasi->tingkat) == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                                    <option value="Kecamatan" {{ old('tingkat', $prestasi->tingkat) == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                                    <option value="Kabupaten" {{ old('tingkat', $prestasi->tingkat) == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                                    <option value="Provinsi" {{ old('tingkat', $prestasi->tingkat) == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                                    <option value="Nasional" {{ old('tingkat', $prestasi->tingkat) == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                                    <option value="Internasional" {{ old('tingkat', $prestasi->tingkat) == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                                </select>
                            </div>

                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                                <select name="kategori" id="kategori" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                                    <option value="">Pilih Kategori</option>
                                    <option value="Akademik" {{ old('kategori', $prestasi->kategori) == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                    <option value="Seni" {{ old('kategori', $prestasi->kategori) == 'Seni' ? 'selected' : '' }}>Seni</option>
                                    <option value="Olahraga" {{ old('kategori', $prestasi->kategori) == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                                    <option value="Teknologi" {{ old('kategori', $prestasi->kategori) == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                                    <option value="Lainnya" {{ old('kategori', $prestasi->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $prestasi->tanggal->format('Y-m-d')) }}" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                            </div>

                            <div>
                                <label for="penyelenggara" class="block text-sm font-medium text-gray-700">Penyelenggara</label>
                                <input type="text" name="penyelenggara" id="penyelenggara" value="{{ old('penyelenggara', $prestasi->penyelenggara) }}" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                            </div>
                        </div>

                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500"
                                placeholder="Deskripsi prestasi yang diraih">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
                        </div>

                        <div>
                            <label for="foto" class="block text-sm font-medium text-gray-700">Foto (URL)</label>
                            <input type="text" name="foto" id="foto" value="{{ old('foto', $prestasi->foto) }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500"
                                placeholder="URL foto prestasi">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('prestasi.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                            Batal
                        </a>
                        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700 transition">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection