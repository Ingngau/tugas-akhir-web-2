<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SMPN 2 Gangga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .nav-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 100%);
        }
        .card-gradient {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        .stats-gradient-1 {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        .stats-gradient-2 {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }
        .stats-gradient-3 {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }
        .hover-lift {
            transition: all 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <!-- Navigation -->
    <nav class="nav-gradient text-white shadow-xl sticky top-0 z-50 backdrop-blur-md bg-opacity-95">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="bg-white/20 p-2 rounded-xl">
                        <i class="fas fa-school text-2xl text-white"></i>
                    </div>
                    <a href="{{ route('home') }}" class="text-2xl font-black tracking-tight bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                        SMPN 2 GANGGA
                    </a>
                </div>
                <div class="hidden md:flex space-x-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-xl font-semibold hover:bg-white/10 transition-all duration-300 hover:scale-105">Home</a>
                    <a href="{{ route('profil.index') }}" class="px-4 py-2 rounded-xl font-semibold hover:bg-white/10 transition-all duration-300 hover:scale-105">Profil</a>
                    <a href="{{ route('guru.index') }}" class="px-4 py-2 rounded-xl font-semibold hover:bg-white/10 transition-all duration-300 hover:scale-105">Guru</a>
                    <a href="{{ route('siswa.index') }}" class="px-4 py-2 rounded-xl font-semibold hover:bg-white/10 transition-all duration-300 hover:scale-105">Siswa</a>
                    <a href="{{ route('berita.index') }}" class="px-4 py-2 rounded-xl font-semibold hover:bg-white/10 transition-all duration-300 hover:scale-105">Berita</a>
                    <a href="{{ route('pengumuman.index') }}" class="px-4 py-2 rounded-xl font-semibold hover:bg-white/10 transition-all duration-300 hover:scale-105">Pengumuman</a>
                </div>
                <div class="md:hidden">
                    <button id="menu-toggle" class="bg-white/20 p-3 rounded-xl hover:bg-white/30 transition">
                        <i class="fas fa-bars text-white"></i>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4 bg-white/10 rounded-b-2xl backdrop-blur-md">
                <a href="{{ route('home') }}" class="block py-3 px-6 hover:bg-white/10 rounded-lg transition font-semibold">Home</a>
                <a href="{{ route('profil.index') }}" class="block py-3 px-6 hover:bg-white/10 rounded-lg transition font-semibold">Profil</a>
                <a href="{{ route('guru.index') }}" class="block py-3 px-6 hover:bg-white/10 rounded-lg transition font-semibold">Guru</a>
                <a href="{{ route('siswa.index') }}" class="block py-3 px-6 hover:bg-white/10 rounded-lg transition font-semibold">Siswa</a>
                <a href="{{ route('berita.index') }}" class="block py-3 px-6 hover:bg-white/10 rounded-lg transition font-semibold">Berita</a>
                <a href="{{ route('pengumuman.index') }}" class="block py-3 px-6 hover:bg-white/10 rounded-lg transition font-semibold">Pengumuman</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-slate-900 to-blue-900 text-white py-12 mt-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <div class="flex justify-center items-center mb-6">
                    <div class="bg-white/20 p-3 rounded-2xl mr-4">
                        <i class="fas fa-school text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-black bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">SMPN 2 GANGGA</h3>
                </div>
                <p class="text-blue-200 mb-4 max-w-2xl mx-auto leading-relaxed">
                    Membangun generasi berkarakter dan berprestasi melalui pendidikan berkualitas 
                    yang menginspirasi dan mempersiapkan siswa untuk masa depan yang gemilang.
                </p>
                <div class="flex justify-center space-x-6 mb-6">
                    <a href="#" class="bg-white/10 p-3 rounded-xl hover:bg-white/20 transition hover:scale-110">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="bg-white/10 p-3 rounded-xl hover:bg-white/20 transition hover:scale-110">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="bg-white/10 p-3 rounded-xl hover:bg-white/20 transition hover:scale-110">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="bg-white/10 p-3 rounded-xl hover:bg-white/20 transition hover:scale-110">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
                <p class="text-blue-300 text-sm font-medium">
                    &copy; 2024 SMPN 2 Gangga. All rights reserved. | 
                    <span class="text-white">Designed with ❤️ for better education</span>
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('animate-fadeIn');
        });
    </script>
</body>
</html>