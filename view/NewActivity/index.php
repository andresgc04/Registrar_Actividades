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
                        <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <!-- jquery validation -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Registrar Nueva Actividad</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form id="activityForm" method="POST">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="activityName">Nombre de la Actividad:</label>
                                                        <input type="text" id="activityName" name="activityName" class="form-control" placeholder="Ingrese el nombre de la actividad">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="startDate">Fecha de Inicio:</label>
                                                        <div class="input-group date" id="startDate" data-target-input="nearest">
                                                            <input type="text" id="startDate" name="startDate" class="form-control datetimepicker-input" data-target="#startDate" />
                                                            <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="endDate">Fecha de Finalización:</label>
                                                        <div class="input-group date" id="endDate" data-target-input="nearest">
                                                            <input type="text" id="endDate" name="endDate" class="form-control datetimepicker-input" data-target="#endDate" />
                                                            <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="numberHours">Cantidad de Horas:</label>
                                                        <input type="text" id="numberHours" name="numberHours" class="form-control" placeholder="Ingrese la cantidad de horas">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="bootstrap-timepicker">
                                                        <div class="form-group">
                                                            <label for="startTime">Hora Inicio:</label>

                                                            <div class="input-group date" id="startTime" data-target-input="nearest">
                                                                <input type="text" id="startTime" name="startTime" class="form-control datetimepicker-input" data-target="#startTime" />
                                                                <div class="input-group-append" data-target="#startTime" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                                </div>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <!-- /.form group -->
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="bootstrap-timepicker">
                                                        <div class="form-group">
                                                            <label for="endTime">Hora Finalización:</label>

                                                            <div class="input-group date" id="endTime" data-target-input="nearest">
                                                                <input type="text" id="endTime" name="endTime" class="form-control datetimepicker-input" data-target="#endTime" />
                                                                <div class="input-group-append" data-target="#endTime" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                                </div>
                                                            </div>
                                                            <!-- /.input group -->
                                                        </div>
                                                        <!-- /.form group -->
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="purpose">Propósito:</label>
                                                        <input type="text" id="purpose" name="purpose" class="form-control" placeholder="Ingrese el propósito de la actividad">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="responsible">Responsable:</label>
                                                        <input type="text" id="responsible" name="responsible" class="form-control" placeholder="Ingrese el nombre del responsable de la actividad">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cost">Costo:</label>
                                                        <input type="text" id="cost" name="cost" class="form-control" placeholder="Ingrese el costo de la actividad">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="locationActivity">Ubicación de la actividad:</label>
                                                        <input type="text" id="locationActivity" name="locationActivity" class="form-control" placeholder="Ingrese la ubicación de la actividad">
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
        <script type="text/javascript" src="new_activity.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:" . Connect::route() . "index.php");
}
?>