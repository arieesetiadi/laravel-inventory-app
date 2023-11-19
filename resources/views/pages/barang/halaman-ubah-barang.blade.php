@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Ubah Barang</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        {{-- FORM LOGIN --}}
                        <form id="ubah-barang-form" action="{{ route('prosesUbahBarang', $barang->id_barang) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            {{-- INPUT NAMA BARANG --}}
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label required">Nama</label>
                                <input maxlength="100" name="nama_barang" type="text" class="form-control"
                                    id="nama_barang" aria-describedby="nama_barang" value="{{ $barang->nama_barang }}"
                                    placeholder="Nama barang" required>
                            </div>

                            <div class="mt-4 d-flex gap-2">
                                <a type="button" class="btn btn-light" href="{{ route('halamanUtamaBarang') }}">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Ubah
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- FORM VALIDATION --}}
    <script>
        $(function() {
            $('form#ubah-barang-form').validate();
        })
    </script>
@endpush
