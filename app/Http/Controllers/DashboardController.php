<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\StokBarang;
use Carbon\CarbonPeriod;

class DashboardController extends Controller
{
    /**
     * Redirect ke halaman Dashboard.
     */
    public function dashboard()
    {
        // Hitung jumlah data untuk kebutuhan dashboard
        $jumlah['perlu_dipesan'] = StokBarang::query()->where('jumlah', '<=', 5)->count();
        $jumlah['stok_barang'] = StokBarang::count();
        $jumlah['barang'] = Barang::count();
        $jumlah['barang_masuk'] = BarangMasuk::count();
        $jumlah['barang_keluar'] = BarangKeluar::count();

        $chart = $this->getChartData();

        $stokBarang = StokBarang::query()->with('barang')->orderBy('id_stok_barang', 'DESC')->get();

        return view('pages.dashboard')->with([
            'jumlah' => $jumlah,
            'chart' => $chart,
            'stokBarang' => $stokBarang,
        ]);
    }


    /**
     * Ambil data untuk kebutuhan grafik dashboard. 
     */
    public function getChartData()
    {
        $periods = CarbonPeriod::create(now()->subDays(6), now());

        foreach ($periods as $date) {
            $categories[] = $date->format('d M');
            $jumlahbarangMasuk[] = BarangMasuk::query()->whereDate('tgl_masuk', $date)->sum('jumlah');
            $jumlahbarangKeluar[] = BarangKeluar::query()->whereDate('tgl_keluar', $date)->sum('jumlah');
        }

        $result['categories'] = $categories;
        $result['series'] = [
            [
                'name' => 'Barang Masuk',
                'data' => $jumlahbarangMasuk,
            ],
            [
                'name' => 'Barang Keluar',
                'data' => $jumlahbarangKeluar,
            ],
        ];

        return $result;
    }
}
