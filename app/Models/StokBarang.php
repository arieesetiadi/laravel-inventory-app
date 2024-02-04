<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    use HasFactory;

    public $table = 'stok_barang';
    public $primaryKey = 'id_stok_barang';
    public $timestamps = false;
    public $appends = ['stock', 'age'];

    protected $guarded = [];

    /**
     * Relasi ke barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function getAgeAttribute(): int
    {
        return 0;
    }
}
