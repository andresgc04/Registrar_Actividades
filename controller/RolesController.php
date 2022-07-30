<?php
require_once("../config/connection.php");
require_once("../models/Roles.php");

$roles = new Roles();

switch ($_GET["op"]) {
    case "insert_rol":
        $roles->insert_rol($_POST["rol"]);
        break;
    case "get_roles_comboBox":
        $datas = $roles->getRolesComboBox();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['Rol_ID'] . "'>" . $row['Rol'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_roles":
        $datas = $roles->list_roles();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["Rol_ID"];
            $sub_array[] = $row["Rol"];

            if ($row["State"] == "Activo") {
                $sub_array[] = '<span class="badge badge-primary">Activo</span>';
            }
            if ($row["State"] == "Eliminado") {
                $sub_array[] = '<span class="badge badge-danger">Eliminado</span>';
            }

            $sub_array[] = '<button type="button" onClick="ver(' . $row["Rol_ID"] . ');" id="' . $row["Rol_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

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
