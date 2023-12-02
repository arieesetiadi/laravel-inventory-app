@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description">
                    <h1>Profil Pengguna</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form id="profile-form" action="{{ route('prosesUbahProfile') }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- INPUT USERNAME --}}
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input maxlength="100" name="username" type="text" class="form-control"
                                    id="username" value="{{ auth()->user()->username }}" aria-describedby="username" placeholder="Username" required>
                            </div>

                            {{-- INPUT NAMA PENGGUNA --}}
                            <div class="mb-3">
                                <label for="nama_user" class="form-label">Nama</label>
                                <input maxlength="100" name="nama_user" type="text" class="form-control"
                                    id="nama_user" value="{{ auth()->user()->nama_user }}" aria-describedby="nama_user" placeholder="Nama pengguna" required>
                            </div>

                            {{-- INPUT PASSWORD --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Password (optional)</label>
                                <input maxlength="100" name="password" type="text" class="form-control"
                                    id="password" aria-describedby="password" placeholder="Password (optional)">
                            </div>

                            {{-- INPUT ROLE --}}
                            <div class="mb-3">
                                <label for="role" class="form-label">Role Pengguna</label>
                                <select id="role" disabled name="role" class="form-select select2">
                                    <option selected>{{ auth()->user()->role }}</option>
                                </select>
                            </div>

                            <div class="d-flex mt-4 gap-2">
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
            $('form#profile-form').validate();
        })
    </script>
@endpush
