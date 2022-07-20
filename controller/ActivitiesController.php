<?php
require_once("../config/connection.php");
require_once("../models/Activities.php");

$activities = new Activities();

switch ($_GET["op"]) {
    case "insert_activity":
        $activities->insert_activities(
            $_POST["startDate"],
            $_POST["endDate"],
            $_POST["activityName"],
            $_POST["numberHours"],
            $_POST["startTime"],
            $_POST["endTime"],
            $_POST["purpose"],
            $_POST["responsible"],
            $_POST["cost"],
            $_POST["locationActivity"]
        );
        break;
    case "get_activities_comboBox":
        $datas = $activities->getActivitiesComboBox();
        if (is_array($datas) == true and count($datas) > 0) {
            foreach ($datas as $row) {
                $html .= "<option value = '" . $row['Activity_ID'] . "'>" . $row['Activity_Name'] . "</option>";
            }

            echo $html;
        }
        break;
    case "list_activities":
        $datas = $activities->list_activities();
        $data = array();

        foreach ($datas as $row) {
            $sub_array = array();
            $sub_array[] = $row["Activity_ID"];
            $sub_array[] = $row["Company_Name"];
            $sub_array[] = $row["Facility_Name"];
            $sub_array[] = $row["Department_Name"];
            $sub_array[] = $row["Activity_Name"];
            $sub_array[] = $row["Start_Date"];
            $sub_array[] = $row["End_Date"];

            if ($row["State"] == "Activo") {
                $sub_array[] = '<span class="badge badge-primary">Activo</span>';
            }
            if ($row["State"] == "Eliminado") {
                $sub_array[] = '<span class="badge badge-danger">Eliminado</span>';
            }

            $sub_array[] = '<button type="button" onClick="createReport(' . $row["Activity_ID"] . ');" id="' . $row["Activity_ID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>
                            <script>
                            function createReport(activityID)
                            {
                                console.log(activityID);
                            }
                            </script>';

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
