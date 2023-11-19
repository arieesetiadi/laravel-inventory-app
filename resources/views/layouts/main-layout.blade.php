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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.0/sweetalert2.min.css"
        integrity="sha512-l1vPIxNzx1pUOKdZEe4kEnWCBzFVVYX5QziGS7zRZE4Gi5ykXrfvUgnSBttDbs0kXe2L06m9+51eadS+Bg6a+A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/pace/pace.css') }}" rel="stylesheet">
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
                        Utama
                    </li>

                    <li class="active-page">
                        <a href="{{ route('dashboard') }}" class="active">
                            <i class="material-icons-two-tone">dashboard</i>Dashboard
                        </a>
                    </li>

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
                            <i class="material-icons-two-tone">power_settings_new</i>Logout
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
    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.0/sweetalert2.min.js"
        integrity="sha512-rO18JLH5mM83ToEn/5KhZ8BpHJ4uUKrGLybcp6wK0yuRfqQCSGVbEq1yIn/9coUjRU88TA6UJDLPK9sO6DN0Iw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
