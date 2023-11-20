<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\StokBarang;
use Illuminate\Database\Seeder;

class StokBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Barang::all() as $barang) {
            StokBarang::create([
                'id_barang' => $barang->id_barang,
                'jumlah' => 100,
                'nama_barang' => $barang->nama_barang,
            ]);
        }
    }
}
