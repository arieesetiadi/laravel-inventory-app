<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Pemasok;
use App\Models\StokBarang;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Redirect ke halaman utama laporan.
     */
    public function halamanUtamaLaporan()
    {
        return view('pages.laporan.halaman-utama-laporan');
    }

    /**
     * Preview halaman laporan barang masuk
     */
    public function previewBarangMasuk()
    {
        $barangMasuk = BarangMasuk::getData();

        return view('pages.laporan.preview-barang-masuk')->with([
            'barangMasuk' => $barangMasuk
        ]);
    }

    /**
     * Proses cetak laporan barang masuk
     */
    public function cetakBarangMasuk()
    {
        $data = [
            'barangMasuk' => BarangMasuk::getData(),
            'startDate' => request()->start_date ? now()->make(request()->start_date)->format('d M Y') : null,
            'endDate' => request()->end_date ? now()->make(request()->end_date)->format('d M Y') : null,
        ];

        $pdf = Pdf::loadView('pages.laporan.hasil.laporan-barang-masuk', $data);
        return $pdf->stream('laporan-barang-masuk.pdf');
    }

    /**
     * Preview halaman laporan barang keluar
     */
    public function previewBarangKeluar()
    {
        $barangKeluar = BarangKeluar::getData();

        return view('pages.laporan.preview-barang-keluar')->with([
            'barangKeluar' => $barangKeluar
        ]);
    }

    /**
     * Proses cetak laporan barang keluar
     */
    public function cetakBarangKeluar()
    {
        $data = [
            'barangKeluar' => BarangKeluar::getData(),
            'startDate' => request()->start_date ? now()->make(request()->start_date)->format('d M Y') : null,
            'endDate' => request()->end_date ? now()->make(request()->end_date)->format('d M Y') : null,
        ];

        $pdf = Pdf::loadView('pages.laporan.hasil.laporan-barang-keluar', $data);
        return $pdf->stream('laporan-barang-keluar.pdf');
    }
    
    /**
     * Preview halaman laporan barang
     */
    public function previewBarang()
    {
        $barang = Barang::query()->with('pemasok')->orderBy('id_barang', 'DESC')->get();

        return view('pages.laporan.preview-barang')->with([
            'barang' => $barang
        ]);
    }

    /**
     * Proses cetak laporan barang
     */
    public function cetakBarang()
    {
        $data['barang'] = Barang::query()->with('pemasok')->orderBy('id_barang', 'DESC')->get();

        $pdf = Pdf::loadView('pages.laporan.hasil.laporan-barang', $data);
        return $pdf->stream('laporan-barang.pdf');
    }

    /**
     * Preview halaman laporan pemasok
     */
    public function previewPemasok()
    {
        $pemasok = Pemasok::query()->orderBy('id_pemasok', 'DESC')->get();

        return view('pages.laporan.preview-pemasok')->with([
            'pemasok' => $pemasok
        ]);
    }

    /**
     * Proses cetak laporan pemasok
     */
    public function cetakPemasok()
    {
        $data['pemasok'] = Pemasok::query()->orderBy('id_pemasok', 'DESC')->get();

        $pdf = Pdf::loadView('pages.laporan.hasil.laporan-pemasok', $data);
        return $pdf->stream('laporan-pemasok.pdf');
    }

    /**
     * Preview halaman laporan stok barang
     */
    public function previewStokBarang()
    {
        $stokBarang = StokBarang::query()->with('barang')->orderBy('id_stok_barang', 'DESC')->get();

        return view('pages.laporan.preview-stok-barang')->with([
            'stokBarang' => $stokBarang
        ]);
    }

    /**
     * Proses cetak laporan stok barang
     */
    public function cetakStokBarang()
    {
        $data['stokBarang'] = StokBarang::query()->with('barang')->orderBy('id_stok_barang', 'DESC')->get();

        $pdf = Pdf::loadView('pages.laporan.hasil.laporan-stok-barang', $data);
        return $pdf->stream('laporan-stok-barang.pdf');
    }
}
