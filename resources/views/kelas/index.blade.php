@extends('layouts.app')

@section('title', 'Data Kelas')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Data Kelas</h1>
        <a href="{{ route('kelas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Kelas
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($kelas as $item)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border-l-4 border-blue-500">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-800">{{ $item->nama_kelas }}</h3>
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                        {{ $item->tingkat }}
                    </span>
                </div>
                
                <div class="space-y-2 mb-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-user-graduate mr-2"></i>
                        <span>Wali Kelas: {{ $item->wali_kelas }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-users mr-2"></i>
                        <span>Kapasitas: {{ $item->jumlah_siswa }} siswa</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-door-open mr-2"></i>
                        <span>Ruangan: {{ $item->ruangan }}</span>
                    </div>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('kelas.show', $item->id) }}" class="text-blue-600 hover:text-blue-900 text-sm">
                        <i class="fas fa-eye mr-1"></i>Detail
                    </a>
                    <a href="{{ route('kelas.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-900 text-sm">
                        <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                    <form action="{{ route('kelas.destroy', $item->id) }}" method="POST" class="inline">
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
        <div class="col-span-3 text-center py-8">
            <div class="text-gray-500">
                <i class="fas fa-school text-4xl mb-4"></i>
                <p>Tidak ada data kelas</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection