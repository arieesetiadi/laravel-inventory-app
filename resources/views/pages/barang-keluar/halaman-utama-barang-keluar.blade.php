@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Barang Keluar</h1>
                    </div>
                    <div class="page-description-actions">
                        <a href="{{ route('halamanTambahBarangKeluar') }}" class="btn btn-primary">
                            <i class="material-icons">add</i>Tambah Barang Keluar
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
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Tanggal Keluar</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($barangKeluar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->barang->nama_barang }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->barang->satuan }}</td>
                                        <td>{{ human_date($item->tgl_keluar)}} ({{ human_datetime_diff($item->tgl_keluar) }})</td>
                                        <td class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('halamanUbahBarangKeluar', $item->id_brng_keluar) }}"
                                                class="btn btn-sm btn-light">
                                                Ubah
                                            </a>

                                            <a href="javascript:void(0);" class="btn btn-sm btn-light" role="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detail-barang-keluar-modal-{{ $item->id_brng_keluar }}">
                                                Detail
                                            </a>

                                            <a onclick="swalConfirm(event)" data-type="link"
                                                href="{{ route('prosesHapusBarangKeluar', $item->id_brng_keluar) }}"
                                                class="btn btn-sm btn-danger">
                                                Hapus
                                            </a>

                                            @push('scripts')
                                                <div class="modal fade" id="detail-barang-keluar-modal-{{ $item->id_brng_keluar }}"
                                                    tabindex="-1"
                                                    aria-labelledby="detail-barang-keluar-modal-{{ $item->id_brng_keluar }}-label"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="detail-barang-keluar-modal-{{ $item->id_brng_keluar }}-label">
                                                                    Detail Barang Keluar "{{ $item->nama_barang }}"
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
                                                                                <ul class="px-0 mb-0"
                                                                                    style="list-style-type: none">
                                                                                    <li>
                                                                                        <strong>{{ $item->barang->nama_barang }}</strong>
                                                                                    </li>
                                                                                    <li>
                                                                                        Dipasok oleh <strong>{{ $item->barang->pemasok->nama_pemasok }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="p-0">Jumlah</td>
                                                                            <td class="p-0">:</td>
                                                                            <td class="p-0">
                                                                                {{ $item->jumlah }} {{ $item->barang->satuan }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="p-0">Tanggal Keluar</td>
                                                                            <td class="p-0">:</td>
                                                                            <td class="p-0">{{ human_date($item->tgl_keluar)}}</td>
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
                                        <td colspan="5">
                                            <h6 class="text-center">
                                                Data barang keluar tidak tersedia saat ini.
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
