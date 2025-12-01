<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profil;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Profil::create([
            'nama_sekolah' => 'SMP NEGERI 2 GANGGA',
            'npsn' => '50200327',
            'alamat' => 'Jln. Raya Luk km. 46,5',
            'telepon' => '(0542) 7774016',
            'email' => 'smpduagangga@gmail.com',
            'website' => 'www.smpn2gangga.sch.id',
            'sejarah' => 'SMP 2 Gangga bermula sebagai sekolah swasta pada pertengahan 1970-an (tercatat berdiri sekitar 1975 menurut arsip blog sekolah), kemudian pada 14 Juli 1981 dilegitimasi secara formal menjadi sekolah negeri/filial melalui SK pendirian No. 0220/0/1981 dan resmi beroperasi sebagai SMP Negeri 1 Gangga.
Sejak menjadi sekolah negeri, sekolah ini berkembang menjadi pusat pendidikan menengah pertama untuk Kecamatan Gangga mengalami beberapa kali pergantian kepemimpinan.
Lokasi sekolah berada di Jl. Raya Gondang (Desa Gondang), Kecamatan Gangga; meskipun pada masa awal administratif wilayahnya sempat tercatat berbeda (sebagian sumber lama menyebutkan kaitan kerja administratif dengan wilayah Lombok Barat), sekarang jelas berada di Kabupaten Lombok Utara.
Selama dekade-dekade berikutnya SMPN 1 Gangga aktif mengembangkan kegiatan akademik dan ekstrakurikuler, menata akreditasi dan sertifikasi (tercatat akreditasi “A” pada sumber direktori), serta mempublikasikan kegiatan lewat blog dan media sosial sekolah.',
            'visi' => 'BERIMAN BERBUDAYA (BERPRESTASI, INOVATIF, MANDIRI, DAN BERKARAKTER BUDAYA BANGSA) UNTUK MEWUJUDKAN PROFIL PELAJAR PANCASILA.',
            'misi' => 'a.	Menciptakan profil pengajar yang berakhlak mulia dan rajin beribadah.
b.	Menciptakan pembelajaran yang menarik, menyenangkan dan berkarakter yang mampu memfasilitasi pelajar sesuai bakat dan minatnya.
c.	Meningkatkan manajemen satuan pendidikan yang adaftif, berkarakter, dan menjamin mutu.
d.	Menciptakan lingkungan sekolah sebagai tempat perkembangan intelektual, sosial, emosional, ketrampilan dan pengembangan budaya lokal dalam kebhinekaan global.
e.	Menciptakan profil pelajar yang berakhak mulia, mandiri, bernalar kritis dan kreatif sehingga mampu mengkreasi ide dan keterampilan yang inovatif.
f.	Menjamin hak belajar setiap anak tanpa terkecuali dalam proses pembelajaran yang menjunjung tinggi nilai gotong-royong.
g.	Menciptakan partisipasi aktif orang tua dan masyarakat dalam keberagaman yang mewadahi kreatifitas pelajar yang berjiwa kompetitif.
h.	Mewujudkan lulusan yang unggul dalam bidang akademik dan non akademik.
i.	Mewujudkan pendidikan yang mengedepankan pembentukan komunitas belajar sepanjang hayat yaitu guru, peserta didik dan orang tua saling belajar sepanjang hidupnya.
j.	Mewujudkan pendidikan yang mengedepankan pembentukan profil pelajar Pancasila.
k.	Mewujudkan pendidikan yang menjamin hak belajar bagi setiap peserta didik.
l.	Mewujudkan pendidikan menggunakan pendekatan atau model yang beragam.
m.	Mewujudkan pendidikan mengembangkan keterampilan abad 21.',
        ]);

        $gurus = [
            [
                'nip' => '196512151987031001',
                'nama' => 'Drs. I Wayan Sutama, M.Pd.',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Mataram',
                'tanggal_lahir' => '1965-12-15',
                'alamat' => 'Jl. Majapahit No. 25, Gangga',
                'telepon' => '081239876543',
                'email' => 'wayan.sutama@smpn2gangga.sch.id',
                'jabatan' => 'Kepala Sekolah',
                'mata_pelajaran' => '-',
                'kelas_diampu' => '-',
            ],
            [
                'nip' => '197003201992122001',
                'nama' => 'Diana Sari, S.Pd.',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Senggigi',
                'tanggal_lahir' => '1970-03-20',
                'alamat' => 'Jl. Raya Senggigi No. 45, Gangga',
                'telepon' => '081234567890',
                'email' => 'diana.sari@smpn2gangga.sch.id',
                'jabatan' => 'Guru Matematika',
                'mata_pelajaran' => 'Matematika',
                'kelas_diampu' => 'VII, VIII, IX',
            ],
            [
                'nip' => '197508151999031002',
                'nama' => 'Ahmad Fauzi, S.Pd.',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Tanjung',
                'tanggal_lahir' => '1975-08-15',
                'alamat' => 'Jl. Pantai Malimbu No. 12, Gangga',
                'telepon' => '081345678901',
                'email' => 'ahmad.fauzi@smpn2gangga.sch.id',
                'jabatan' => 'Guru IPA',
                'mata_pelajaran' => 'IPA',
                'kelas_diampu' => 'VII, VIII, IX',
            ],
            [
                'nip' => '198012102005012001',
                'nama' => 'Siti Rahayu, S.Pd.',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Pemenang',
                'tanggal_lahir' => '1980-12-10',
                'alamat' => 'Jl. Kayangan No. 8, Gangga',
                'telepon' => '081456789012',
                'email' => 'siti.rahayu@smpn2gangga.sch.id',
                'jabatan' => 'Guru Bahasa Indonesia',
                'mata_pelajaran' => 'Bahasa Indonesia',
                'kelas_diampu' => 'VII, VIII, IX',
            ],
            [
                'nip' => '198504252008011001',
                'nama' => 'Komang Adi, S.Pd.',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Bayan',
                'tanggal_lahir' => '1985-04-25',
                'alamat' => 'Jl. Rinjani No. 30, Gangga',
                'telepon' => '081567890123',
                'email' => 'komang.adi@smpn2gangga.sch.id',
                'jabatan' => 'Guru IPS',
                'mata_pelajaran' => 'IPS',
                'kelas_diampu' => 'VII, VIII, IX',
            ],
            [
                'nip' => '198909152012022001',
                'nama' => 'Luh Putu Sari, S.Pd.',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Sembalun',
                'tanggal_lahir' => '1989-09-15',
                'alamat' => 'Jl. Sembalun No. 15, Gangga',
                'telepon' => '081678901234',
                'email' => 'putu.sari@smpn2gangga.sch.id',
                'jabatan' => 'Guru Bahasa Inggris',
                'mata_pelajaran' => 'Bahasa Inggris',
                'kelas_diampu' => 'VII, VIII, IX',
            ],
            [
                'nip' => '199002182015011001',
                'nama' => 'Muhammad Rizki, S.Pd.',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Gangga',
                'tanggal_lahir' => '1990-02-18',
                'alamat' => 'Jl. Gangga Indah No. 5, Gangga',
                'telepon' => '081789012345',
                'email' => 'muhammad.rizki@smpn2gangga.sch.id',
                'jabatan' => 'Guru Olahraga',
                'mata_pelajaran' => 'PJOK',
                'kelas_diampu' => 'VII, VIII, IX',
            ],
            [
                'nip' => '199106102017022001',
                'nama' => 'Ni Made Ayu, S.Pd.',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Sukadana',
                'tanggal_lahir' => '1991-06-10',
                'alamat' => 'Jl. Sukadana No. 20, Gangga',
                'telepon' => '081890123456',
                'email' => 'made.ayu@smpn2gangga.sch.id',
                'jabatan' => 'Guru Seni Budaya',
                'mata_pelajaran' => 'Seni Budaya',
                'kelas_diampu' => 'VII, VIII, IX',
            ]
        ];

        foreach ($gurus as $guru) {
            Guru::create($guru);
        }

        // Data Siswa - Juga ubah di sini
        $siswas = [
            // Kelas VII
            [
                'nisn' => '0091234501',
                'nama' => 'Putri Indah Lestari',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Gangga',
                'tanggal_lahir' => '2011-03-15',
                'alamat' => 'Jl. Pantai Malimbu No. 10, Gangga',
                'telepon' => '081311223301',
                'email' => 'putri.indah@smpn2gangga.sch.id',
                'kelas' => 'VII A',
                'jurusan' => '-',
            ],
            [
                'nisn' => '0091234502',
                'nama' => 'Ahmad Rizki Maulana',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Tanjung',
                'tanggal_lahir' => '2011-05-20',
                'alamat' => 'Jl. Tanjung Biru No. 25, Tanjung',
                'telepon' => '081311223302',
                'email' => 'ahmad.rizki@smpn2gangga.sch.id',
                'kelas' => 'VII A',
                'jurusan' => '-',
            ],
            [
                'nisn' => '0091234503',
                'nama' => 'Sari Dewi Utami',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Gangga',
                'tanggal_lahir' => '2011-07-12',
                'alamat' => 'Jl. Rinjani No. 8, Gangga',
                'telepon' => '081311223303',
                'email' => 'sari.dewi@smpn2gangga.sch.id',
                'kelas' => 'VII B',
                'jurusan' => '-',
            ],
            [
                'nisn' => '0091234504',
                'nama' => 'Komang Adi Putra',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Senggigi',
                'tanggal_lahir' => '2011-01-30',
                'alamat' => 'Jl. Senggigi Indah No. 15, Senggigi',
                'telepon' => '081311223304',
                'email' => 'komang.adi@smpn2gangga.sch.id',
                'kelas' => 'VII B',
                'jurusan' => '-',
            ],

            // Kelas VIII
            [
                'nisn' => '0081234501',
                'nama' => 'Luh Putu Widiastuti',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Gangga',
                'tanggal_lahir' => '2010-04-18',
                'alamat' => 'Jl. Kayangan No. 12, Gangga',
                'telepon' => '081311223305',
                'email' => 'putu.widi@smpn2gangga.sch.id',
                'kelas' => 'VIII A',
                'jurusan' => '-',
            ],
            [
                'nisn' => '0081234502',
                'nama' => 'Muhammad Fajar',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Pemenang',
                'tanggal_lahir' => '2010-08-22',
                'alamat' => 'Jl. Pemenang No. 30, Pemenang',
                'telepon' => '081311223306',
                'email' => 'muhammad.fajar@smpn2gangga.sch.id',
                'kelas' => 'VIII A',
                'jurusan' => '-',
            ],
            [
                'nisn' => '0081234503',
                'nama' => 'Ni Kadek Santi',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Gangga',
                'tanggal_lahir' => '2010-11-05',
                'alamat' => 'Jl. Sembalun No. 5, Gangga',
                'telepon' => '081311223307',
                'email' => 'kadek.santi@smpn2gangga.sch.id',
                'kelas' => 'VIII B',
                'jurusan' => '-',
            ],
            [
                'nisn' => '0081234504',
                'nama' => 'I Wayan Budiarta',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Bayan',
                'tanggal_lahir' => '2010-02-14',
                'alamat' => 'Jl. Bayan No. 18, Bayan',
                'telepon' => '081311223308',
                'email' => 'wayan.budi@smpn2gangga.sch.id',
                'kelas' => 'VIII B',
                'jurusan' => '-',
            ],

            // Kelas IX
            [
                'nisn' => '0071234501',
                'nama' => 'Ahmad Rizki Pratama',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Gangga',
                'tanggal_lahir' => '2009-05-15',
                'alamat' => 'Jl. Melati No. 23, Gangga',
                'telepon' => '081311223309',
                'email' => 'ahmad.pratama@smpn2gangga.sch.id',
                'kelas' => 'IX A',
                'jurusan' => '-',
            ],
            [
                'nisn' => '0071234502',
                'nama' => 'Sari Dewi Lestari',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Gangga',
                'tanggal_lahir' => '2009-08-20',
                'alamat' => 'Jl. Mawar No. 56, Gangga',
                'telepon' => '081311223310',
                'email' => 'sari.lestari@smpn2gangga.sch.id',
                'kelas' => 'IX A',
                'jurusan' => '-',
            ],
            [
                'nisn' => '0071234503',
                'nama' => 'Putu Adi Wijaya',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Sukadana',
                'tanggal_lahir' => '2009-12-10',
                'alamat' => 'Jl. Sukadana No. 7, Sukadana',
                'telepon' => '081311223311',
                'email' => 'putu.adi@smpn2gangga.sch.id',
                'kelas' => 'IX B',
                'jurusan' => '-',
            ],
            [
                'nisn' => '0071234504',
                'nama' => 'Ni Made Sinta Dewi',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Gangga',
                'tanggal_lahir' => '2009-03-25',
                'alamat' => 'Jl. Gangga Indah No. 3, Gangga',
                'telepon' => '081311223312',
                'email' => 'made.sinta@smpn2gangga.sch.id',
                'kelas' => 'IX B',
                'jurusan' => '-',
            ],
            [
                'nisn' => '0071234505',
                'nama' => 'Komang Ariawan',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Tanjung',
                'tanggal_lahir' => '2009-07-08',
                'alamat' => 'Jl. Tanjung No. 45, Tanjung',
                'telepon' => '081311223313',
                'email' => 'komang.aria@smpn2gangga.sch.id',
                'kelas' => 'IX A',
                'jurusan' => '-',
            ],
            [
                'nisn' => '0071234506',
                'nama' => 'Luh Gede Ayu',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Senggigi',
                'tanggal_lahir' => '2009-09-17',
                'alamat' => 'Jl. Raya Senggigi No. 22, Senggigi',
                'telepon' => '081311223314',
                'email' => 'luh.ayu@smpn2gangga.sch.id',
                'kelas' => 'IX B',
                'jurusan' => '-',
            ]
        ];

        foreach ($siswas as $siswa) {
            Siswa::create($siswa);
        }
        // Data Berita
        Berita::create([
            'judul' => 'Penerimaan Peserta Didik Baru 2024',
            'konten' => 'Diberitahukan kepada masyarakat bahwa Penerimaan Peserta Didik Baru (PPDB) SMA Negeri 1 Jakarta Tahun Ajaran 2024/2025 akan dibuka mulai tanggal 1 Juni 2024...',
            'penulis' => 'Admin',
            'kategori' => 'Pengumuman',
            'is_anonymous' => false,
        ]);

        Berita::create([
            'judul' => 'Siswa SMPN 2 Gangga Juara Olimpiade Matematika',
            'konten' => 'Siswa kami, Ahmad Rizki dari kelas IX A berhasil meraih medali emas dalam Olimpiade Matematika Nasional 2024 yang diselenggarakan di Bandung pada tanggal 15-20 November 2024.

            Dalam kompetisi yang diikuti oleh 500 peserta dari seluruh Indonesia, Ahmad berhasil menyelesaikan semua soal dengan sempurna dan mengungguli peserta lainnya.

            "Kami sangat bangga dengan prestasi Ahmad. Ini membuktikan bahwa dengan kerja keras dan dedikasi, siswa SMPN 2 Gangga mampu bersaing di tingkat nasional," ujar Surya Adi, S.Pd., Kepala Sekolah SMPN 2 Gangga.

            Prestasi ini merupakan yang ketiga kalinya diraih oleh siswa SMPN 2 Gangga dalam Olimpiade Matematika Nasional selama 5 tahun terakhir.

            **Jadwal Pembinaan Olimpiade:**
            - Senin & Rabu: 15.00 - 17.00 WIB
            - Sabtu: 08.00 - 12.00 WIB

            Bagi siswa yang berminat mengikuti pembinaan olimpiade, dapat mendaftar melalui wali kelas masing-masing.

            Salam prestasi!',
            'penulis' => 'Guru Matematika',
            'kategori' => 'Prestasi',
            'is_anonymous' => false,
        ]);
    }
}