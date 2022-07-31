<?php
require_once("../../config/connection.php");
if (isset($_SESSION["User_ID"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrar Actividades | Rol</title>
        <?php require_once("../MainHead/head.php"); ?>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <!--Wrapper Start-->
        <div class="wrapper">

            <!--Preloader Start-->
            <?php require_once("../MainPreloader/preloader.php"); ?>
            <!--Preloader End-->

            <!--Navbar Start-->
            <?php require_once("../MainNav/nav.php"); ?>
            <!--Navbar End-->

            <!--Sidebar Start-->
            <?php require_once("../MainSidebar/sidebar.php"); ?>
            <!--Sidebar End-->

            <div class="content-wrapper">
                <!--Content Header Start-->
                <?php require_once("../MainHeader/header.php"); ?>
                <!--Content Header End-->

                <!--Main Content Start-->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <!-- jquery validation -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Registrar Nuevo Estado</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form id="stateForm" method="POST">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="state">Estado:</label>
                                                        <input type="text" id="state" name="state" class="form-control" placeholder="Ingrese el nombre del estado.">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.Left col -->
                        </div>
                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </section>
                <!--Main Content End-->
            </div>
            <!--Footer Start-->
            <?php require_once("../MainFooter/footer.php"); ?>
            <!--Footer End-->

            <!--Control Sidebar Start-->
            <?php require_once("../MainControlSidebar/controlsidebar.php"); ?>
            <!--Control Sidebar End-->
        </div>
        <!--Wrapper End-->

        <?php require_once("../MainJs/js.php"); ?>
        <script type="text/javascript" src="new_state.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:" . Connect::route() . "index.php");
}
?>