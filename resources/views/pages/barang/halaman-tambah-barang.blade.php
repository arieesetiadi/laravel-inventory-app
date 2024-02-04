@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Tambah Barang</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form id="tambah-barang-form" action="{{ route('prosesTambahBarang') }}" method="POST">
                            @csrf

                            {{-- INPUT KODE BARANG --}}
                            <div class="mb-3">
                                <label for="kode_barang" class="form-label required">Kode Barang (Auto Generated)</label>
                                <input maxlength="100" name="kode_barang" type="text" class="form-control"
                                    id="kode_barang" aria-describedby="kode_barang" value="{{ $kodeBarang }}" placeholder="Kode barang" readonly required>
                            </div>

                            {{-- INPUT NAMA BARANG --}}
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label required">Nama</label>
                                <input maxlength="100" name="nama_barang" type="text" class="form-control"
                                    id="nama_barang" aria-describedby="nama_barang" placeholder="Nama barang" required>
                            </div>

                            {{-- INPUT SATUAN BARANG --}}
                            <div class="mb-3">
                                <label for="satuan" class="form-label required">Satuan</label>
                                <input maxlength="100" name="satuan" type="text" class="form-control"
                                    id="satuan" aria-describedby="satuan" placeholder="Satuan barang" required>
                            </div>

                            {{-- INPUT NAMA PEMASOK --}}
                            <div class="mb-3">
                                <label for="pemasok" class="form-label required">Nama Pemasok</label>
                                <select required id="pemasok" name="id_pemasok" class="form-select select2">
                                    <option selected disabled>Masukan nama pemasok</option>
                                    @foreach ($pemasok as $item)
                                        <option value="{{ $item->id_pemasok }}">{{ $item->nama_pemasok }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex mt-4 gap-2">
                                <a type="button" class="btn btn-light" href="{{ route('halamanUtamaBarang') }}">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Simpan
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
            $('form#tambah-barang-form').validate();
        })
    </script>
@endpush
