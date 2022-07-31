<?php
require_once("../config/connection.php");
require_once("../models/Provinces.php");

$provinces = new Provinces();

switch ($_GET["op"]) {
    case "insert_provinces":
        $provinces->insert_provinces($_POST["cityID"],$_POST["provinceName"]);
        break;
    case "get_provinces_comboBox":
        $datas = $provinces->getProvincesComboBox();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['Province_ID'] . "'>" . $row['Province_Name'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_provinces":
        $datas = $provinces->list_provinces();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["Province_ID"];
            $sub_array[] = $row["Country_Name"];
            $sub_array[] = $row["City_Name"];
            $sub_array[] = $row["Province_Name"];

            $sub_array[] = '<button type="button" onClick="ver(' . $row["Province_ID"] . ');" id="' . $row["Province_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

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
