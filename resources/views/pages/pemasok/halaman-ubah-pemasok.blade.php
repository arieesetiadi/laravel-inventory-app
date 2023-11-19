@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Ubah Pemasok</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form id="ubah-pemasok-form" action="{{ route('prosesUbahPemasok', $pemasok->id_pemasok) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            {{-- INPUT NAMA PEMASOK --}}
                            <div class="mb-3">
                                <label for="nama_pemasok" class="form-label required">Nama</label>
                                <input maxlength="100" name="nama_pemasok" type="text" class="form-control"
                                    id="nama_pemasok" aria-describedby="nama_pemasok" value="{{ $pemasok->nama_pemasok }}"
                                    placeholder="Nama pemasok" required>
                            </div>

                            {{-- INPUT ALAMAT PEMASOK --}}
                            <div class="mb-3">
                                <label for="alamat" class="form-label required">Alamat</label>
                                <input maxlength="100" name="alamat" type="text" class="form-control" id="alamat"
                                    aria-describedby="alamat" value="{{ $pemasok->alamat }}" placeholder="Alamat pemasok"
                                    required>
                            </div>

                            {{-- INPUT NO TELEPON PEMASOK --}}
                            <div class="mb-3">
                                <label for="telp" class="form-label required">Nomor Telepon</label>
                                <input maxlength="100" name="telp" type="text" class="form-control" id="telp"
                                    aria-describedby="telp"value="{{ $pemasok->telp }}" placeholder="Nomor telepon pemasok"
                                    required>
                            </div>

                            <div class="mt-4 d-flex gap-2">
                                <a type="button" class="btn btn-light" href="{{ route('halamanUtamaPemasok') }}">
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
            $('form#ubah-pemasok-form').validate({
                rules: {
                    telp: {
                        digits: true,
                    }
                }
            });
        })
    </script>
@endpush
