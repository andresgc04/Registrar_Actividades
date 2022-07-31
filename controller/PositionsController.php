<?php
require_once("../config/connection.php");
require_once("../models/Positions.php");

$positions = new Positions();

switch ($_GET["op"]) {
    case "insert_position":
        $positions->insert_position($_POST["position"]);
        break;
    case "get_positions_comboBox":
        $datas = $positions->getPositionsComboBox();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['Position_ID'] . "'>" . $row['Position'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_positions":
        $datas = $positions->list_positions();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["Position_ID"];
            $sub_array[] = $row["Position"];

            if ($row["State"] == "Activo") {
                $sub_array[] = '<span class="badge badge-primary">Activo</span>';
            }
            if ($row["State"] == "Eliminado") {
                $sub_array[] = '<span class="badge badge-danger">Eliminado</span>';
            }

            $sub_array[] = '<button type="button" onClick="ver(' . $row["Position_ID"] . ');" id="' . $row["Position_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

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
