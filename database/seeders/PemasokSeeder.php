<?php

namespace Database\Seeders;

use App\Models\Pemasok;
use Illuminate\Database\Seeder;

class PemasokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 15) as $i) {
            Pemasok::create([
                'nama_pemasok' => 'Pemasok ' . $i,
                'telp' => '08212345678' . $i,
                'alamat' => 'Denpasar, Bali, Indonesia'
            ]);
        }
    }
}
