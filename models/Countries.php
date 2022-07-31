<?php
class Countries extends Connect
{
    public function insert_country($Country)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO countries (Date_Creation,Country_Name,Created_By) 
                VALUES (now(),?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $Country);
        $sql->bindValue(2, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_countries()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT countries.Country_ID, countries.Country_Name 
                  FROM countries countries;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getCountriesComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM countries";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
