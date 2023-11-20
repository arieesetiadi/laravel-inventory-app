<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    public $table = 'barang_keluar';
    public $primaryKey = 'id_brng_keluar';
    public $timestamps = false;

    protected $guarded = [];

    /**
     * Relasi barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
