<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donasi extends Model
{
    protected $table = 'donasi';
    
    protected $fillable = [
        'donatur_id',
        'kategori_id',
        'nominal',
        'pesan',
        'tanggal_donasi',
    ];

    public function donatur(): BelongsTo
    {
        return $this->belongsTo(Donatur::class, 'donatur_id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriDonasi::class, 'kategori_id');
    }
}