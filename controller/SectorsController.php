<?php
require_once("../config/connection.php");
require_once("../models/Sectors.php");

$sectors = new Sectors();

switch ($_GET["op"]) {
    case "insert_sector":
        $sectors->insert_sector($_POST["municipalityID"],$_POST["sectorName"]);
        break;
    case "get_sectors_comboBox":
        $datas = $sectors->getSectorsComboBox();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['Sector_ID'] . "'>" . $row['Sector_Name'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_sectors":
        $datas = $sectors->list_sectors();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["Sector_ID"];
            $sub_array[] = $row["Country_Name"];
            $sub_array[] = $row["City_Name"];
            $sub_array[] = $row["Province_Name"];
            $sub_array[] = $row["Municipality_Name"];
            $sub_array[] = $row["Sector_Name"];

            $sub_array[] = '<button type="button" onClick="ver(' . $row["Sector_ID"] . ');" id="' . $row["Sector_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

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
