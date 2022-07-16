<?php
require_once("../config/connection.php");
require_once("../models/Facilities.php");

$facilities = new Facilities();

switch ($_GET["op"]){
    case "insert_facility":
        $facilities -> insert_facilities($_POST["companyID"], $_POST["facilityName"], $_POST["abbreviationFacility"]);
        break;
    case "list_facilities":
        $datas = $facilities -> list_facilities();
        $data = array();

        foreach($datas as $row)
        {
            $sub_array = array();
            $sub_array[] = $row["Facility_ID"];
            $sub_array[] = $row["Company_Name"];
            $sub_array[] = $row["Facility_Name"];
            $sub_array[] = $row["Abbreviation_Facility"];

            if($row["State"] =="Activo"){
                $sub_array[]= '<span class="badge badge-primary">Activo</span>';
            }
            if($row["State"] =="Eliminado"){
                $sub_array[]= '<span class="badge badge-danger">Eliminado</span>';
            }

            $sub_array[] = '<button type="button" onClick="ver(' . $row["Facility_ID"] . ');" id="' . $row["Facility_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';

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
