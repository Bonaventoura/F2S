
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>F2S | Connexion</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('welcome') }}"><b>F2S</b></a>
        </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Connectez vous pour ouvrir une session</p>

            <div class="alert alert-success" id="success_connect" style="display: none"></div>
            <div class="alert alert-danger" id="error_connect" style="display: none"></div>
            @include('layouts.messages')
            <form id="login_form" action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Votre nom utilisateur">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <span id="user"></span>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <span id="pwd"></span>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Se souvenir
                        </label>
                        </div>
                    </div>
                <!-- /.col -->
                <div class="col-6">
                    <button type="submit" id="btn_login" class="btn btn-primary btn-block" > <i class="fas fa-sign-in"></i> Connexion</button>
                </div>
                <!-- /.col -->
                </div>
            </form>


            <p class="mb-1">
                <a href="forgot-password.html">Mot de passe oublié</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('compte.create') }}" class="text-center">Vous n'avez pas de compte ? créez en un</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        //alert('login page');
        var username = '';
        var password = '';
        $('#username').change(function (e) {
            e.preventDefault();
            username = $(this).val();
            console.log(username);
            if (username !== '' && username.length >0) {
                $('#password').removeAttr('disabled','disabled');
            }
        });

        $('#password').change(function (e) {
            e.preventDefault();
            password = $(this).val();
            console.log(password);
            //$('#pwd').html(password);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: " {{URL::to('/fetch-user')}} ",
                data: {'username':username, 'password':password},
                dataType: "JSON",
                success: function (response) {
                    console.log(response);

                    if (response.success){
                        $('#btn_login').removeAttr('disabled','disabled');
                        $('#success_connect').show();
                        $('#success_connect').html(response.success);
                    }

                    if (response.error) {
                        $('#btn_login').attr('disabled', 'disabled');
                        $('#error_connect').show();
                        $('#error_connect').html(response.error);


                        setTimeout(function() {
                            $('#error_connect').hide();
                            $('#btn_login').attr('disabled', 'disabled');
                            $('#password').attr('disabled', 'disabled');
                        }, 2500);

                    }
                }
            });
        });


    });
</script>

</body>
</html>
