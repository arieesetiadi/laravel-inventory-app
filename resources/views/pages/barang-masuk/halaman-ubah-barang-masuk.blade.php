@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Ubah Barang Masuk</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form id="ubah-barang-masuk-form" action="{{ route('prosesUbahBarangMasuk', $barangMasuk->id_brng_masuk) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            {{-- INPUT NAMA BARANG --}}
                            <div class="mb-3">
                                <label for="id_barang" class="form-label required">Nama Barang</label>
                                <select required id="id_barang" name="id_barang" class="form-select select2">
                                    <option selected disabled>Masukan nama barang</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id_barang }}" {{ $item->id_barang == $barangMasuk->id_barang ? 'selected' : '' }}>
                                            {{ $item->nama_barang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- INPUT TANGGAL MASUK --}}
                            <div class="mb-3">
                                <label for="tgl_masuk" class="form-label required">Tanggal Masuk</label>
                                <input maxlength="100" name="tgl_masuk" type="date" class="form-control" id="tgl_masuk"
                                    aria-describedby="tgl_masuk" value="{{ $barangMasuk->tgl_masuk }}" required>
                            </div>

                            {{-- INPUT NOMOR NOTA --}}
                            <div class="mb-3">
                                <label for="nomor_nota" class="form-label required">Nomor Nota</label>
                                <input maxlength="100" name="nomor_nota" type="text" class="form-control" id="nomor_nota"
                                    aria-describedby="nomor_nota" value="{{ $barangMasuk->nomor_nota }}" placeholder="Masukan nomor nota" required>
                            </div>

                            {{-- INPUT JUMLAH BARANG --}}
                            <div class="mb-3">
                                <label for="jumlah" class="form-label required">Jumlah Barang</label>
                                <input maxlength="100" name="jumlah" type="number" class="form-control" id="jumlah"
                                    aria-describedby="jumlah" value="{{ $barangMasuk->jumlah }}" placeholder="Masukan jumlah barang masuk" required>
                            </div>

                            <div class="d-flex mt-4 gap-2">
                                <a type="button" class="btn btn-light" href="{{ route('halamanUtamaBarangMasuk') }}">
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
            $('form#ubah-barang-masuk-form').validate({
                rules: {
                    jumlah: 'positifdigits',
                }
            });
        })
    </script>
@endpush
