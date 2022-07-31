<?php
class Cities extends Connect
{
    public function insert_city($CountryID,$City)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO cities (Country_ID,Date_Creation,City_Name,Created_By) 
                     VALUES (?,now(),?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $CountryID);
        $sql->bindValue(2, $City);
        $sql->bindValue(3, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_cities()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT cities.City_ID, countries.Country_Name, cities.City_Name 
                  FROM cities cities
            INNER JOIN countries countries
                    ON cities.Country_ID = countries.Country_ID;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getCitiesComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM cities;";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
