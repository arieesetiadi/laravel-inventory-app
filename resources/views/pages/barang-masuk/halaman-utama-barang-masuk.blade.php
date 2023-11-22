@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Barang Masuk</h1>
                    </div>

                    @if (is_admin())
                        <div class="page-description-actions">
                            <a href="{{ route('halamanTambahBarangMasuk') }}" class="btn btn-primary">
                                <i class="material-icons">add</i>Tambah Barang Masuk
                            </a>
                        </div>
                    @endif
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
                                    <th>No. Nota</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Tanggal Masuk</th>

                                    @if (is_admin())
                                        <th></th>
                                    @endif
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
                                        <td>{{ human_date($item->tgl_masuk) }} ({{ human_datetime_diff($item->tgl_masuk) }})
                                        </td>

                                        @if (is_admin())
                                            <td class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('halamanUbahBarangMasuk', $item->id_brng_masuk) }}"
                                                    class="btn btn-sm btn-light">
                                                    Ubah
                                                </a>

                                                <a href="javascript:void(0);" class="btn btn-sm btn-light" role="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#detail-barang-masuk-modal-{{ $item->id_brng_masuk }}">
                                                    Detail
                                                </a>

                                                <a onclick="swalConfirm(event)" data-type="link"
                                                    href="{{ route('prosesHapusBarangMasuk', $item->id_brng_masuk) }}"
                                                    class="btn btn-sm btn-danger">
                                                    Hapus
                                                </a>

                                                @push('scripts')
                                                    <div class="modal fade"
                                                        id="detail-barang-masuk-modal-{{ $item->id_brng_masuk }}"
                                                        tabindex="-1"
                                                        aria-labelledby="detail-barang-masuk-modal-{{ $item->id_brng_masuk }}-label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="detail-barang-masuk-modal-{{ $item->id_brng_masuk }}-label">
                                                                        Detail Barang Masuk "{{ $item->nama_barang }}"
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="p-0">No. Nota</td>
                                                                                <td class="p-0">:</td>
                                                                                <td class="p-0">{{ $item->nomor_nota }}</td>
                                                                            </tr>
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
                                                                                <td class="p-0">Jumlah</td>
                                                                                <td class="p-0">:</td>
                                                                                <td class="p-0">
                                                                                    {{ $item->jumlah }}
                                                                                    <strong>{{ $item->barang->satuan }}</strong>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="p-0">Tanggal Masuk</td>
                                                                                <td class="p-0">:</td>
                                                                                <td class="p-0">
                                                                                    {{ human_date($item->tgl_masuk) }}</td>
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
                                        @endif
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
                </div>
            </div>
        </div>
    </div>
@endsection
