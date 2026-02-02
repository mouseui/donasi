<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Donatur extends Model
{
    protected $table = 'donatur';
    
    protected $fillable = [
        'nama_donatur',
        'email',
        'no_hp',
    ];

    public function donasi(): HasMany
    {
        return $this->hasMany(Donasi::class, 'donatur_id');
    }
}