@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Barang</h1>
                    </div>
                    
                    @if (is_admin())
                        <div class="page-description-actions">
                            <a href="{{ route('halamanTambahBarang') }}" class="btn btn-primary"><i
                                    class="material-icons">add</i>Tambah Barang</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <table class="datatable table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>

                                    @if (is_admin())
                                        <th></th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($barang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->satuan }}</td>

                                        @if (is_admin())
                                            <td class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('halamanUbahBarang', $item->id_barang) }}"
                                                    class="btn btn-sm btn-light">
                                                    Ubah
                                                </a>

                                                <a href="javascript:void(0);" class="btn btn-sm btn-light" role="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#detail-barang-modal-{{ $item->id_barang }}">
                                                    Detail
                                                </a>

                                                <a onclick="swalConfirm(event)" data-type="link"
                                                    href="{{ route('prosesHapusBarang', $item->id_barang) }}"
                                                    class="btn btn-sm btn-danger">
                                                    Hapus
                                                </a>

                                                @push('scripts')
                                                    <div class="modal fade" id="detail-barang-modal-{{ $item->id_barang }}"
                                                        tabindex="-1"
                                                        aria-labelledby="detail-barang-modal-{{ $item->id_barang }}-label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="detail-barang-modal-{{ $item->id_barang }}-label">
                                                                        Detail "{{ $item->nama_barang }}"
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Nama Barang</td>
                                                                                <td>:</td>
                                                                                <td>{{ $item->nama_barang }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Satuan Barang</td>
                                                                                <td>:</td>
                                                                                <td>{{ $item->satuan }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Pemasok</td>
                                                                                <td>:</td>
                                                                                <td>
                                                                                    <ul class="mb-0 px-0"
                                                                                        style="list-style-type: none">
                                                                                        <li>
                                                                                            <strong>{{ $item->pemasok->nama_pemasok }}</strong>
                                                                                        </li>
                                                                                        <li>
                                                                                            {{ $item->pemasok->alamat }}
                                                                                        </li>
                                                                                        <li>
                                                                                            {{ $item->pemasok->telp }}
                                                                                        </li>
                                                                                    </ul>
                                                                                </td>
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
                                        <td colspan="3">
                                            <h6 class="text-center">
                                                Data barang tidak tersedia saat ini.
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
