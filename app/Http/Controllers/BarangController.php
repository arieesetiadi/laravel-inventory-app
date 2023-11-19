<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemasok;
use App\Traits\HasWebResponses;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    use HasWebResponses;

    /**
     * Redirect ke halaman utama barang.
     */
    public function halamanUtamaBarang()
    {
        // Ambil seluruh data barang dari database
        $barang = Barang::query()->with('pemasok')->orderBy('id_barang', 'DESC')->get();

        // Redirect ke halaman utama barang
        // Beserta dengan seluruh data barang yang sudah diambil diatas
        return view('pages.barang.halaman-utama-barang')->with([
            'barang' => $barang,
        ]);
    }

    /**
     * Redirect ke halaman tambah barang.
     */
    public function halamanTambahBarang()
    {
        // Ambil data pemasok sebagai pilihan di form
        $pemasok = Pemasok::all();

        return view('pages.barang.halaman-tambah-barang')->with([
            'pemasok' => $pemasok,
        ]);
    }

    /**
     * Proses tambah data barang ke database.
     */
    public function prosesTambahBarang(Request $request)
    {
        // Ambil data dari form tambah barang
        $data = [
            'nama_barang' => $request->input('nama_barang'),
            'id_pemasok' => $request->input('id_pemasok'),
        ];

        // Insert data tersebut ke database
        $result = Barang::query()->create($data);

        if (!$result) {
            $this->failed('Gagal menambah data barang');
        }

        // Redirect ke halaman utama barang setelah proses insert
        return $this->success('Berhasil menambah data barang', route('halamanUtamaBarang'));
    }

    /**
     * Redirect ke halaman ubah barang.
     */
    public function halamanUbahBarang($idBarang)
    {
        // Ambil data barang yang ingin diubah berdasarkan id
        $barang = Barang::query()->findOrFail($idBarang);

        // Ambil data pemasok sebagai pilihan di form
        $pemasok = Pemasok::all();

        // Redirect ke halaman ubah barang beserta data barang yang ingin diubah
        return view('pages.barang.halaman-ubah-barang')->with([
            'barang' => $barang,
            'pemasok' => $pemasok
        ]);
    }

    /**
     * Proses ubah data barang pada database.
     */
    public function prosesUbahBarang(Request $request, $idBarang)
    {
        // Ambil data dari form ubah barang
        $data = [
            'nama_barang' => $request->input('nama_barang'),
            'id_pemasok' => $request->input('id_pemasok'),
        ];

        // Ambil terlebih dahulu data barang yang ingin diubah dari database
        $barang = Barang::query()->findOrFail($idBarang);

        // Ubah barang tersebut dengan data terbaru
        $result = $barang->update($data);

        if (!$result) {
            $this->failed('Gagal mengubah data barang');
        }

        // Redirect ke halaman utama barang setelah proses ubah
        return $this->success('Berhasil mengubah data barang', route('halamanUtamaBarang'));
    }

    /**
     * Proses hapus data barang dari database
     */
    public function prosesHapusBarang($idBarang)
    {
        // Hapus dari database barang berdasarkan id
        Barang::query()->find($idBarang)->delete();

        // Redirect ke halaman utama barang setelah proses hapus
        return $this->success('Berhasil menghapus data barang', route('halamanUtamaBarang'));
    }
}
