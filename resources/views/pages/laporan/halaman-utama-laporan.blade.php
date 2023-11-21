@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Laporan</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card widget widget-stats">
                    <div class="card-body">
                        <div class="widget-stats-container d-flex">
                            <div class="widget-stats-icon widget-stats-icon-success">
                                <i class="material-icons-outlined">archive</i>
                            </div>
                            <div class="widget-stats-content flex-fill d-flex align-items-center">
                                <span class="fs-4 widget-stats-title text-dark">Laporan Barang Masuk</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('previewBarangMasuk') }}"
                            class="btn btn-dark d-flex justify-content-center gap-3">
                            Preview Laporan Barang Masuk
                            <i class="material-icons">feed</i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card widget widget-stats">
                    <div class="card-body">
                        <div class="widget-stats-container d-flex">
                            <div class="widget-stats-icon widget-stats-icon-danger">
                                <i class="material-icons-outlined">unarchive</i>
                            </div>
                            <div class="widget-stats-content flex-fill d-flex align-items-center">
                                <span class="fs-4 widget-stats-title text-dark">Laporan Barang Keluar</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('previewBarangKeluar') }}"
                            class="btn btn-dark d-flex justify-content-center gap-3">
                            Preview Laporan Barang Keluar
                            <i class="material-icons">feed</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
