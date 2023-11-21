<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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
            'barangMasuk' =>   BarangMasuk::getData(),
            'startDate' => request()->start_date ? now()->make(request()->start_date)->format('d M Y') : null,
            'endDate' => request()->end_date ? now()->make(request()->end_date)->format('d M Y') : null,
        ];

        $pdf = Pdf::loadView('pages.laporan.hasil.laporan-barang-masuk', $data);
        return $pdf->stream('laporan-barang-masuk.pdf');
    }
}