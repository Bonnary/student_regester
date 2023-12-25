<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    {{-- Google Font: Source Sans Pro --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href={{ URL::to('assets/plugins/fontawesome-free/css/all.min.css') }}>
    {{-- icheck bootstrap --}}
    <link rel="stylesheet" href={{ URL::to('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}>
    {{-- Theme style --}}
    <link rel="stylesheet" href={{ URL::to('assets/dist/css/adminlte.min.css') }}>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img style="max-width: 200px; max-height: 200px;" src={{ URL::to('assets/dist/img/logo.jpg') }}
                alt="">
        </div>
        {{-- /.login-logo --}}
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <x-message></x-message>
                <form action={{ url('/login') }} method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" required name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password-input" type="password" class="form-control" required name="password"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span id="toggle-password-visibility" class="fas fa-eye-slash"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="social-auth-links text-center mb-3">
                        <button name="submit" type="submit" class="btn btn-block btn-primary">
                            Sign in
                        </button>
                    </div>
                </form>

                {{-- /.social-auth-links --}}

                <p class="mb-1">
                    <a href="{{ url('forgot-password') }}">I forgot my password</a>
                </p>
            </div>
            {{-- /.login-card-body --}}
        </div>
    </div>
    {{-- /.login-box --}}

    {{-- jQuery --}}
    {{-- Bootstrap 4 --}}
    <script src={{ URL::to('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    {{-- AdminLTE App --}}

    <script>
        document.getElementById('toggle-password-visibility').addEventListener('click', function() {
            var passwordInput = document.getElementById('password-input');
            var passwordIcon = document.getElementById('toggle-password-visibility');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = "password";
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            }
        });
    </script>
</body>

</html>
