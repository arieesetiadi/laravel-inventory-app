<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public $table = 'barang';
    public $primaryKey = 'id_barang';
    public $timestamps = false;
    public $appends = ['stock'];

    protected $guarded = [];

    /**
     * Relasi pemasok
     */
    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'id_pemasok');
    }

    /**
     * Reasi barang masuk
     */
    public function masuk()
    {
        return $this->hasMany(BarangMasuk::class, 'id_barang');
    }

    /**
     * Reasi barang keluar
     */
    public function keluar()
    {
        return $this->hasMany(BarangKeluar::class, 'id_barang');
    }

    /**
     * Relasi stok barang
     */
    public function stokBarang()
    {
        return $this->hasOne(StokBarang::class, 'id_barang');
    }

    /**
     * Perhitungan stock
     */
    public function getStockAttribute()
    {
        $jumlahMasuk = $this->masuk()->get()->sum('jumlah');
        $jumlahKeluar = $this->keluar()->get()->sum('jumlah');

        return $jumlahMasuk - $jumlahKeluar;
    }
}
