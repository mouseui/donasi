<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriDonasi extends Model
{
    protected $table = 'kategori_donasi';
    
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function donasi(): HasMany
    {
        return $this->hasMany(Donasi::class, 'kategori_id');
    }
}