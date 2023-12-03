<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset password</title>

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
                <p class="login-box-msg">Reset password</p>
                <x-message></x-message>
                <form action="" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" required name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" required name="cpassword" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>


                    <div class="social-auth-links text-center mb-3">
                        <button name="submit" type="submit" class="btn btn-block btn-primary">
                            Reset
                        </button>
                    </div>
                </form>

            </div>
            {{-- /.login-card-body --}}
        </div>
    </div>
    {{-- /.login-box --}}

    {{-- jQuery --}}
    {{-- Bootstrap 4 --}}
    <script src={{URL::to("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    {{-- AdminLTE App --}}
</body>

</html>
