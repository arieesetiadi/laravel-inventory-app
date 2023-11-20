<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StokBarang;
use App\Traits\HasWebResponses;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    use HasWebResponses;

    /**
     * Redirect ke halaman utama stok barang.
     */
    public function halamanUtamaStokBarang()
    {
        // Ambil seluruh data stok barang dari database
        $stokBarang = StokBarang::query()->with('barang')->orderBy('id_stok_barang', 'DESC')->get();

        // Redirect ke halaman utama stok barang
        // Beserta dengan seluruh data stok barang yang sudah diambil diatas
        return view('pages.stok-barang.halaman-utama-stok-barang')->with([
            'stokBarang' => $stokBarang,
        ]);
    }

    /**
     * Redirect ke halaman tambah stok barang.
     */
    public function halamanTambahStokBarang()
    {
        // Ambil data barang sebagai pilihan di form
        $barang = Barang::query()->whereDoesntHave('stokBarang')->get();

        return view('pages.stok-barang.halaman-tambah-stok-barang')->with([
            'barang' => $barang,
        ]);
    }

    /**
     * Proses tambah data stok barang ke database.
     */
    public function prosesTambahStokBarang(Request $request)
    {
        // Ambil data dari form tambah stok barang
        $data = [
            'id_barang' => $request->input('id_barang'),
            'jumlah' => $request->input('jumlah'),
            'nama_barang' => Barang::query()->find($request->id_barang)->nama_barang,
        ];

        // Insert data tersebut ke database
        $result = StokBarang::query()->create($data);

        if (!$result) {
            $this->failed('Gagal menambah data stok barang');
        }

        // Redirect ke halaman utama stok barang setelah proses insert
        return $this->success('Berhasil menambah data stok barang', route('halamanUtamaStokBarang'));
    }

    /**
     * Redirect ke halaman ubah stok barang.
     */
    public function halamanUbahStokBarang($idStokBarang)
    {
        // Ambil data stok barang yang ingin diubah berdasarkan id
        $stokBarang = StokBarang::query()->findOrFail($idStokBarang);

        // Ambil data barang sebagai pilihan di form
        $barang = Barang::query()
            ->whereDoesntHave('stokBarang')
            ->orWhereHas('stokBarang', function ($query) use ($stokBarang) {
                $query->where('id_barang', $stokBarang->id_barang);
            })
            ->get();

        // Redirect ke halaman ubah stok barang beserta data stok barang yang ingin diubah
        return view('pages.stok-barang.halaman-ubah-stok-barang')->with([
            'stokBarang' => $stokBarang,
            'barang' => $barang
        ]);
    }

    /**
     * Proses ubah data stok barang pada database.
     */
    public function prosesUbahStokBarang(Request $request, $idStokBarang)
    {
        // Ambil data dari form ubah stok barang
        $data = [
            'id_barang' => $request->input('id_barang'),
            'jumlah' => $request->input('jumlah'),
            'nama_barang' => Barang::query()->find($request->id_barang)->nama_barang,
        ];

        // Ambil terlebih dahulu data stok barang yang ingin diubah dari database
        $stokBarang = StokBarang::query()->findOrFail($idStokBarang);

        // Ubah stok barang tersebut dengan data terbaru
        $result = $stokBarang->update($data);

        if (!$result) {
            $this->failed('Gagal mengubah data stok barang');
        }

        // Redirect ke halaman utama stok barang setelah proses ubah
        return $this->success('Berhasil mengubah data stok barang', route('halamanUtamaStokBarang'));
    }

    /**
     * Proses hapus data stok barang dari database
     */
    public function prosesHapusStokBarang($idStokBarang)
    {
        // Hapus dari database stok barang berdasarkan id
        StokBarang::query()->find($idStokBarang)->delete();

        // Redirect ke halaman utama stok barang setelah proses hapus
        return $this->success('Berhasil menghapus data stok barang', route('halamanUtamaStokBarang'));
    }
}
