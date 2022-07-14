<?php
require_once("../config/connection.php");
require_once("../models/Companies.php");

$companies = new Companies();

switch ($_GET["op"]){
    case "insert":
        $companies -> insert_companies($_POST[""], $_POST[""],$_POST[""]);
        break;
    case "list_companies":
        $datas = $companies ->list_companies();
        $data = array();

        foreach($datas as $row){
            $sub_array = array();
            $sub_array[] = $row["Company_ID"];
            $sub_array[] = $row["Company_Name"];
            $sub_array[] = $row["Abbreviation_Company"];

            if($row["State"] =="Activo"){
                $sub_array[]= '<span class="badge badge-primary">Abierto</span>';
            }
            if($row["State"] =="Eliminado"){
                $sub_array[]= '<span class="badge badge-danger">Abierto</span>';
            }

            $sub_array[] = '<button type="button" onClick="ver(' . $row["Company_ID"] . ');" id="' . $row["Company_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" =>1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );

        echo json_encode($results);
        break;
}
?>