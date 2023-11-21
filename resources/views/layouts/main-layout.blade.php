<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - UD Srimurti Inventory System</title>

    {{-- STYLES --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.0/sweetalert2.min.css"
        integrity="sha512-l1vPIxNzx1pUOKdZEe4kEnWCBzFVVYX5QziGS7zRZE4Gi5ykXrfvUgnSBttDbs0kXe2L06m9+51eadS+Bg6a+A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/pace/pace.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/neptune.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/neptune.png') }}" />
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        {{-- SIDEBAR --}}
        <div class="app-sidebar">
            <div class="logo">
                <a href="{{ route('dashboard') }}" class="logo-icon">
                    <span class="logo-text">Srimurti</span>
                </a>

                <div class="sidebar-user-switcher user-activity-online">
                    <div>
                        <img src="{{ asset('assets/images/avatars/user.png') }}">
                        <span class="activity-indicator"></span>
                        <span class="user-info-text">{{ auth()->user()->nama_user }}<br>
                            <span class="user-state-info">{{ auth()->user()->role }}</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Menu Utama
                    </li>

                    <li class="{{ request()->routeIs('dashboard') ? 'active-page' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <i class="material-icons-two-tone">dashboard</i>Dashboard
                        </a>
                    </li>

                    {{-- Khusus Admin --}}
                    @if (is_admin())
                        <li class="sidebar-title">
                            Menu Pengelolaan
                        </li>

                        <li class="{{ is_url('pemasok') || is_url('pemasok/*') ? 'active-page' : '' }}">
                            <a href="{{ route('halamanUtamaPemasok') }}">
                                <i class="material-icons-two-tone">person</i>Data Pemasok
                            </a>
                        </li>

                        <li class="{{ is_url('barang') || is_url('barang/*') ? 'active-page' : '' }}">
                            <a href="{{ route('halamanUtamaBarang') }}">
                                <i class="material-icons-two-tone">inventory_2</i>Data Barang
                            </a>
                        </li>

                        <li class="{{ is_url('barang-masuk') || is_url('barang-masuk/*') ? 'active-page' : '' }}">
                            <a href="{{ route('halamanUtamaBarangMasuk') }}">
                                <i class="material-icons-two-tone">archive</i>Data Barang Masuk
                            </a>
                        </li>
                        
                        <li class="{{ is_url('barang-keluar') || is_url('barang-keluar/*') ? 'active-page' : '' }}">
                            <a href="{{ route('halamanUtamaBarangKeluar') }}">
                                <i class="material-icons-two-tone">unarchive</i>Data Barang Keluar
                            </a>
                        </li>
                        
                        <li class="{{ is_url('stok-barang') || is_url('stok-barang/*') ? 'active-page' : '' }}">
                            <a href="{{ route('halamanUtamaStokBarang') }}">
                                <i class="material-icons-two-tone">inventory</i>Data Stok Barang
                            </a>
                        </li>
    
                        {{-- <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="material-icons-two-tone">description</i>Laporan
                            </a>
                        </li> --}}
                    @endif

                    {{-- <li>
                        <a href="mailbox.html">
                            <i class="material-icons-two-tone">inbox</i>Mailbox
                            <span class="badge rounded-pill badge-danger float-end">87</span>
                        </a>
                    </li> --}}

                    <li class="sidebar-title">
                        Lainnya
                    </li>

                    <li>
                        <a data-type="link" onclick="swalConfirm(event)" href="{{ route('logout') }}">
                            <i class="material-icons-two-tone">keyboard_backspace</i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="app-container">
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#">
                                        <i class="material-icons">first_page</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="app-content">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script src="{{ asset('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/select2.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
        integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"
        integrity="sha512-TiQST7x/0aMjgVTcep29gi+q5Lk5gVTUPE9XgN0g96rwtjEjLpod4mlBRKWHeBcvGBAEvJBmfDqh2hfMMmg+5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/localization/messages_id.min.js"
        integrity="sha512-OPPBKm9G1nQhKpHk3aKt0VcpZOjQbFASwF5zDZgtLzCLr3xzFqTz6BMyNcg6nSqz2v85lkmsUU4ncueJLS5iYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.0/sweetalert2.min.js"
        integrity="sha512-rO18JLH5mM83ToEn/5KhZ8BpHJ4uUKrGLybcp6wK0yuRfqQCSGVbEq1yIn/9coUjRU88TA6UJDLPK9sO6DN0Iw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>

    @stack('scripts')

    {{-- SWAL --}}
    @if ($swal = session('swal'))
        <script>
            const title = "{{ $swal['title'] }}";
            const text = "{{ $swal['text'] }}";
            const icon = "{{ $swal['icon'] }}";
            const buttonText = "{{ $swal['button'] }}";

            Swal.fire({
                title: title,
                text: text,
                icon: icon,
                confirmButtonText: buttonText,
            })
        </script>
    @endif

    {{-- SWAL --}}
    <script>
        function swalConfirm(event) {
            event.preventDefault();

            const clickable = $(event.target);
            const type = clickable.data('type') ?? 'button';

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: 'Tekan OK untuk melanjutkan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    if (type == 'link') {
                        const href = $(clickable).attr('href');
                        window.location.href = href;
                    } else {
                        clickable.parent().submit();
                    }
                }
            });
        }
    </script>
</body>

</html>
