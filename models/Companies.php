<?php
class Companies extends Connect
{
    public function insert_companies($Company_Name, $Abbreviation_Company)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO companies (Company_ID,State_ID,Date_Creation,Company_Name,Abbreviation_Company,Created_By) VALUES (NULL,'1',now(),?,?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $Company_Name);
        $sql->bindValue(2, $Abbreviation_Company);
        $sql->bindValue(3, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_companies()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT Company_ID, Company_Name, Abbreviation_Company, b.State State
                FROM companies a
                INNER JOIN states b
                ON a.State_ID = b.State_ID
                WHERE a.State_ID = 1;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
