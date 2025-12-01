@extends('layouts.app')

@section('title', 'Edit Nilai')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-yellow-600 text-white p-6">
                <h1 class="text-2xl font-bold">Edit Nilai</h1>
                <p class="text-yellow-100">Edit nilai {{ $nilai->siswa->nama ?? '-' }} - {{ $nilai->mapel->nama_mapel ?? '-' }}</p>
            </div>

            <div class="p-6">
                <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="siswa_id" class="block text-sm font-medium text-gray-700">Siswa</label>
                            <select name="siswa_id" id="siswa_id" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                                <option value="">Pilih Siswa</option>
                                @foreach($siswa as $s)
                                    <option value="{{ $s->id }}" {{ old('siswa_id', $nilai->siswa_id) == $s->id ? 'selected' : '' }}>
                                        {{ $s->nama }} - {{ $s->nis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="mapel_id" class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
                                <select name="mapel_id" id="mapel_id" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                                    <option value="">Pilih Mapel</option>
                                    @foreach($mapel as $m)
                                        <option value="{{ $m->id }}" {{ old('mapel_id', $nilai->mapel_id) == $m->id ? 'selected' : '' }}>
                                            {{ $m->nama_mapel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas</label>
                                <select name="kelas_id" id="kelas_id" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                                    <option value="">Pilih Kelas</option>
                                    @foreach($kelas as $k)
                                        <option value="{{ $k->id }}" {{ old('kelas_id', $nilai->kelas_id) == $k->id ? 'selected' : '' }}>
                                            {{ $k->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                                <select name="semester" id="semester" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                                    <option value="">Pilih Semester</option>
                                    <option value="1" {{ old('semester', $nilai->semester) == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('semester', $nilai->semester) == '2' ? 'selected' : '' }}>2</option>
                                </select>
                            </div>

                            <div>
                                <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700">Tahun Ajaran</label>
                                <input type="text" name="tahun_ajaran" id="tahun_ajaran" value="{{ old('tahun_ajaran', $nilai->tahun_ajaran) }}" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500"
                                    placeholder="Contoh: 2024/2025">
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="nilai_tugas" class="block text-sm font-medium text-gray-700">Nilai Tugas</label>
                                <input type="number" name="nilai_tugas" id="nilai_tugas" value="{{ old('nilai_tugas', $nilai->nilai_tugas) }}" min="0" max="100" step="0.1"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                            </div>

                            <div>
                                <label for="nilai_uts" class="block text-sm font-medium text-gray-700">Nilai UTS</label>
                                <input type="number" name="nilai_uts" id="nilai_uts" value="{{ old('nilai_uts', $nilai->nilai_uts) }}" min="0" max="100" step="0.1"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                            </div>

                            <div>
                                <label for="nilai_uas" class="block text-sm font-medium text-gray-700">Nilai UAS</label>
                                <input type="number" name="nilai_uas" id="nilai_uas" value="{{ old('nilai_uas', $nilai->nilai_uas) }}" min="0" max="100" step="0.1"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                            </div>
                        </div>

                        <div>
                            <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai Akhir</label>
                            <input type="number" name="nilai" id="nilai" value="{{ old('nilai', $nilai->nilai) }}" min="0" max="100" step="0.1" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                        </div>

                        <div>
                            <label for="predikat" class="block text-sm font-medium text-gray-700">Predikat</label>
                            <select name="predikat" id="predikat" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500">
                                <option value="">Pilih Predikat</option>
                                <option value="A" {{ old('predikat', $nilai->predikat) == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ old('predikat', $nilai->predikat) == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ old('predikat', $nilai->predikat) == 'C' ? 'selected' : '' }}>C</option>
                                <option value="D" {{ old('predikat', $nilai->predikat) == 'D' ? 'selected' : '' }}>D</option>
                            </select>
                        </div>

                        <div>
                            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500"
                                placeholder="Keterangan tambahan">{{ old('keterangan', $nilai->keterangan) }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('nilai.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 transition">
                            Batal
                        </a>
                        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700 transition">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection