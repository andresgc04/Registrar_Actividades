<?php
require_once("../config/connection.php");
require_once("../models/Municipalities.php");

$municipalities = new Municipalities();

switch ($_GET["op"]) {
    case "insert_municipalities":
        $municipalities->insert_municipalities($_POST["provinceID"],$_POST["municipalityName"]);
        break;
    case "get_provinces_comboBox":
        $datas = $municipalities->getMunicipalitiesComboBox();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['Municipality_ID'] . "'>" . $row['Municipality_Name'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_municipalities":
        $datas = $municipalities->list_municipalities();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["Municipality_ID"];
            $sub_array[] = $row["Country_Name"];
            $sub_array[] = $row["City_Name"];
            $sub_array[] = $row["Province_Name"];
            $sub_array[] = $row["Municipality_Name"];

            $sub_array[] = '<button type="button" onClick="ver(' . $row["Municipality_ID"] . ');" id="' . $row["Municipality_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

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
