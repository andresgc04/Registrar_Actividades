<?php
require_once("../config/connection.php");
require_once("../models/Companies.php");

$companies = new Companies();

switch ($_GET["op"]) {
    case "insert_company":
        $companies->insert_companies($_POST["companyName"], $_POST["abbreviationCompany"]);
        break;
    case "get_companies":
        $datas = $companies->getCompanies();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['Company_ID'] . "'>" . $row['Company_Name'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_companies":
        $datas = $companies->list_companies();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["Company_ID"];
            $sub_array[] = $row["Company_Name"];
            $sub_array[] = $row["Abbreviation_Company"];

            if ($row["State"] == "Activo") {
                $sub_array[] = '<span class="badge badge-primary">Activo</span>';
            }
            if ($row["State"] == "Eliminado") {
                $sub_array[] = '<span class="badge badge-danger">Eliminado</span>';
            }

            $sub_array[] = '<button type="button" onClick="ver(' . $row["Company_ID"] . ');" id="' . $row["Company_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

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
