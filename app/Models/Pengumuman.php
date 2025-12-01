<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'kategori',
        'penulis',
        'tanggal',
        'isi',
        'status',
        'lampiran',
        'penting',
        'dilihat'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'penting' => 'boolean',
        'dilihat' => 'integer'
    ];
}
