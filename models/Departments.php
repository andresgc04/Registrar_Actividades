<?php
class Departments extends Connect
{
    public function insert_departments($Company_ID,$Facility_ID,$Department_Name,$Abbreviation_Department)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO departments (Company_ID,Facility_ID,State_ID,Date_Creation,Department_Name,Abbreviation_Department,Created_By) VALUES (?,?,'1',now(),?,?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $Company_ID);
        $sql->bindValue(2, $Facility_ID);
        $sql->bindValue(3, $Department_Name);
        $sql->bindValue(4, $Abbreviation_Department);
        $sql->bindValue(5, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_departments()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT departments.Department_ID, companies.Company_Name, facilities.Facility_Name,
                       departments.Department_Name, departments.Abbreviation_Department, states.State
                FROM `departments` departments
                INNER JOIN `companies` companies
                ON departments.Company_ID = companies.Company_ID
                INNER JOIN `facilities` facilities
                ON departments.Facility_ID = facilities.Facility_ID
                INNER JOIN `states` states
                ON departments.State_ID = states.State_ID
                WHERE departments.State_ID =1;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getDepartmentsComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM departments WHERE State_ID = 1;";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
