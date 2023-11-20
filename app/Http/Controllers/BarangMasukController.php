<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\StokBarang;
use App\Traits\HasWebResponses;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    use HasWebResponses;

    /**
     * Redirect ke halaman utama barang masuk.
     */
    public function halamanUtamaBarangMasuk()
    {
        // Ambil seluruh data barang masuk dari database
        $barangMasuk = BarangMasuk::query()->with('barang')->orderBy('tgl_masuk', 'DESC')->get();

        // Redirect ke halaman utama barang masuk
        // Beserta dengan seluruh data barang masuk yang sudah diambil diatas
        return view('pages.barang-masuk.halaman-utama-barang-masuk')->with([
            'barangMasuk' => $barangMasuk,
        ]);
    }

    /**
     * Redirect ke halaman tambah barang masuk.
     */
    public function halamanTambahBarangMasuk()
    {
        // Ambil data barang sebagai pilihan di form
        $barang = Barang::all();

        return view('pages.barang-masuk.halaman-tambah-barang-masuk')->with([
            'barang' => $barang,
        ]);
    }

    /**
     * Proses tambah data barang masuk ke database.
     */
    public function prosesTambahBarangMasuk(Request $request)
    {
        // Ambil data dari form tambah barang masuk
        $data = [
            'id_barang' => $request->input('id_barang'),
            'tgl_masuk' => $request->input('tgl_masuk'),
            'nomor_nota' => $request->input('nomor_nota'),
            'jumlah' => $request->input('jumlah'),
            'nama_barang' => Barang::query()->find($request->id_barang)->nama_barang,
        ];

        // Insert data tersebut ke database
        $result = BarangMasuk::query()->create($data);

        // Ubah data stok barang sesuai jumlah barang masuk.
        StokBarang::query()->where('id_barang', $request->id_barang)->increment('jumlah', $request->jumlah);

        if (!$result) {
            $this->failed('Gagal menambah data barang masuk');
        }

        // Redirect ke halaman utama barang masuk setelah proses insert
        return $this->success('Berhasil menambah data barang masuk', route('halamanUtamaBarangMasuk'));
    }

    /**
     * Redirect ke halaman ubah barang masuk.
     */
    public function halamanUbahBarangMasuk($idBarangMasuk)
    {
        // Ambil data barang masuk yang ingin diubah berdasarkan id
        $barangMasuk = BarangMasuk::query()->findOrFail($idBarangMasuk);

        // Ambil data barang sebagai pilihan di form
        $barang = Barang::all();

        // Redirect ke halaman ubah barang masuk beserta data barang masuk yang ingin diubah
        return view('pages.barang-masuk.halaman-ubah-barang-masuk')->with([
            'barangMasuk' => $barangMasuk,
            'barang' => $barang
        ]);
    }

    /**
     * Proses ubah data barang masuk pada database.
     */
    public function prosesUbahBarangMasuk(Request $request, $idBarangMasuk)
    {
        // Ambil data dari form ubah barang masuk
        $data = [
            'id_barang' => $request->input('id_barang'),
            'tgl_masuk' => $request->input('tgl_masuk'),
            'nomor_nota' => $request->input('nomor_nota'),
            'jumlah' => $request->input('jumlah'),
            'nama_barang' => Barang::query()->find($request->id_barang)->nama_barang,
        ];

        $jumlah = $request->jumlah - $request->jumlah_prev;

        // Ambil terlebih dahulu data barang masuk yang ingin diubah dari database
        $barangMasuk = BarangMasuk::query()->findOrFail($idBarangMasuk);

        // Ubah barang masuk tersebut dengan data terbaru
        $result = $barangMasuk->update($data);

        // Ubah data stok barang sesuai jumlah barang masuk.
        StokBarang::query()->where('id_barang', $request->id_barang)->increment('jumlah', $jumlah);

        if (!$result) {
            $this->failed('Gagal mengubah data barang masuk');
        }

        // Redirect ke halaman utama barang masuk setelah proses ubah
        return $this->success('Berhasil mengubah data barang masuk', route('halamanUtamaBarangMasuk'));
    }

    /**
     * Proses hapus data barang masuk dari database
     */
    public function prosesHapusBarangMasuk($idBarangMasuk)
    {
        // Hapus dari database barang masuk berdasarkan id
        BarangMasuk::query()->find($idBarangMasuk)->delete();

        // Redirect ke halaman utama barang masuk setelah proses hapus
        return $this->success('Berhasil menghapus data barang masuk', route('halamanUtamaBarangMasuk'));
    }
}
