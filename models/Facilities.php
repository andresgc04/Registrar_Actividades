<?php
class Facilities extends Connect
{
    public function insert_facilities($Company_ID, $Facility_Name, $Abbreviation_Facility)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO facilities (Company_ID,State_ID,Date_Created,Facility_Name,Abbreviation_Facility,Created_By) VALUES (?,'1',now(),?,?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $Company_ID);
        $sql->bindValue(2, $Facility_Name);
        $sql->bindValue(3, $Abbreviation_Facility);
        $sql->bindValue(4, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_facilities()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT facilities.Facility_ID, companies.Company_Name,facilities.Facility_Name,
                       facilities.Abbreviation_Facility, states.State
                FROM facilities facilities
                INNER JOIN companies companies
                ON facilities.Company_ID = companies.Company_ID
                INNER JOIN states states
                ON facilities.State_ID = states.State_ID
                WHERE facilities.State_ID = 1;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getFacilitiesComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM facilities WHERE State_ID = 1;";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
