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
        <title>Actividades | Registrar Provincias</title>
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
                                        <h3 class="card-title">Registrar Nueva Provincia</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form id="provincesForm" method="POST">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="cityID">Ciudad:</label>
                                                        <select id="cityID" name="cityID" class="form-control select2" style="width: 100%;">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="provinceName">Provincia:</label>
                                                        <input type="text" id="provinceName" name="provinceName" class="form-control" placeholder="Ingrese el nombre de la provincia.">
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
        <script type="text/javascript" src="new_provinces.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:" . Connect::route() . "index.php");
}
?>