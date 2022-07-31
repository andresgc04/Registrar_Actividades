<?php
class Municipalities extends Connect
{
    public function insert_municipalities($ProvinceID, $MunicipalityName)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO municipalities (Province_ID,Date_Creation,Municipality_Name,Created_By) 
                     VALUES (?,now(),?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $ProvinceID);
        $sql->bindValue(2, $MunicipalityName);
        $sql->bindValue(3, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_municipalities()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT municipalities.Municipality_ID, countries.Country_Name, 
                       cities.City_Name, provinces.Province_Name, municipalities.Municipality_Name 
                FROM municipalities municipalities
                INNER JOIN provinces provinces
                ON municipalities.Province_ID = provinces.Province_ID
                INNER JOIN cities cities
                ON provinces.City_ID=cities.City_ID
                INNER JOIN countries countries
                ON cities.Country_ID = countries.Country_ID;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getMunicipalitiesComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM municipalities;";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
