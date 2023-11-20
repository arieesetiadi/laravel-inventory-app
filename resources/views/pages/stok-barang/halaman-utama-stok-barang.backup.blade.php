@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Stok Barang</h1>
                    </div>
                    <div class="page-description-actions">
                        <a href="{{ route('halamanTambahStokBarang') }}" class="btn btn-primary">
                            <i class="material-icons">add</i>Tambah Stok Barang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="datatable table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Stok</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($stokBarang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->jumlah }} {{ $item->satuan }}</td>
                                        <td>
                                            @if ($item->jumlah <= 5)
                                                <span class="badge rounded-pill bg-danger py-2 px-3">
                                                    &excl; &nbsp; Stok dari {{ $item->nama_barang }} perlu diisi kembali
                                                </span>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('halamanUbahStokBarang', $item->id_stok_barang) }}"
                                                class="btn btn-sm btn-light">
                                                Ubah
                                            </a>

                                            <a href="javascript:void(0);" class="btn btn-sm btn-light" role="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detail-stok-barang-modal-{{ $item->id_stok_barang }}">
                                                Detail
                                            </a>

                                            <a onclick="swalConfirm(event)" data-type="link"
                                                href="{{ route('prosesHapusStokBarang', $item->id_stok_barang) }}"
                                                class="btn btn-sm btn-danger">
                                                Hapus
                                            </a>

                                            @push('scripts')
                                                <div class="modal fade"
                                                    id="detail-stok-barang-modal-{{ $item->id_stok_barang }}" tabindex="-1"
                                                    aria-labelledby="detail-stok-barang-modal-{{ $item->id_stok_barang }}-label"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="detail-stok-barang-modal-{{ $item->id_stok_barang }}-label">
                                                                    Detail Stok Barang "{{ $item->nama_barang }}"
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="p-0">Detail Barang</td>
                                                                            <td class="p-0">:</td>
                                                                            <td class="p-0">
                                                                                <ul class="mb-0 px-0"
                                                                                    style="list-style-type: none">
                                                                                    <li>
                                                                                        <strong>{{ $item->barang->nama_barang }}</strong>
                                                                                    </li>
                                                                                    <li>
                                                                                        Dipasok oleh
                                                                                        <strong>{{ $item->barang->pemasok->nama_pemasok }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="p-0">Jumlah Stok</td>
                                                                            <td class="p-0">:</td>
                                                                            <td class="p-0">{{ $item->jumlah }}
                                                                                {{ $item->satuan }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark"
                                                                    data-bs-dismiss="modal">
                                                                    Tutup
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endpush
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <h6 class="text-center">
                                                Data stok barang tidak tersedia saat ini.
                                            </h6>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
