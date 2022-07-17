<?php
require_once("../config/connection.php");
require_once("../models/Departments.php");

$departments = new Departments();

switch ($_GET["op"]) {
    case "insert_department":
        $departments->insert_departments($_POST["companyID"], $_POST["facilityID"], $_POST["departmentName"], $_POST["abbreviationDepartment"]);
        break;
    case "get_departments_comboBox":
        $datas = $departments->getDepartmentsComboBox();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['Department_ID'] . "'>" . $row['Department_Name'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_departments":
        $datas = $departments->list_departments();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["Department_ID"];
            $sub_array[] = $row["Company_Name"];
            $sub_array[] = $row["Facility_Name"];
            $sub_array[] = $row["Department_Name"];
            $sub_array[] = $row["Abbreviation_Department"];

            if ($row["State"] == "Activo") {
                $sub_array[] = '<span class="badge badge-primary">Activo</span>';
            }
            if ($row["State"] == "Eliminado") {
                $sub_array[] = '<span class="badge badge-danger">Eliminado</span>';
            }

            $sub_array[] = '<button type="button" onClick="ver(' . $row["Department_ID"] . ');" id="' . $row["Department_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );

        echo json_encode($results);
        break;
}
