@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Preview Laporan Stok Barang</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($stokBarang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->barang->nama_barang }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->barang->satuan }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <h6 class="text-center">
                                                Data stok barang tidak tersedia saat ini.
                                            </h6>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <form target="_blank" action="{{ route('cetakStokBarang') }}" method="GET" class="card-footer">
                        <div class="d-flex gap-2 justify-content-end">
                            <a class="btn btn-light" href="{{ route('halamanUtamaLaporan') }}">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Cetak
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
