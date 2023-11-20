<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\BarangKeluar;

class BarangKeluarSeeder extends Seeder
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

            BarangKeluar::query()->create([
                'id_barang' => $idBarang,
                'tgl_keluar' => now()->subDay(rand(1, 3))->addHour($i),
                'nama_barang' => $namaBarang,
                'jumlah' => rand(1, 10),
            ]);
        }
    }
}
