@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>

        {{-- DASHBOARD KHUSUS ADMIN --}}
        @if (is_admin())
            <div class="row">
                {{-- Stok Barang --}}
                <div class="col-md-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-warning">
                                    <i class="material-icons-outlined">inventory</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Barang Yang Perlu Dipesan</span>
                                    <span class="widget-stats-amount">{{ $jumlah['perlu_dipesan'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('halamanUtamaStokBarang') }}"
                                class="btn btn-light d-flex justify-content-center gap-3">
                                More Info
                                <i class="material-icons">arrow_circle_right</i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Barang Masuk --}}
                <div class="col-md-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-success">
                                    <i class="material-icons-outlined">archive</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Barang Masuk</span>
                                    <span class="widget-stats-amount">{{ $jumlah['barang_masuk'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('halamanUtamaBarangMasuk') }}"
                                class="btn btn-light d-flex justify-content-center gap-3">
                                More Info
                                <i class="material-icons">arrow_circle_right</i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Barang Keluar --}}
                <div class="col-md-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-danger">
                                    <i class="material-icons-outlined">unarchive</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Barang Keluar</span>
                                    <span class="widget-stats-amount">{{ $jumlah['barang_keluar'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('halamanUtamaBarangKeluar') }}"
                                class="btn btn-light d-flex justify-content-center gap-3">
                                More Info
                                <i class="material-icons">arrow_circle_right</i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Grafik Barang Masuk & Keluar --}}
                <div class="col-12">
                    <div class="card widget widget-stats-large">
                        <div class="row">
                            <div class="col-12">
                                <div class="widget-stats-large-chart-container">
                                    <div class="card-header">
                                        <h5 class="card-title">
                                            Jumlah Barang Masuk & Keluar
                                            <span class="badge badge-light badge-style-light">1 Minggu Terakhir</span>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="apex-barang"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const chartData = @json($chart);

            const options = {
                chart: {
                    height: 350,
                    type: 'bar',
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded',
                        borderRadius: 10
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: chartData['series'],
                xaxis: {
                    categories: chartData['categories'],
                    labels: {
                        style: {
                            colors: 'rgba(94, 96, 110, .5)'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Barang'
                    }
                },
                fill: {
                    opacity: 1

                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " barang";
                        }
                    }
                },
                grid: {
                    borderColor: '#e2e6e9',
                    strokeDashArray: 4
                },
                colors:['rgba(0,227,150,1)', '#F44336']
            };

            const chartBarang = new ApexCharts(
                document.querySelector("#apex-barang"),
                options
            );

            chartBarang.render();
        });
    </script>
@endpush
