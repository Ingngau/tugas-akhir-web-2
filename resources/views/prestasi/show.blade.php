@extends('layouts.app')

@section('title', 'Detail Prestasi')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-yellow-600 text-white p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold">{{ $prestasi->judul }}</h1>
                        <p class="text-yellow-100 mt-2">{{ $prestasi->nama_siswa }} - {{ $prestasi->peringkat }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('prestasi.edit', $prestasi->id) }}" 
                           class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                        <form action="{{ route('prestasi.destroy', $prestasi->id) }}" method="POST" class="inline">
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
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Prestasi</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-user text-yellow-600 w-6"></i>
                                    <span class="ml-3 font-medium">Nama Siswa:</span>
                                    <span class="ml-2">{{ $prestasi->nama_siswa }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-trophy text-yellow-600 w-6"></i>
                                    <span class="ml-3 font-medium">Peringkat:</span>
                                    <span class="ml-2">{{ $prestasi->peringkat }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-layer-group text-yellow-600 w-6"></i>
                                    <span class="ml-3 font-medium">Tingkat:</span>
                                    <span class="ml-2 px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">
                                        {{ $prestasi->tingkat }}
                                    </span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-tag text-yellow-600 w-6"></i>
                                    <span class="ml-3 font-medium">Kategori:</span>
                                    <span class="ml-2">{{ $prestasi->kategori }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar text-yellow-600 w-6"></i>
                                    <span class="ml-3 font-medium">Tanggal:</span>
                                    <span class="ml-2">{{ $prestasi->tanggal->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-building text-yellow-600 w-6"></i>
                                    <span class="ml-3 font-medium">Penyelenggara:</span>
                                    <span class="ml-2">{{ $prestasi->penyelenggara }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Deskripsi Prestasi</h3>
                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <p class="text-gray-700 leading-relaxed">{{ $prestasi->deskripsi }}</p>
                        </div>

                        @if($prestasi->foto)
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Foto</h3>
                            <img src="{{ $prestasi->foto }}" alt="Foto Prestasi" class="w-full h-64 object-cover rounded-lg shadow">
                        </div>
                        @endif
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('prestasi.index') }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar
                        </a>
                        <div class="text-sm text-gray-500">
                            Ditambahkan: {{ $prestasi->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection