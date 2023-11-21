@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Preview Laporan Barang Masuk</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('previewBarangMasuk') }}" method="GET" class="card-header d-flex gap-5">
                        <div class="d-flex align-items-center gap-3">
                            <span>Mulai</span>
                            <input type="date" value="{{ request()->start_date }}" name="start_date" class="form-control form-control-sm">
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <span>Sampai</span>
                            <input type="date" value="{{ request()->end_date }}" name="end_date" class="form-control form-control-sm">
                        </div>

                        <div class="d-flex justify-content-end align-items-center flex-grow-1">
                            <button type="submit" class="btn btn-primary">
                                Tampilkan
                            </button>
                        </div>
                    </form>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nota</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Pemasok</th>
                                    <th>Tanggal Masuk</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($barangMasuk as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nomor_nota }}</td>
                                        <td>{{ $item->barang->nama_barang }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->barang->satuan }}</td>
                                        <td>{{ $item->barang->pemasok->nama_pemasok }}</td>
                                        <td>
                                            {{ human_date($item->tgl_masuk) }} ({{ human_datetime_diff($item->tgl_masuk) }})
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <h6 class="text-center">
                                                Data barang masuk tidak tersedia saat ini.
                                            </h6>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <form target="_blank" action="{{ route('cetakBarangMasuk') }}" method="GET" class="card-footer">
                        <input type="hidden" value="{{ request()->start_date }}" name="start_date">
                        <input type="hidden" value="{{ request()->end_date }}" name="end_date">

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
