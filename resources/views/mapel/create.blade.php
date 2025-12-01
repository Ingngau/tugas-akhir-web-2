@extends('layouts.app')

@section('title', 'Tambah Mata Pelajaran')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-600 text-white p-6">
                <h1 class="text-2xl font-bold">Tambah Mata Pelajaran</h1>
                <p class="text-blue-100">Isi form berikut untuk menambahkan mata pelajaran baru</p>
            </div>

            <div class="p-6">
                <form action="{{ route('mapel.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="kode_mapel" class="block text-sm font-medium text-gray-700">Kode Mapel</label>
                            <input type="text" name="kode_mapel" id="kode_mapel" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Contoh: MAT-001">
                        </div>

                        <div>
                            <label for="nama_mapel" class="block text-sm font-medium text-gray-700">Nama Mata Pelajaran</label>
                            <input type="text" name="nama_mapel" id="nama_mapel" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Contoh: Matematika">
                        </div>

                        <div>
                            <label for="guru_pengajar" class="block text-sm font-medium text-gray-700">Guru Pengajar</label>
                            <input type="text" name="guru_pengajar" id="guru_pengajar" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="kelompok" class="block text-sm font-medium text-gray-700">Kelompok</label>
                                <select name="kelompok" id="kelompok" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Pilih Kelompok</option>
                                    <option value="A">A (Wajib)</option>
                                    <option value="B">B (Wajib)</option>
                                    <option value="C">C (Peminatan)</option>
                                </select>
                            </div>

                            <div>
                                <label for="jumlah_jam" class="block text-sm font-medium text-gray-700">Jumlah Jam</label>
                                <input type="number" name="jumlah_jam" id="jumlah_jam" min="1" max="10" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Deskripsi mata pelajaran"></textarea>
                        </div>

                        <div>
                            <label for="kompetensi_dasar" class="block text-sm font-medium text-gray-700">Kompetensi Dasar</label>
                            <textarea name="kompetensi_dasar" id="kompetensi_dasar" rows="4"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Kompetensi dasar yang akan dicapai"></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('mapel.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                            Batal
                        </a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection