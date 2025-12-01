@extends('layouts.app')

@section('title', 'Detail Nilai')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-green-600 text-white p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold">Detail Nilai</h1>
                        <p class="text-green-100 mt-2">{{ $nilai->siswa->nama ?? '-' }} - {{ $nilai->mapel->nama_mapel ?? '-' }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('nilai.edit', $nilai->id) }}" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                        <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" class="inline">
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
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Siswa</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-user text-green-600 w-6"></i>
                                    <span class="ml-3 font-medium">Nama Siswa:</span>
                                    <span class="ml-2">{{ $nilai->siswa->nama ?? '-' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-id-card text-green-600 w-6"></i>
                                    <span class="ml-3 font-medium">NIS:</span>
                                    <span class="ml-2">{{ $nilai->siswa->nis ?? '-' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-school text-green-600 w-6"></i>
                                    <span class="ml-3 font-medium">Kelas:</span>
                                    <span class="ml-2">{{ $nilai->kelas->nama_kelas ?? '-' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-book text-green-600 w-6"></i>
                                    <span class="ml-3 font-medium">Mata Pelajaran:</span>
                                    <span class="ml-2">{{ $nilai->mapel->nama_mapel ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Detail Nilai</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Nilai Tugas:</span>
                                    <span class="font-bold {{ $nilai->nilai_tugas >= 75 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $nilai->nilai_tugas ?? '-' }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Nilai UTS:</span>
                                    <span class="font-bold {{ $nilai->nilai_uts >= 75 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $nilai->nilai_uts ?? '-' }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Nilai UAS:</span>
                                    <span class="font-bold {{ $nilai->nilai_uas >= 75 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $nilai->nilai_uas ?? '-' }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center border-t border-gray-200 pt-2">
                                    <span class="font-medium text-lg">Nilai Akhir:</span>
                                    <span class="font-bold text-xl 
                                        {{ $nilai->nilai >= 85 ? 'text-green-600' : 
                                           ($nilai->nilai >= 70 ? 'text-yellow-600' : 'text-red-600') }}">
                                        {{ $nilai->nilai }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Predikat:</span>
                                    <span class="px-2 py-1 text-xs rounded-full 
                                        {{ $nilai->predikat == 'A' ? 'bg-green-100 text-green-800' : 
                                           ($nilai->predikat == 'B' ? 'bg-yellow-100 text-yellow-800' : 
                                           ($nilai->predikat == 'C' ? 'bg-orange-100 text-orange-800' : 'bg-red-100 text-red-800')) }}">
                                        {{ $nilai->predikat }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Akademik</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span>Semester:</span>
                                    <span class="font-medium">{{ $nilai->semester }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Tahun Ajaran:</span>
                                    <span class="font-medium">{{ $nilai->tahun_ajaran }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($nilai->keterangan)
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Keterangan</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700">{{ $nilai->keterangan }}</p>
                    </div>
                </div>
                @endif

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('nilai.index') }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar
                        </a>
                        <div class="text-sm text-gray-500">
                            Diinput: {{ $nilai->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection