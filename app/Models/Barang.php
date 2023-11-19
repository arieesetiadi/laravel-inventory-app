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

    protected $guarded = [];

    /**
     * Relasi pemasok
     */
    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'id_pemasok');
    }
}
