@extends('layouts.app')

@section('title', 'Berita Sekolah')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Berita Sekolah</h1>
    
    <!-- Filter Kategori -->
    <div class="flex space-x-4 mb-6 overflow-x-auto py-2">
        <a href="{{ route('berita.index') }}" 
           class="whitespace-nowrap px-4 py-2 rounded-lg {{ request()->is('berita') && !request('kategori') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
            Semua Berita
        </a>
        <a href="{{ route('berita.index', ['kategori' => 'Pengumuman']) }}" 
           class="whitespace-nowrap px-4 py-2 rounded-lg {{ request('kategori') == 'Pengumuman' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
            Pengumuman
        </a>
        <a href="{{ route('berita.index', ['kategori' => 'Prestasi']) }}" 
           class="whitespace-nowrap px-4 py-2 rounded-lg {{ request('kategori') == 'Prestasi' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
            Prestasi
        </a>
        <a href="{{ route('berita.index', ['kategori' => 'Kegiatan']) }}" 
           class="whitespace-nowrap px-4 py-2 rounded-lg {{ request('kategori') == 'Kegiatan' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
            Kegiatan
        </a>
        <a href="{{ route('berita.index', ['kategori' => 'Lainnya']) }}" 
           class="whitespace-nowrap px-4 py-2 rounded-lg {{ request('kategori') == 'Lainnya' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
            Lainnya
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Berita -->
    <div class="flex justify-between items-center mb-6">
        <p class="text-gray-600">Total {{ $beritas->total() }} berita ditemukan</p>
        <a href="{{ route('berita.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Berita
        </a>
    </div>

    <!-- Daftar Berita -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($beritas as $berita)
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">

            <div class="p-4">
                <!-- Kategori & Tanggal -->
                <div class="flex justify-between items-center mb-2">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full
                        @if($berita->kategori == 'Pengumuman') bg-blue-100 text-blue-700 
                        @elseif($berita->kategori == 'Prestasi') bg-green-100 text-green-700 
                        @elseif($berita->kategori == 'Kegiatan') bg-yellow-100 text-yellow-700 
                        @else bg-gray-100 text-gray-700 @endif">
                        {{ $berita->kategori }}
                    </span>
                    <span class="text-xs text-gray-500">
                        {{ $berita->created_at->format('d M Y') }}
                    </span>
                </div>

                <!-- Judul -->
                <h3 class="font-bold text-lg mb-2 line-clamp-2">
                    {{ $berita->judul }}
                </h3>

                <!-- Konten Singkat -->
                <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                    {{ Str::limit(strip_tags($berita->konten), 100) }}
                </p>

                <!-- Penulis -->
                <p class="text-xs text-gray-500 mb-4">
                    Oleh: {{ $berita->penulis }}
                </p>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center">
                    <a href="{{ route('berita.show', $berita) }}" 
                       class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center">
                        Baca Selengkapnya 
                        <i class="fas fa-arrow-right ml-1 text-xs"></i>
                    </a>

                    <div class="flex space-x-2">
                        <a href="{{ route('berita.edit', $berita) }}" 
                           class="text-green-600 hover:text-green-800">
                            <i class="fas fa-edit"></i>
                        </a>
                        
                        <!-- FORM DELETE YANG BENAR -->
                        <form action="{{ route('berita.destroy', $berita) }}" 
                              method="POST" 
                              class="inline"
                              onsubmit="return confirm('Hapus berita \"{{ $berita->judul }}\"?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12">
            <i class="fas fa-newspaper text-gray-400 text-6xl mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada berita</p>
            <a href="{{ route('berita.create') }}" class="text-blue-600 hover:text-blue-800 mt-2 inline-block">
                Tambah berita pertama
            </a>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($beritas->hasPages())
    <div class="mt-6">
        {{ $beritas->links() }}
    </div>
    @endif
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection