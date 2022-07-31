<?php
class Sectors extends Connect
{
    public function insert_sector($MunicipalityID, $SectorName)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO sectors (Municipality_ID,Date_Creation,Sector_Name,Created_By) 
                     VALUES (?,now(),?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $MunicipalityID);
        $sql->bindValue(2, $SectorName);
        $sql->bindValue(3, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_sectors()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT sectors.Sector_ID, countries.Country_Name, cities.City_Name, 
                       provinces.Province_Name, municipalities.Municipality_Name, sectors.Sector_Name  
                  FROM sectors sectors
                  INNER JOIN municipalities municipalities
                  ON sectors.Municipality_ID = municipalities.Municipality_ID
                  INNER JOIN provinces provinces
                  ON municipalities.Province_ID = provinces.Province_ID
                  INNER JOIN cities cities
                  ON provinces.City_ID = cities.City_ID
                  INNER JOIN countries countries
                  ON cities.Country_ID = countries.Country_ID;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getSectorsComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM sectors;";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
