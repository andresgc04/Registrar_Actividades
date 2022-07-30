<?php
require_once("../config/connection.php");
require_once("../models/Professions.php");

$professions = new Professions();

switch ($_GET["op"]) {
    case "insert_profession":
        $professions->insert_profession($_POST["profession"]);
        break;
    case "get_professions_comboBox":
        $datas = $professions->getProfessionsComboBox();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['Profession_ID'] . "'>" . $row['Profession'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_professions":
        $datas = $professions->list_professions();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["Profession_ID"];
            $sub_array[] = $row["Profession"];
            $sub_array[] = $row["State"];

            if ($row["State"] == "Activo") {
                $sub_array[] = '<span class="badge badge-primary">Activo</span>';
            }
            if ($row["State"] == "Eliminado") {
                $sub_array[] = '<span class="badge badge-danger">Eliminado</span>';
            }

            $sub_array[] = '<button type="button" onClick="ver(' . $row["Profession_ID"] . ');" id="' . $row["Profession_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

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
