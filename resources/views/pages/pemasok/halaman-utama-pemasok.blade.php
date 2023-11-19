@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Pemasok</h1>
                    </div>
                    <div class="page-description-actions">
                        <a href="{{ route('halamanTambahPemasok') }}" class="btn btn-primary"><i class="material-icons">add</i>Tambah Pemasok</a>
                    </div>
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
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($pemasok as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_pemasok }}</td>
                                        <td>{{ $item->telp }}</td>
                                        <td>{{ $item->alamat }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
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
