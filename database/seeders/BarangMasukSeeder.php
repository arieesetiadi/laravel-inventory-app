<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Database\Seeder;

class BarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 20) as $i) {
            $idBarang = Barang::query()->get()->pluck('id_barang')->random();
            $namaBarang = Barang::query()->find($idBarang)->nama_barang;

            BarangMasuk::query()->create([
                'id_barang' => $idBarang,
                'tgl_masuk' => now()->subDay(rand(1, 3))->addHour($i),
                'nama_barang' => $namaBarang,
                'nomor_nota' => 'INV-00' . $i,
                'jumlah' => rand(1, 100),
            ]);
        }
    }
}
