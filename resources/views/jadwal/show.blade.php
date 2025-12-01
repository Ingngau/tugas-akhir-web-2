@extends('layouts.app')

@section('title', 'Detail Jadwal')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-600 text-white p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold">Jadwal Pelajaran</h1>
                        <p class="text-blue-100 mt-2">{{ $jadwal->hari }} - {{ $jadwal->kelas->nama_kelas ?? '-' }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" 
                           class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="inline">
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
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Jadwal</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Hari:</span>
                                    <span class="ml-2 px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                        {{ $jadwal->hari }}
                                    </span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Jam:</span>
                                    <span class="ml-2 font-mono">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-school text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Kelas:</span>
                                    <span class="ml-2">{{ $jadwal->kelas->nama_kelas ?? '-' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-book text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Mata Pelajaran:</span>
                                    <span class="ml-2">{{ $jadwal->mapel->nama_mapel ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Detail Pengajar</h3>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-chalkboard-teacher text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Guru:</span>
                                    <span class="ml-2">{{ $jadwal->guru->nama ?? '-' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-door-open text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Ruangan:</span>
                                    <span class="ml-2">{{ $jadwal->ruangan }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-layer-group text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Semester:</span>
                                    <span class="ml-2">{{ $jadwal->semester }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt text-blue-600 w-6"></i>
                                    <span class="ml-3 font-medium">Tahun Ajaran:</span>
                                    <span class="ml-2">{{ $jadwal->tahun_ajaran }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('jadwal.index') }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar
                        </a>
                        <div class="text-sm text-gray-500">
                            Terakhir diupdate: {{ $jadwal->updated_at->format('d M Y H:i') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection