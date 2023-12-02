@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Preview Laporan Barang</h1>
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
                                    <th>Satuan</th>
                                    <th>Pemasok</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($barang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>{{ $item->pemasok->nama_pemasok ?? '-'}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <h6 class="text-center">
                                                Data barang tidak tersedia saat ini.
                                            </h6>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <form target="_blank" action="{{ route('cetakBarang') }}" method="GET" class="card-footer">
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
