@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Pengumuman</h1>
        <a href="{{ route('pengumuman.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Pengumuman
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($pengumuman as $item)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border-l-4 border-blue-500 hover:shadow-xl transition">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-800 line-clamp-2">{{ $item->judul }}</h3>
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full whitespace-nowrap">
                        {{ $item->kategori }}
                    </span>
                </div>
                
                <div class="space-y-2 mb-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-user mr-2"></i>
                        <span>Oleh: {{ $item->penulis }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-calendar mr-2"></i>
                        <span>{{ $item->tanggal->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-eye mr-2"></i>
                        <span>Dibaca: {{ $item->dilihat }} kali</span>
                    </div>
                </div>

                <p class="text-gray-700 text-sm mb-4 line-clamp-3">{{ Str::limit($item->isi, 120) }}</p>

                <div class="flex justify-between items-center">
                    <div class="flex space-x-2">
                        <a href="{{ route('pengumuman.show', $item->id) }}" class="text-blue-600 hover:text-blue-900 text-sm">
                            <i class="fas fa-eye mr-1"></i>Baca
                        </a>
                        <a href="{{ route('pengumuman.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-900 text-sm">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                    </div>
                    <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900 text-sm" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="fas fa-trash mr-1"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12">
            <div class="text-gray-500">
                <i class="fas fa-bullhorn text-4xl mb-4"></i>
                <p class="text-lg">Belum ada pengumuman</p>
                <p class="text-sm mt-2">Klik tombol "Tambah Pengumuman" untuk menambahkan pengumuman pertama</p>
            </div>
        </div>
        @endforelse
    </div>

    @if($pengumuman->hasPages())
    <div class="mt-8">
        {{ $pengumuman->links() }}
    </div>
    @endif
</div>
@endsection