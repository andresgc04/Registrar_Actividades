<?php
require_once("../../config/connection.php");

if (isset($_POST["send"]) and $_POST["send"] == "yes") {
    require_once("../../models/Users.php");

    $users = new Users();
    $users->Login();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Actividades | Login</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../public/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../public/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../public/adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../Login/" class="h1"><b>Login</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Inicie su sesión</p>

                <form action="" method="post" id="login_form">
                    <?php
                    if (isset($_GET["m"])) {
                        switch ($_GET["m"]) {
                            case "1";
                    ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>El Usuario</strong> y/o <strong>Contraseña</strong> son incorrectos.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                                break;

                            case "2";
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Los Campos</strong> estan vacios.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                    <?php
                                break;
                        }
                    }
                    ?>
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Recuerdame
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <input type="hidden" name="send" class="form-control" value="yes" />
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="mt-5">
                    <div class="d-flex justify-content-end mb-3">
                        <p>
                            <a href="forgot-password.html">Olvidé mi contraseña</a>
                        </p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="mb-0">
                            <a href="#" class="text-center">Regresar</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../public/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../public/adminlte/dist/js/adminlte.min.js"></script>
    <script>
        function go_dashboard() {
            window.location.href = "../Dashboard/"
        }
    </script>
</body>

</html>