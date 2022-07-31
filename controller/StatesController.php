<?php
require_once("../config/connection.php");
require_once("../models/States.php");

$states = new States();

switch ($_GET["op"]) {
    case "insert_state":
        $states->insert_state($_POST["state"]);
        break;
    case "get_states_comboBox":
        $datas = $states->getStatesComboBox();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['State_ID'] . "'>" . $row['State'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_states":
        $datas = $states->list_states();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["State_ID"];
            $sub_array[] = $row["State"];

            $sub_array[] = '<button type="button" onClick="ver(' . $row["State_ID"] . ');" id="' . $row["State_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

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
