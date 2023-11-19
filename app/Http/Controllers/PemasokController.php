<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HasWebResponses;
use App\Models\Pemasok;

class PemasokController extends Controller
{
    use HasWebResponses;

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

    /**
     * Proses tambah data pemasok ke database.
     */
    public function prosesTambahPemasok(Request $request)
    {
        // Ambil data dari form tambah pemasok
        $data = [
            'nama_pemasok' => $request->input('nama_pemasok'),
            'alamat' => $request->input('alamat'),
            'telp' => $request->input('telp'),
        ];

        // Insert data tersebut ke database
        $result = Pemasok::query()->create($data);

        if (!$result) {
            $this->failed('Gagal menambah data pemasok');
        }

        // Redirect ke halaman utama pemasok setelah proses insert
        return $this->success('Berhasil menambah data pemasok', route('halamanUtamaPemasok'));
    }

    /**
     * Redirect ke halaman ubah pemasok.
     */
    public function halamanUbahPemasok($idPemasok)
    {
        // Ambil data pemasok yang ingin diubah berdasarkan id
        $pemasok = Pemasok::query()->findOrFail($idPemasok);

        // Redirect ke halaman ubah pemasok beserta data pemasok yang ingin diubah
        return view('pages.pemasok.halaman-ubah-pemasok')->with([
            'pemasok' => $pemasok
        ]);
    }

    /**
     * Proses ubah data pemasok pada database.
     */
    public function prosesUbahPemasok(Request $request, $idPemasok)
    {
        // Ambil data dari form ubah pemasok
        $data = [
            'nama_pemasok' => $request->input('nama_pemasok'),
            'alamat' => $request->input('alamat'),
            'telp' => $request->input('telp'),
        ];

        // Ambil terlebih dahulu data pemasok yang ingin diubah dari database
        $pemasok = Pemasok::query()->findOrFail($idPemasok);

        // Ubah pemasok tersebut dengan data terbaru
        $result = $pemasok->update($data);

        if (!$result) {
            $this->failed('Gagal mengubah data pemasok');
        }

        // Redirect ke halaman utama pemasok setelah proses ubah
        return $this->success('Berhasil mengubah data pemasok', route('halamanUtamaPemasok'));
    }

    /**
     * Proses hapus data pemasok dari database
     */
    public function prosesHapusPemasok($idPemasok)
    {
        // Hapus dari database pemasok berdasarkan id
        Pemasok::query()->find($idPemasok)->delete();

        // Redirect ke halaman utama pemasok setelah proses hapus
        return $this->success('Berhasil menghapus data pemasok', route('halamanUtamaPemasok'));
    }
}
