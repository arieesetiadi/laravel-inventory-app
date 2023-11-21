<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    public $table = 'barang_masuk';
    public $primaryKey = 'id_brng_masuk';
    public $timestamps = false;

    protected $guarded = [];

    /**
     * Relasi barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    /**
     * Get data barang masuk
     */
    public static function getData()
    {
        return self::query()
            ->when(request()->start_date != null, function (Builder $query) {
                return $query->whereDate('tgl_masuk', '>=', request()->start_date);
            })
            ->when(request()->end_date != null, function (Builder $query) {
                return $query->whereDate('tgl_masuk', '<=', request()->end_date);
            })
            ->with('barang')
            ->orderBy('tgl_masuk', 'DESC')
            ->get();
    }
}
