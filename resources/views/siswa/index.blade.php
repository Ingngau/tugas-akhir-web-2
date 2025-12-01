@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="container mx-auto px-4 py-8">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Data Siswa</h1>
        <a href="{{ route('siswa.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Siswa
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif


    {{-- Tabel --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NISN</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @forelse($siswas as $siswa)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 font-mono">{{ $siswa->nisn }}</td>

                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">{{ $siswa->nama }}</div>
                            <div class="text-sm text-gray-500">{{ $siswa->email }}</div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $siswa->kelas }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            @if($siswa->jurusan)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $siswa->jurusan }}
                                </span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-sm font-medium flex gap-3">

                            <a href="{{ route('siswa.show', $siswa) }}" class="text-blue-600 hover:text-blue-900" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('siswa.edit', $siswa) }}" class="text-green-600 hover:text-green-900" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('siswa.destroy', $siswa) }}" 
                                  method="POST" class="inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            <i class="fas fa-users text-4xl mb-2 text-gray-300"></i>
                            <p>Belum ada data siswa.</p>
                            <a href="{{ route('siswa.create') }}" class="text-blue-600 hover:text-blue-800">
                                Tambah siswa pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($siswas->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                {{ $siswas->links() }}
            </div>
        @endif
    </div>


{{-- Script Filter --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const kelasFilter = document.getElementById('kelas');
    const jurusanFilter = document.getElementById('jurusan');

    const rows = document.querySelectorAll('tbody tr');

    function filterTable() {
        const search = searchInput.value.toLowerCase();
        const kelas = kelasFilter.value;
        const jurusan = jurusanFilter.value;

        rows.forEach(row => {

            const nisn    = row.cells[1]?.textContent.toLowerCase() || '';
            const nama    = row.cells[2]?.textContent.toLowerCase() || '';
            const kelasTd = row.cells[3]?.textContent || '';
            const jurTd   = row.cells[4]?.textContent || '';

            const matchSearch  = nisn.includes(search) || nama.includes(search);
            const matchKelas   = !kelas   || kelasTd.includes(kelas);
            const matchJurusan = !jurusan || jurTd.includes(jurusan);

            row.style.display = (matchSearch && matchKelas && matchJurusan) ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTable);
    kelasFilter.addEventListener('change', filterTable);
    jurusanFilter.addEventListener('change', filterTable);
});
</script>

@endsection
