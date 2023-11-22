@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Pemasok</h1>
                    </div>
                    
                    @if (is_admin())
                        <div class="page-description-actions">
                            <a href="{{ route('halamanTambahPemasok') }}" class="btn btn-primary"><i
                                    class="material-icons">add</i>Tambah Pemasok</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="datatable table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pemasok</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>

                                    @if (is_admin())
                                        <th></th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($pemasok as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_pemasok }}</td>
                                        <td>{{ $item->telp }}</td>
                                        <td>{{ $item->alamat }}</td>

                                        @if (is_admin())
                                            <td class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('halamanUbahPemasok', $item->id_pemasok) }}"
                                                    class="btn btn-sm btn-light">
                                                    Ubah
                                                </a>

                                                <a href="javascript:void(0);" class="btn btn-sm btn-light" role="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#detail-pemasok-modal-{{ $item->id_pemasok }}">
                                                    Detail
                                                </a>

                                                <a onclick="swalConfirm(event)" data-type="link"
                                                    href="{{ route('prosesHapusPemasok', $item->id_pemasok) }}"
                                                    class="btn btn-sm btn-danger">
                                                    Hapus
                                                </a>

                                                @push('scripts')
                                                    <div class="modal fade" id="detail-pemasok-modal-{{ $item->id_pemasok }}"
                                                        tabindex="-1"
                                                        aria-labelledby="detail-pemasok-modal-{{ $item->id_pemasok }}-label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="detail-pemasok-modal-{{ $item->id_pemasok }}-label">
                                                                        Detail "{{ $item->nama_pemasok }}"
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Nama</td>
                                                                                <td>:</td>
                                                                                <td>{{ $item->nama_pemasok }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Alamat</td>
                                                                                <td>:</td>
                                                                                <td>{{ $item->alamat }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Nomor Telepon</td>
                                                                                <td>:</td>
                                                                                <td>{{ $item->telp }}</td>
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
                                        <td colspan="5">
                                            <h6 class="text-center">
                                                Data pemasok tidak tersedia saat ini.
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
