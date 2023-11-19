<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 20) as $i) {
            Barang::query()->create([
                'nama_barang' => 'Barang ' . $i,
                'id_pemasok' => rand(1, 15),
            ]);
        }
    }
}
