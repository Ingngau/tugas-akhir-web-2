@extends('layouts.app')

@section('title', 'Detail Mata Pelajaran')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-600 text-white p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold">{{ $mapel->nama_mapel }}</h1>
                        <p class="text-blue-100 mt-2">Kode: {{ $mapel->kode_mapel }} | Kelompok {{ $mapel->kelompok }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('mapel.edit', $mapel->id) }}" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                        <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition" 
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fas fa-trash mr-2"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Mapel</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-code text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Kode Mapel:</span>
                                    <span class="ml-2 font-mono">{{ $mapel->kode_mapel }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-chalkboard-teacher text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Guru Pengajar:</span>
                                    <span class="ml-2">{{ $mapel->guru_pengajar }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-layer-group text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Kelompok:</span>
                                    <span class="ml-2 px-2 py-1 text-xs rounded-full 
                                        {{ $mapel->kelompok == 'A' ? 'bg-blue-100 text-blue-800' : 
                                           ($mapel->kelompok == 'B' ? 'bg-green-100 text-green-800' : 
                                           'bg-yellow-100 text-yellow-800') }}">
                                        Kelompok {{ $mapel->kelompok }}
                                    </span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Jumlah Jam:</span>
                                    <span class="ml-2">{{ $mapel->jumlah_jam }} jam/minggu</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Deskripsi</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-700 leading-relaxed">{{ $mapel->deskripsi }}</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Kompetensi Dasar</h3>
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $mapel->kompetensi_dasar }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('mapel.index') }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar
                        </a>
                        <div class="text-sm text-gray-500">
                            Terakhir diupdate: {{ $mapel->updated_at->format('d M Y H:i') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection