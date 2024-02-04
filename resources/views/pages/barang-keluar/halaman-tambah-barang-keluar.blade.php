@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>Tambah Barang Keluar</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form id="tambah-barang-keluar-form" action="{{ route('prosesTambahBarangKeluar') }}" method="POST">
                            @csrf

                            {{-- INPUT NAMA BARANG --}}
                            <div class="mb-3">
                                <label for="id_barang" class="form-label required">Nama Barang</label>
                                <select required id="id_barang" name="id_barang" class="form-select select2">
                                    @if (!empty($barang))
                                        <option selected disabled>Masukan nama barang</option>
                                        @foreach ($barang as $item)
                                            @if ($item->stokBarang && $item->stokBarang->jumlah > 0)
                                                <option data-stok="{{ $item->stokBarang->jumlah }}"
                                                    value="{{ $item->id_barang }}">
                                                    {{ $item->nama_barang }} - sisa {{ $item->stokBarang->jumlah }} - ditambah 1 hari yang lalu
                                                </option>
                                            @else
                                                <option disabled value="{{ $item->id_barang }}">
                                                    {{ $item->nama_barang }} (Stok kosong)
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
                                    aria-describedby="tgl_keluar" required>
                            </div>

                            {{-- INPUT JUMLAH BARANG --}}
                            <div class="mb-3">
                                <label for="jumlah" class="form-label required">Jumlah Barang</label>
                                <input maxlength="100" name="jumlah" type="number" class="form-control" id="jumlah"
                                    aria-describedby="jumlah" placeholder="Masukan jumlah barang keluar" required>
                            </div>

                            <div class="d-flex mt-4 gap-2">
                                <a type="button" class="btn btn-light" href="{{ route('halamanUtamaBarangKeluar') }}">
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
        let batasStok = 0;

        // Add a custom validation method
        $.validator.addMethod("stocklimit", function(value, element) {
            if (batasStok > 0) {
                var inputValue = parseFloat(value);
                var maxValue = parseFloat(batasStok);
                return isNaN(inputValue) || inputValue <= maxValue;
            }

            return true;
        }, "Jumlah barang tidak boleh melebihi stok yang tersedia.");

        $(function() {
            $('form#tambah-barang-keluar-form').validate({
                rules: {
                    jumlah: {
                        positifdigits: true,
                        stocklimit: true
                    },
                }
            });
        })

        $('select#id_barang').on('change', function() {
            const selected = $(this).find(':selected');
            batasStok = selected.data('stok');
        });
    </script>
@endpush
