@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Ubah Barang Keluar</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form id="ubah-barang-keluar-form"
                            action="{{ route('prosesUbahBarangKeluar', $barangKeluar->id_brng_keluar) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- INPUT NAMA BARANG --}}
                            <div class="mb-3">
                                <label for="id_barang" class="form-label required">Nama Barang</label>
                                <select required id="id_barang" name="id_barang" class="form-select select2">
                                    @if (!empty($barangMasuk))
                                        <option selected disabled>Masukan nama barang</option>
                                        @foreach ($barangMasuk as $item)
                                            @if ($item->barang->stokBarang && $item->barang->stokBarang->jumlah > 0)
                                                <option value="{{ $item->barang->id_barang }}"
                                                    {{ $item->barang->id_barang == $barangKeluar->id_barang ? 'selected' : '' }}>
                                                    {{ $item->barang->nama_barang }} - 
                                                    Stok {{ $item->jumlah }} - 
                                                    Masuk pada {{ now()->make($item->tgl_masuk)->diffForHumans() }}
                                                </option>
                                            @else
                                                <option disabled value="{{ $item->barang->id_barang }}">
                                                    {{ $item->barang->nama_barang }} (Stok kosong)
                                                </option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option selected disabled>Stok semua barang sedang habis.</option>
                                    @endif
                                </select>
                            </div>

                            {{-- INPUT TANGGAL KELUAR --}}
                            <div class="mb-3">
                                <label for="tgl_keluar" class="form-label required">Tanggal Keluar</label>
                                <input maxlength="100" name="tgl_keluar" type="date" class="form-control" id="tgl_keluar"
                                    aria-describedby="tgl_keluar" value="{{ $barangKeluar->tgl_keluar }}" required>
                            </div>

                            {{-- INPUT JUMLAH BARANG --}}
                            <div class="mb-3">
                                <label for="jumlah" class="form-label required">Jumlah Barang</label>
                                <input name="jumlah_prev" type="hidden" id="jumlah_prev" value="{{ $barangKeluar->jumlah }}">
                                <input maxlength="100" name="jumlah" type="number" class="form-control" id="jumlah"
                                    aria-describedby="jumlah" value="{{ $barangKeluar->jumlah }}"
                                    placeholder="Masukan jumlah barang keluar" required>
                            </div>

                            <div class="d-flex mt-4 gap-2">
                                <a type="button" class="btn btn-light" href="{{ route('halamanUtamaBarangKeluar') }}">
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
            $('form#ubah-barang-keluar-form').validate({
                rules: {
                    jumlah: 'positifdigits',
                }
            });
        })
    </script>
@endpush
