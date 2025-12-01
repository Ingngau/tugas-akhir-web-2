<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Kelas;
use App\Models\Ekstrakurikuler;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Jadwal;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'profil' => Profil::first(),
            'guruCount' => Guru::count(),
            'siswaCount' => Siswa::count(),
            'prestasiCount' => Prestasi::count(),
            'pengumumanCount' => Pengumuman::count(),
            'kelasCount' => Kelas::count(),
            'eskulCount' => Ekstrakurikuler::count(),
            'mapelCount' => Mapel::count(),
            'nilaiCount' => Nilai::count(),
            'jadwalCount' => Jadwal::count(),
            'beritaTerbaru' => Berita::latest()->take(3)->get()
        ]);
    }
}
