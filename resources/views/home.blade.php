@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <div class="gradient-bg text-white rounded-3xl p-12 mb-16 text-center shadow-2xl hover-lift relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative z-10">
            <h1 class="text-5xl md:text-6xl font-black mb-6 tracking-tight">
                Selamat Datang di 
                <span class="bg-gradient-to-r from-white to-yellow-200 bg-clip-text text-transparent">
                    @isset($profil->nama_sekolah)
                        {{ $profil->nama_sekolah }}
                    @else
                        SMPN 2 GANGGA
                    @endisset
                </span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 font-light text-blue-100 max-w-3xl mx-auto leading-relaxed">
                🎓 Membangun Generasi <span class="font-semibold text-yellow-200">Berkarakter</span> dan 
                <span class="font-semibold text-green-200">Berprestasi</span> melalui Pendidikan Berkualitas
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('profil.index') }}" class="bg-white text-blue-600 px-8 py-4 rounded-2xl font-bold shadow-2xl hover:bg-blue-50 transition-all duration-300 hover:scale-105 group">
                    🏫 Kenali Sekolah Kami <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                </a>
                <a href="{{ route('berita.index') }}" class="bg-white/20 text-white px-8 py-4 rounded-2xl font-bold border-2 border-white/30 hover:bg-white/30 transition-all duration-300 hover:scale-105 backdrop-blur-sm">
                    📢 Lihat Berita Terbaru
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
        <div class="stats-gradient-1 text-white rounded-2xl p-8 text-center shadow-2xl hover-lift group">
            <div class="bg-white/20 p-4 rounded-2xl inline-block mb-4 group-hover:scale-110 transition duration-300">
                <i class="fas fa-chalkboard-teacher text-4xl text-white"></i>
            </div>
            <h3 class="text-4xl font-black mb-2 text-white drop-shadow-lg">{{ $guruCount ?? 0 }}+</h3>
            <p class="text-blue-100 font-semibold text-lg">Guru Professional</p>
            <p class="text-blue-200 text-sm mt-2">Pengajar Berpengalaman & Bersertifikasi</p>
        </div>
        
        <div class="stats-gradient-2 text-white rounded-2xl p-8 text-center shadow-2xl hover-lift group">
            <div class="bg-white/20 p-4 rounded-2xl inline-block mb-4 group-hover:scale-110 transition duration-300">
                <i class="fas fa-user-graduate text-4xl text-white"></i>
            </div>
            <h3 class="text-4xl font-black mb-2 text-white drop-shadow-lg">{{ $siswaCount ?? 0 }}+</h3>
            <p class="text-green-100 font-semibold text-lg">Siswa Aktif</p>
            <p class="text-green-200 text-sm mt-2">Generasi Penerus Bangsa yang Berkualitas</p>
        </div>
    </div>

    <!-- Latest News -->
    @if(isset($beritaTerbaru) && count($beritaTerbaru) > 0)
    <div class="mb-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-4xl font-black text-gray-800">
                📰 <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Berita Terkini</span>
            </h2>
            <a href="{{ route('berita.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center group">
                Lihat Semua <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($beritaTerbaru as $berita)
            <div class="bg-white rounded-2xl shadow-xl hover-lift border border-gray-100 overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="bg-gradient-to-r from-blue-500 to-purple-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                            {{ $berita->kategori ?? 'Berita' }}
                        </span>
                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">
                            <i class="fas fa-clock mr-1"></i>{{ $berita->created_at->format('d M Y') }}
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 leading-tight group-hover:text-blue-600 transition duration-300 line-clamp-2">
                        {{ $berita->judul }}
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed line-clamp-3">
                        {{ Str::limit(strip_tags($berita->konten), 120) }}
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <span class="text-sm text-gray-500 flex items-center">
                            <i class="fas fa-user mr-2 text-blue-500"></i> {{ $berita->penulis ?? 'Admin' }}
                        </span>
                        <span class="text-sm text-gray-500 flex items-center">
                            <i class="fas fa-eye mr-2 text-green-500"></i> {{ $berita->views ?? 0 }}
                        </span>
                    </div>
                    <a href="{{ route('berita.show', $berita) }}" class="inline-block w-full mt-4 bg-gradient-to-r from-blue-500 to-purple-500 text-white text-center py-3 rounded-xl font-semibold hover:from-blue-600 hover:to-purple-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Quick Links -->
    <div class="mb-8">
        <h2 class="text-4xl font-black text-gray-800 mb-8 text-center">
            ⚡ <span class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Akses Cepat</span>
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <a href="{{ route('guru.index') }}" class="bg-white rounded-2xl p-6 text-center shadow-lg hover-lift group border-2 border-transparent hover:border-blue-500 transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-500 to-cyan-500 p-4 rounded-2xl inline-block mb-4 group-hover:scale-110 transition duration-300">
                    <i class="fas fa-users text-2xl text-white"></i>
                </div>
                <p class="font-bold text-gray-800 group-hover:text-blue-600 transition">Data Guru</p>
                <p class="text-sm text-gray-500 mt-1">Tenaga Pengajar</p>
            </a>
            
            <a href="{{ route('siswa.index') }}" class="bg-white rounded-2xl p-6 text-center shadow-lg hover-lift group border-2 border-transparent hover:border-green-500 transition-all duration-300">
                <div class="bg-gradient-to-r from-green-500 to-emerald-500 p-4 rounded-2xl inline-block mb-4 group-hover:scale-110 transition duration-300">
                    <i class="fas fa-graduation-cap text-2xl text-white"></i>
                </div>
                <p class="font-bold text-gray-800 group-hover:text-green-600 transition">Data Siswa</p>
                <p class="text-sm text-gray-500 mt-1">Peserta Didik</p>
            </a>
            
            <a href="{{ route('berita.index') }}" class="bg-white rounded-2xl p-6 text-center shadow-lg hover-lift group border-2 border-transparent hover:border-purple-500 transition-all duration-300">
                <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-4 rounded-2xl inline-block mb-4 group-hover:scale-110 transition duration-300">
                    <i class="fas fa-newspaper text-2xl text-white"></i>
                </div>
                <p class="font-bold text-gray-800 group-hover:text-purple-600 transition">Berita</p>
                <p class="text-sm text-gray-500 mt-1">Informasi Terbaru</p>
            </a>
            
            <a href="{{ route('profil.index') }}" class="bg-white rounded-2xl p-6 text-center shadow-lg hover-lift group border-2 border-transparent hover:border-orange-500 transition-all duration-300">
                <div class="bg-gradient-to-r from-orange-500 to-red-500 p-4 rounded-2xl inline-block mb-4 group-hover:scale-110 transition duration-300">
                    <i class="fas fa-info-circle text-2xl text-white"></i>
                </div>
                <p class="font-bold text-gray-800 group-hover:text-orange-600 transition">Profil</p>
                <p class="text-sm text-gray-500 mt-1">Identitas Sekolah</p>
            </a>
        </div>
    </div>
</div>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection