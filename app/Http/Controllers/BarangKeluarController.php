<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\StokBarang;
use App\Traits\HasWebResponses;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    use HasWebResponses;

    /**
     * Redirect ke halaman utama barang keluar.
     */
    public function halamanUtamaBarangKeluar()
    {
        // Ambil seluruh data barang keluar dari database
        $barangKeluar = BarangKeluar::query()->with('barang')->orderBy('id_brng_keluar', 'DESC')->get();

        // Redirect ke halaman utama barang keluar
        // Beserta dengan seluruh data barang keluar yang sudah diambil diatas
        return view('pages.barang-keluar.halaman-utama-barang-keluar')->with([
            'barangKeluar' => $barangKeluar,
        ]);
    }

    /**
     * Redirect ke halaman tambah barang keluar.
     */
    public function halamanTambahBarangKeluar()
    {
        // Ambil data barang sebagai pilihan di form
        $barang = Barang::all();

        return view('pages.barang-keluar.halaman-tambah-barang-keluar')->with([
            'barang' => $barang,
        ]);
    }

    /**
     * Proses tambah data barang keluar ke database.
     */
    public function prosesTambahBarangKeluar(Request $request)
    {
        // Ambil data dari form tambah barang keluar
        $data = [
            'id_barang' => $request->input('id_barang'),
            'tgl_keluar' => $request->input('tgl_keluar'),
            'jumlah' => $request->input('jumlah'),
            'nama_barang' => Barang::query()->find($request->id_barang)->nama_barang,
        ];

        // Insert data tersebut ke database
        $result = BarangKeluar::query()->create($data);

        // Ubah data stok barang sesuai jumlah barang keluar.
        StokBarang::query()->where('id_barang', $request->id_barang)->decrement('jumlah', $request->jumlah);

        if (!$result) {
            $this->failed('Gagal menambah data barang keluar');
        }

        // Redirect ke halaman utama barang keluar setelah proses insert
        return $this->success('Berhasil menambah data barang keluar', route('halamanUtamaBarangKeluar'));
    }

    /**
     * Redirect ke halaman ubah barang keluar.
     */
    public function halamanUbahBarangKeluar($idBarangKeluar)
    {
        // Ambil data barang keluar yang ingin diubah berdasarkan id
        $barangKeluar = BarangKeluar::query()->findOrFail($idBarangKeluar);

        // Ambil data barang sebagai pilihan di form
        $barang = Barang::all();

        // Redirect ke halaman ubah barang keluar beserta data barang keluar yang ingin diubah
        return view('pages.barang-keluar.halaman-ubah-barang-keluar')->with([
            'barangKeluar' => $barangKeluar,
            'barang' => $barang
        ]);
    }

    /**
     * Proses ubah data barang keluar pada database.
     */
    public function prosesUbahBarangKeluar(Request $request, $idBarangKeluar)
    {
        // Ambil data dari form ubah barang keluar
        $data = [
            'id_barang' => $request->input('id_barang'),
            'tgl_keluar' => $request->input('tgl_keluar'),
            'jumlah' => $request->input('jumlah'),
            'nama_barang' => Barang::query()->find($request->id_barang)->nama_barang,
        ];

        $jumlah = $request->jumlah - $request->jumlah_prev;

        // Ambil terlebih dahulu data barang keluar yang ingin diubah dari database
        $barangKeluar = BarangKeluar::query()->findOrFail($idBarangKeluar);

        // Ubah barang keluar tersebut dengan data terbaru
        $result = $barangKeluar->update($data);

        // Ubah data stok barang sesuai jumlah barang keluar.
        StokBarang::query()->where('id_barang', $request->id_barang)->decrement('jumlah', $jumlah);

        if (!$result) {
            $this->failed('Gagal mengubah data barang keluar');
        }

        // Redirect ke halaman utama barang keluar setelah proses ubah
        return $this->success('Berhasil mengubah data barang keluar', route('halamanUtamaBarangKeluar'));
    }

    /**
     * Proses hapus data barang keluar dari database
     */
    public function prosesHapusBarangKeluar($idBarangKeluar)
    {
        // Hapus dari database barang keluar berdasarkan id
        BarangKeluar::query()->find($idBarangKeluar)->delete();

        // Redirect ke halaman utama barang keluar setelah proses hapus
        return $this->success('Berhasil menghapus data barang keluar', route('halamanUtamaBarangKeluar'));
    }
}
