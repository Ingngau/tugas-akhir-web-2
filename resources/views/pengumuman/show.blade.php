@extends('layouts.app')

@section('title', $pengumuman->judul)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-blue-600 text-white p-6">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold mb-2">{{ $pengumuman->judul }}</h1>
                        <div class="flex flex-wrap items-center gap-4 text-blue-100">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span>{{ $pengumuman->penulis }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                <span>{{ $pengumuman->tanggal->format('d M Y') }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-tag mr-2"></i>
                                <span>{{ $pengumuman->kategori }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-eye mr-2"></i>
                                <span>{{ $pengumuman->dilihat }}x dilihat</span>
                            </div>
                            @if($pengumuman->penting)
                            <div class="flex items-center bg-yellow-500 text-white px-2 py-1 rounded-full">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                <span class="text-xs">Penting</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="flex space-x-2 ml-4">
                        <a href="{{ route('pengumuman.edit', $pengumuman->id) }}" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                        <form action="{{ route('pengumuman.destroy', $pengumuman->id) }}" method="POST" class="inline">
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

            <!-- Content -->
            <div class="p-6">
                <div class="prose max-w-none">
                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $pengumuman->isi }}</p>
                    </div>

                    @if($pengumuman->lampiran)
                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">
                            <i class="fas fa-paperclip mr-2"></i>Lampiran
                        </h3>
                        <a href="{{ $pengumuman->lampiran }}" target="_blank" 
                           class="text-blue-600 hover:text-blue-800 underline">
                            {{ $pengumuman->lampiran }}
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Status Info -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            Status: 
                            <span class="font-medium {{ $pengumuman->status == 'Aktif' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $pengumuman->status }}
                            </span>
                        </div>
                        <div class="text-sm text-gray-500">
                            Terakhir diupdate: {{ $pengumuman->updated_at->format('d M Y H:i') }}
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <a href="{{ route('pengumuman.index') }}" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Pengumuman
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection