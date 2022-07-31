<?php
class Provinces extends Connect
{
    public function insert_provinces($CityID, $ProvinceName)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO provinces (City_ID,Date_Creation,Province_Name,Created_By) 
                     VALUES (?,now(),?,?)";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $CityID);
        $sql->bindValue(2, $ProvinceName);
        $sql->bindValue(3, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_provinces()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT provinces.Province_ID, countries.Country_Name, cities.City_Name, 
                       provinces.Province_Name
                FROM provinces provinces
                INNER JOIN cities cities
                ON provinces.City_ID = cities.City_ID
                INNER JOIN countries countries
                ON cities.Country_ID = countries.Country_ID;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getProvincesComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM provinces;";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
