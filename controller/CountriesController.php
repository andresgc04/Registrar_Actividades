<?php
require_once("../config/connection.php");
require_once("../models/Countries.php");

$countries = new Countries();

switch ($_GET["op"]) {
    case "insert_country":
        $countries->insert_country($_POST["country"]);
        break;
    case "get_countries_comboBox":
        $datas = $countries->getCountriesComboBox();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['Country_ID'] . "'>" . $row['Country_Name'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_countries":
        $datas = $countries->list_countries();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["Country_ID"];
            $sub_array[] = $row["Country_Name"];

            $sub_array[] = '<button type="button" onClick="ver(' . $row["Country_ID"] . ');" id="' . $row["Country_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

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
