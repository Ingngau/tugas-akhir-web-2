<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Tentukan nama table secara explicit
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'konten', 
        'penulis',
        'kategori',
        'gambar',
        'views',
        'is_anonymous',
        'status'
    ];

    protected $attributes = [
        'views' => 0,
        'status' => 'draft',
        'is_anonymous' => false
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Scope untuk berita yang published
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Scope untuk berita yang draft
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }
}