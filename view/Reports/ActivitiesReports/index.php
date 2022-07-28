<?php
require_once("../../../config/connection.php");
if (isset($_SESSION["User_ID"])) {
    if (isset($_GET["ID"])) {
        require("../../../public/fpdf/fpdf.php");
        $activity_ID = $_GET["ID"];

        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "users_activitiesdb";

        $conn = mysqli_connect($hostname, $username, $password);
        mysqli_select_db($conn, $dbname);

        $query = "SELECT activities.Date_Creation,activities.Activity_Name, activities.Start_Date, activities.End_Date, 
                         activities.Number_Hours, activities.Start_Time, activities.End_Time, activities.Purpose, 
                         activities.Responsible, activities.Cost, activities.Location_Activity, employees.First_Name, 
                         employees.Second_Name, employees.First_Surname, employees.Second_Surname
                    FROM activities activities
                    INNER JOIN companies companies
                    ON activities.Company_ID = companies.Company_ID
                    INNER JOIN facilities facilities
                    ON activities.Facility_ID = facilities.Facility_ID
                    INNER JOIN departments departments
                    ON activities.Department_ID = departments.Department_ID
                    INNER JOIN states states
                    ON activities.State_ID = states.State_ID
                    INNER JOIN users users
                    ON activities.Created_By = users.User_ID
                    INNER JOIN employees employees
                    ON users.Employee_ID = employees.Employee_ID
                    WHERE activities.State_ID = 1
                    AND activities.Activity_ID = $activity_ID";

        $result = mysqli_query($conn, $query);


        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $name = $row["Date_Creation"];
                $activityName = $row["Activity_Name"];
                $startDate = $row["Start_Date"];
                $endDate = $row["End_Date"];
                $numberHours = $row["Number_Hours"];
                $startTime = $row["Start_Time"];
                $endTime = $row["End_Time"];
                $purpose = $row["Purpose"];
                $responsible = $row["Responsible"];
                $cost = $row["Cost"];
                $locationActivity = $row["Location_Activity"];
                $firstName = $row["First_Name"];
                $secondName = $row["Second_Name"];
                $firstSurname = $row["First_Surname"];
                $secondSurname = $row["Second_Surname"];
            }
        }

        class PDF extends FPDF
        {
            function Footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 12);
                $this->Cell(0, 10, utf8_decode('Pagina') . $this->PageNo() . '/{nb}', 0, 0, 'c');
            }
        }

        $pdf = new FPDF('L', 'mm', 'A3');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Image('../../../public/img/Ministerio_Educacion_Republica_Dominicana_MINERD.png', 160, 0, 100);
        $pdf->Cell(150);
        $pdf->Ln(20);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(400, 70, utf8_decode('Reporte de Actividades'), 0, 0, 'C');
        $pdf->Ln(15);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(400, 70, utf8_decode('Nombre de la Actividad:'), 0, 0, 'C');
        $pdf->Ln(15);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(400, 70, utf8_decode($activityName), 0, 0, 'C');
        $pdf->Ln(50);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(67, 10, utf8_decode("Fecha de Inicio: ") . utf8_decode(date('d-m-Y', strtotime($startDate))), 1, 0);
        $pdf->Cell(249);
        $pdf->Cell(77, 10, utf8_decode('Fecha de Finalizacion: ') . utf8_decode(date('d-m-y', strtotime($endDate))), 1, 0);
        $pdf->Ln(11);
        $pdf->Cell(67, 10, utf8_decode('Cantidad de Horas: ') . utf8_decode($numberHours), 1, 0);
        $pdf->Ln(11);
        $pdf->Cell(67, 10, utf8_decode('Hora de Inicio: ') . utf8_decode($startTime), 1, 0);
        $pdf->Cell(249);
        $pdf->Cell(77, 10, utf8_decode('Hora de Finalizacion: ') . utf8_decode($endTime), 1, 0);
        $pdf->Ln(11);
        $pdf->Cell(120, 10, utf8_decode('Responsable: ') . utf8_decode($responsible), 1, 0);
        $pdf->Cell(196);
        $pdf->Cell(77, 10, utf8_decode("Costo: ") . utf8_decode($cost).' '.utf8_decode("RD"), 1, 0);
        $pdf->Ln(30);
        $pdf->Cell(30, 10, utf8_decode('Proposito:'), 1, 0);
        $pdf->Ln(11);
        $pdf->Cell(67, 10, utf8_decode($purpose), 0, 1);
        $pdf->Ln(15);
        $pdf->Cell(30, 10, utf8_decode('Ubicacion:'), 1, 0);
        $pdf->Ln(11);
        $pdf->Cell(67, 10, utf8_decode($locationActivity), 0, 1);
        $pdf->Ln(15);
        $pdf->Cell(400, 10, utf8_decode('Creado Por:'), 0, 0, 'C');
        $pdf->Ln(11);
        $pdf->Cell(400,10,utf8_decode($firstName).' '.utf8_decode($secondName).' '.utf8_decode($firstSurname).' '.utf8_decode($secondSurname),0,0,'C');
        $pdf->Output();
    }
} else {
    header("Location:" . Connect::route() . "index.php");
}
?>

<script type="text/javascript" src="../../../public/js/functions/main.js"></script>