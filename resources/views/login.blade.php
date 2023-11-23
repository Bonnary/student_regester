<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    {{-- Google Font: Source Sans Pro --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href={{URL::to("assets/plugins/fontawesome-free/css/all.min.css")}}>
    {{-- icheck bootstrap --}}
    <link rel="stylesheet" href={{URL::to("assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}>
    {{-- Theme style --}}
    <link rel="stylesheet" href={{URL::to("assets/dist/css/adminlte.min.css")}}>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img style="max-width: 200px; max-height: 200px;"  src={{URL::to("assets/dist/img/logo.jpg")}} alt="">
        </div>
        {{-- /.login-logo --}}
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action={{URL::to("assets/index3.html")}} method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
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
                </form>

                <div class="social-auth-links text-center mb-3">
                    <button type="submit" class="btn btn-block btn-primary">
                        Sign in
                    </button>
                </div>
                {{-- /.social-auth-links --}}

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
            {{-- /.login-card-body --}}
        </div>
    </div>
    {{-- /.login-box --}}

    {{-- jQuery --}}
    <script src={{URL::to("assets/plugins/jquery/jquery.min.js")}}></script>
    {{-- Bootstrap 4 --}}
    <script src={{URL::to("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    {{-- AdminLTE App --}}
    <script src={{URL::to("assets/dist/js/adminlte.min.js")}}></script>
</body>

</html>
