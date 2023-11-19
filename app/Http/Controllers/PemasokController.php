<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Redirect ke halaman utama pemasok.
     */
    public function halamanUtamaPemasok()
    {
        // Ambil seluruh data pemasok dari database
        $pemasok = Pemasok::query()->orderBy('id_pemasok', 'DESC')->get();

        // Redirect ke halaman utama pemasok
        // Beserta dengan seluruh data pemasok yang sudah diambil diatas
        return view('pages.pemasok.halaman-utama-pemasok')->with([
            'pemasok' => $pemasok,
        ]);
    }

    /**
     * Redirect ke halaman tambah pemasok.
     */
    public function halamanTambahPemasok()
    {
        return view('pages.pemasok.halaman-tambah-pemasok');
    }
}
