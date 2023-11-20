@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Ubah Stok Barang</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form id="ubah-stok-barang-form" action="{{ route('prosesUbahStokBarang', $stokBarang->id_stok_barang) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            {{-- INPUT NAMA BARANG --}}
                            <div class="mb-3">
                                <label for="id_barang" class="form-label required">Nama Barang</label>
                                <select required id="id_barang" name="id_barang" class="form-select select2">
                                    <option selected disabled>Masukan nama barang</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id_barang }}" {{ $item->id_barang == $stokBarang->id_barang ? 'selected' : '' }}>
                                            {{ $item->nama_barang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- INPUT JUMLAH BARANG --}}
                            <div class="mb-3">
                                <label for="jumlah" class="form-label required">Jumlah Barang</label>
                                <input maxlength="100" name="jumlah" type="number" class="form-control" id="jumlah"
                                    aria-describedby="jumlah" value="{{ $stokBarang->jumlah }}" placeholder="Masukan jumlah barang masuk" required>
                            </div>

                            {{-- INPUT SATUAN BARANG --}}
                            <div class="mb-3">
                                <label for="satuan" class="form-label required">Satuan Barang</label>
                                <input maxlength="100" name="satuan" type="text" class="form-control" id="satuan"
                                    aria-describedby="satuan" value="{{ $stokBarang->satuan }}" placeholder="Masukan satuan barang" required>
                            </div>

                            <div class="d-flex mt-4 gap-2">
                                <a type="button" class="btn btn-light" href="{{ route('halamanUtamaStokBarang') }}">
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
            $('form#ubah-stok-barang-form').validate({
                rules: {
                    jumlah: 'positifdigits',
                }
            });
        })
    </script>
@endpush
