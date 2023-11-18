<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - UD Srimurti Inventory System</title>

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
    <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/neptune.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/neptune.png') }}" />
</head>

<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex justify-content-end flex-wrap">
        <div class="app-auth-background"></div>

        {{-- FORM LOGIN --}}
        <form id="login-form" action="{{ route('prosesLogin') }}" method="POST" class="app-auth-container">
            @csrf

            <div class="logo">
                <a href="{{ route('login') }}">Login</a>
            </div>

            <p class="auth-description">
                Silahkan login untuk masuk ke dalam sistem dashboard.
            </p>

            <div class="auth-credentials m-b-xxl">
                {{-- INPUT USERNAME --}}
                <div class="m-b-md">
                    <label for="username" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control" id="username"
                        aria-describedby="username" placeholder="Username" required>
                </div>

                {{-- INPUT PASSWORD --}}
                <div class="">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password"
                        aria-describedby="password"
                        placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required>
                </div>
            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    {{-- SCRIPTS --}}
    <script src="{{ asset('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.min.js') }}"></script>

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

    {{-- FORM VALIDATION --}}
    <script>
        $(function() {
            $('form#login-form').validate();
        })
    </script>

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
                title: 'Are you sure?',
                text: 'Press OK to continue!',
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
