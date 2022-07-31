<?php
require_once("../config/connection.php");
require_once("../models/Cities.php");

$cities = new Cities();

switch ($_GET["op"]) {
    case "insert_city":
        $cities->insert_city($_POST["countryID"],$_POST["city"]);
        break;
    case "get_cities_comboBox":
        $datas = $cities->getCitiesComboBox();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['City_ID'] . "'>" . $row['City_Name'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_cities":
        $datas = $cities->list_cities();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["City_ID"];
            $sub_array[] = $row["Country_Name"];
            $sub_array[] = $row["City_Name"];

            $sub_array[] = '<button type="button" onClick="ver(' . $row["City_ID"] . ');" id="' . $row["City_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

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
