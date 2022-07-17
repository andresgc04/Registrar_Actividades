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
        <title>Registrar Actividades | Dashboard</title>
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
                        <section class="mt-2 mb-3">
                            <div class="d-flex justify-content-end">
                                <button id="goNewDepartmentBtn" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo Departamento</button>
                            </div>
                        </section>
                        <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->
                            <section class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <!-- Custom tabs (Charts with tabs)-->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fas fa-building"></i>
                                            Departamentos
                                        </h3>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="departments_table" class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Compañia</th>
                                                        <th>Sub-Compañia</th>
                                                        <th>Departamento</th>
                                                        <th>Abreviatura del Departamento</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </section>
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
        <script type="text/javascript" src="home_departments.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:" . Connect::route() . "index.php");
}
?>